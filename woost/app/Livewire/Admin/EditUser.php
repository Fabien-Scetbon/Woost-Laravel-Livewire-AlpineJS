<?php

namespace App\Livewire\Admin;

use App\Models\User;

use Livewire\Component;
use App\Enums\UserStatus;
use App\Services\GoogleMapService;
use App\Rules\ValidPostalCode;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;

class EditUser extends Component
{
    use WithFileUploads;

    public User $user;

    // Variables pour vue

    public $currentUser;               //Objet User lorsqu'on modifie un User existant

    public bool $creatingNewUser = true;    // Création ou édition d'un User

    public string $titleUserEditing;          // Titre

    public string $subTitleUserEditing;       // Sous-titre

    // Liste des inputs pour la création / modification / suppression d'un User

    public int $userId;

    public string $firstname = '';

    public string $lastname = '';

    public string $email = '';

    public string $postalcode = '';

    public string $city = '';

    public string $city_lat = '';

    public string $city_long = '';

    public string $department = '';

    public string $password = '';

    public $status = \App\Enums\UserStatus::Member;

    public bool $is_ban = false;

    public int $user_id;

    // Gestion image

    public $image;

    // Message d'erreurs lors du validator

    protected function messages()
    {
        return [
            'firstname.required' => 'Le prénom est obligatoire.',
            'lastname.required' => 'Le nom est obligatoire.',
            'email.required' => "L'adresse mail est obligatoire.",
            'email.email' => 'Veuillez entrer une adresse mail valide.',
            'email.unique' => 'Cette adresse mail existe déjà.',
            'postalcode.required' => 'Le code postal est obligatoire.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit avoir au moins 8 caractères.',
            'image.image' => "Votre fichier n'est pas une image.",
            'image.mimes' => "L'extension de votre fichier n'est pas acceptée.",
            'image.max' => 'Votre image dépasse 1MB.',
        ];
    }

    // Initialisation de la vue
    public function mount()
    {
        if (!isset($this->user)) {
            $this->creatingNewUser = true;
        } else {
            $this->creatingNewUser = false;
            $this->initInputForModifingUser();
        }

        $this->initUserTitles();
    }

    // Initialiser les champs du form pour la modification d'un user
    private function initInputForModifingUser(): void
    {
        $this->userId = $this->user->id;
        $this->firstname = $this->user->firstname;
        $this->lastname = $this->user->lastname;
        $this->email = $this->user->email;
        $this->postalcode = $this->user->postalcode;
        $this->password = '';
        $this->status = $this->user->status;
        $this->is_ban = $this->user->is_ban;
    }

    // Initialisation des titres et sous-titres de la vue en fonction de l'action
    public function initUserTitles(): void
    {
        if ($this->creatingNewUser) {
            $this->titleUserEditing = '';
            $this->subTitleUserEditing = "Création d'un nouvel utilisateur";
        } else {
            $this->titleUserEditing = $this->user->fullName();
            $this->subTitleUserEditing = "Modification de l'utilisateur :";
        }
    }


    // Créer ou updater un user
    public function saveUser()
    {
        if (Auth::user() && Auth::user()->hasRole('Admin')) {

            $validatedData = Validator::make(
                [
                    'firstname' => $this->firstname,
                    'lastname' => $this->lastname,
                    'email' => $this->email,
                    'postalcode' => $this->postalcode,
                    'password' => $this->password,
                    'status' => intval($this->status),
                    'is_ban' => $this->is_ban,
                    'image' => $this->image,
                ],
                [
                    'firstname' => ['required'],
                    'lastname' => ['required'],
                    'email' => ['required', 'email', Rule::unique('users')->ignore($this->user->id ?? null)],
                    'postalcode' => ['required', new ValidPostalCode],
                    'password' => $this->creatingNewUser ? ['required', Password::min(8)] : ['nullable'],
                    'status' => [new EnumValue(UserStatus::class)],
                    'is_ban' => ['boolean'],
                    'image' => $this->creatingNewUser ? ['nullable', 'image', 'mimes:jpg,png,svg,webp', 'max:1024'] : ['nullable', 'image', 'mimes:jpg,png,svg', 'max:1024'],

                ],
                $this->messages()
            )->validate();

            // Capitalize avant de stocker
            foreach (['firstname', 'lastname'] as $val) {
                $validatedData[$val] = Str::ucfirst($validatedData[$val]);
            }

            if ($this->creatingNewUser)  // on cree un nouveau user
            {
                $validatedData['image'] = $this->manageImage();
                $validatedData['password'] = Hash::make($this->password);
                $validatedData['city'] = $this->city;
                $validatedData['department'] = $this->department;
                $validatedData['city_lat'] = $this->city_lat;
                $validatedData['city_long'] = $this->city_long;


                User::create($validatedData);

                // session()->flash('openBigTab', 1 );  1 par défaut dans dashboard
                redirect()->route('admin.dashboard')->with('message', 'Votre nouvel utilisateur a bien été créé.');
            } else {   // On update un user existant

                // On vérifie si le user a changer son image
                isset($this->image) ? $validatedData['image'] = $this->manageImage() : $validatedData['image'] = $this->user->image;
                $validatedData['password'] = Hash::make($this->password);
                $validatedData['city'] = $this->city;
                $validatedData['department'] = $this->department;
                $validatedData['city_lat'] = $this->city_lat;
                $validatedData['city_long'] = $this->city_long;

                $this->user->update($validatedData);

                redirect()->route('admin.dashboard')->with('message', 'Les modifications apportées à cet utilisateur ont été mises à jour.');
            }
        } else {
            throw ValidationException::withMessages([
                'no_authorization' => "Vous n'êtes pas autorisé à modifier ou ajouter des utilisateurs.",
            ]);
        }
    }

    public function searchCityByPostalCode()
    {
        if (strlen($this->postalcode) >= 5) {

            $service = new GoogleMapService();
            $result = $service->searchCityByPostalCode($this->postalcode);

            if (isset($result['error'])) {
                $this->city = $result['error'];
                $this->reset(['department', 'city_lat', 'city_long']);
            } else {
                $this->city = $result['city'];
                $this->department = $result['department'];
                $this->city_lat = $result['city_lat'];
                $this->city_long = $result['city_long'];
            }
        }
    }

    public function manageImage()
    {
        if (!$this->creatingNewUser) {

            // Si l'utilisateur existe, on supprime l'image actuelle (sauf default image) et on utilise son user_id dans le nom de l'image
            if ($this->user->image != 'defaultuser.webp') {
                Storage::disk('public')->delete('images/users/' . $this->user->image);
            }
            $image_name = $this->user->id . '_' . Str::random();
        } else {
            
            if (isset($this->image)) {
                // Si l'utilisateur n'existe pas
                $image_name = '00-' . Str::random();
            }
        }
        if (isset($this->image)) {

            // Intervention Image pour encoder en webp
            $image = Image::make($this->image);
            $image->encode('webp');
            $image->save(public_path('storage/images/users/' . $image_name . '.webp'));
        }

        return $image_name . '.webp';
    }

    public function deleteUser()
    {
        if (Auth::user() && Auth::user()->hasRole('Admin')) { // Pb VSC qui n'associe pas Auth::user() a la classe User
            $this->user->delete();

            redirect()->route('admin.dashboard')->with('message', "L'utilisateur a bien été supprimé.");
        } else {
            throw ValidationException::withMessages([
                'no_authorization' => "Vous n'êtes pas autorisé à supprimer des utilisateurs.",
            ]);
        }
    }

    // Redirige vers la vue liste users si edit annulé
    public function returnListUsers(): void
    {
        // session()->flash('openBigTab', 1 );  1 par défaut dans dashboard
        redirect()->route('admin.dashboard');
    }

    public function resetError()
    {
        $this->resetErrorBag('image');
    }
}
