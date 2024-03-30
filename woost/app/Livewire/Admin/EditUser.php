<?php

namespace App\Livewire\Admin;

use App\Models\User;

use Livewire\Component;
use App\Enums\UserStatus;
use BenSampo\Enum\Rules\EnumValue;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rules\Password;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
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

    public string $password = '';

    public $userStatus;

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
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit avoir au moins 8 caractères.',
            'image.required' => "L'image est requise.",
            'image.image' => "Votre fichier n'est pas une image.",
            'image.mimes' => "L'extension de votre fichier n'est pas acceptée.",
            'image.max' => 'Votre image dépasse 1MB',
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
        $this->userStatus = $this->user->status;
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
        $validatedData = Validator::make(
            [
                'firstname' => $this->firstname,
                'lastname' => $this->lastname,
                'email' => $this->email,
                'postalcode' => $this->postalcode,
                'password' => $this->password,
                'status' => $this->status,
                'is_ban' => $this->is_ban
            ],
            [
                'firstname' => ['required'],
                'lastname' => ['required'],
                'email' => ['required', 'email','unique:users'],
                'postalcode' => ['required'],

                'password' => ['required', Password::min(8)],
            ],
            $this->messages()
        )->validate();

    //     // Capitalize le nom avant de le stocker
    //     $validatedData['titre'] = Str::ucfirst($validatedData['titre']);

    //     if ($this->creatingNewArticle)  // on cree un nouvel article
    //     {
    //         $validatedData['image'] = $this->manageImage();

    //         Article::create($validatedData);

    //         session()->flash('openBigTab', 2);
    //         redirect()->route('admin.gestion_articles')->with('message', 'Votre nouvel article a bien été crée.');

    //     } else {   // On update un article existant

    //         if($validatedData['schedule_at'] == null) // On vérifie si la publication n'est pas programmée à une date ultérieure
    //         {
    //             // On vérifie si le statut de l'article passe a Publié pour initialiser le champ 'published_at' et envoyer éventuellement (1ere publi) les emails d'abonnement
    //             if($this->article->statut != \App\Enums\ArticleStatus::Publier && $validatedData['statut'] == \App\Enums\ArticleStatus::Publier)
    //             {
    //                 $validatedData['published_at'] = Carbon::now();

    //                 if(is_null($this->article->published_at)) // 1ere publication
    //                 {
    //                     $categorieStatut = CategorieArticle::find($this->articleCategorieId)->statut;

    //                     if($categorieStatut == \App\Enums\ArticleStatus::Publier) // La catégorie de l'article a le statut Publier
    //                     {
    //                         $articleService = new ArticleService();
    //                         $articleService->sendNewArticleNotification($this->articleCategorieId);
    //                     }
    //                 }
    //             }
    //         } else { // Si la publication est programmée à une date ultérieure, on ne change pas le statut de l'article
    //             $validatedData['statut'] = $this->article->statut;
    //         }

    //         // On vérifie si le user a changer son image
    //         isset($this->image) ? $validatedData['image'] = $this->manageImage() : $validatedData['image'] = $this->article->image;

    //         $this->article->update($validatedData);
    //         session()->flash('openBigTab', 2);
    //         redirect()->route('admin.gestion_articles')->with('message', 'Les modifications apportées à cet article ont été mises à jour.');
    //     }
    }

    // public function manageImage()
    // {
    //     if(!$this->creatingNewArticle)
    //     {
    //         // Si l'article existe, on supprime l'image actuelle et on utilise son article_id dans le nom de l'image
    //         Storage::disk('public')->delete('articles/'.$this->article->image);
    //         $image_name = $this->article->id.'_'.Str::random();

    //     } else {
    //         // Si l'article n'existe pas
    //         $image_name = Str::random();
    //     }

    //     // Intervention Image pour resize et encode en webp
    //     $image = Image::make($this->image);
    //     // $image->resize(1120,700);   suivant les besoins avant cropperjs
    //     $image->encode('webp');
    //     $image->save(public_path('storage/articles/'.$image_name.'.webp'));

    //     return $image_name.'.webp';
    // }

    public function deleteUser()
    {
        if (Auth::user() && Auth::user()->hasRole('Admin')) { // Pb VSC qui n'associe pas Auth::user() a la classe User
            $this->user->delete();

            // session()->flash('openBigTab', 1 );  1 par défaut dans dashboard
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
