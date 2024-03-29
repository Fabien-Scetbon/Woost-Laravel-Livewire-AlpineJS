<?php

namespace App\Livewire\Admin;

use App\Models\User;

use Livewire\Component;
use App\Enums\UserStatus;
use BenSampo\Enum\Rules\EnumValue;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
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

    public string $password= '';

    public $userStatus;

    public bool $is_ban = false;

    public int $user_id;

    // Gestion image

    public $image;

    // Message d'erreurs lors du validator

    // protected function messages()
    // {
    //     return [
    //         'schedule_at.date' => 'Une date est attendue.',
    //         'schedule_at.after' => 'La date doit être ultérieure à la date actuelle.',
    //         'tagNom.required' => 'Le nom est obligatoire.',
    //         'tagNom.max' => 'Le nom ne doit pas dépasser 20 caractères.',
    //         'tagNom.unique' => 'Ce nom est déjà utilisé.',
    //         'titre.required' => 'Le titre est obligatoire.',
    //         'titre.max' => 'Le titre ne doit pas dépasser 70 caractères.',
    //         'contenu.required' => 'Le contenu est obligatoire.',
    //         'copietitre.required' => 'Veuillez recopier le nom de la catégorie',
    //         'copietitre.in' => 'Les deux noms ne sont pas identiques',
    //         'image.required' => "L'image est requise.",
    //         'image.image' => "Votre fichier n'est pas une image.",
    //         'image.mimes' => "L'extension de votre fichier n'est pas acceptée.",
    //         'image.max' => 'Votre image dépasse 1MB',
    //         'categorie_article_id.required' => 'La catégorie est requise.',

    //     ];
    // }

    // Initialisation de la vue
    public function mount()
    {
        if (!isset($this->user))
        {
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
        if ($this->creatingNewUser)
        {
            $this->titleUserEditing = 'Nouvel utilisateur';
            $this->subTitleUserEditing = "Création d'un nouvel utilisateur";
        } else {
            $this->titleUserEditing = $this->user->fullName();
            $this->subTitleUserEditing = "Modification de l'utilisateur";
        }
    }


    // Créer ou updater un article
    // public function saveArticle()
    // {
    //     $validatedData = Validator::make(
    //         [
    //             'titre' => $this->titreArticle,
    //             'user_id' => Auth::user()->id,
    //             'nom_auteur' => Auth::user()->fullname(),
    //             'contenu' => $this->form_data[$this->name],
    //             'categorie_article_id' => $this->articleCategorieId,
    //             'image' => $this->image,
    //             'statut' => is_null($this->articleStatut) ? \App\Enums\ArticleStatus::Depublier : intval($this->articleStatut), // contourner le pb de la valeur 0
    //             'schedule_at' => $this->articleScheduleAt,
    //             'is_commentable' => $this->articleIsCommentable,
    //         ],
    //         [
    //             'titre' => ['required', 'max:70'],
    //             'user_id' => ['exists:users,id'],
    //             'nom_auteur' => ['exists:articles,nom_auteur,user_id,' . Auth::user()->id], //
    //             'categorie_article_id' => ['required', 'exists:categorie_articles,id'],
    //             'image' => $this->creatingNewArticle ? ['required', 'image', 'mimes:jpg,png,svg', 'max:1024'] : ['nullable', 'image', 'mimes:jpg,png,svg', 'max:1024'],
    //             'contenu' => ['required'],
    //             'statut' => [new EnumValue(ArticleStatus::class)],
    //             'schedule_at' => ['nullable', 'date', 'after:now'],
    //             'is_commentable' => ['boolean'],

    //         ], $this->messages()
    //     )->validate();

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
    // }

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

    // SOFT DELETE
    // public function deleteArticle()
    // {
    //     Validator::make(
    //         [
    //             'copietitre' => $this->copieTitreArticle,
    //         ],
    //         [
    //             'copietitre' => ['required', Rule::in([$this->titreArticle])],
    //         ], $this->messages()
    //     )->validate();

    //     $this->article->delete();
    //     $this->reset(['copieTitreArticle']);

    //     // Déclenchez un événement pour indiquer la suppression d'un article au component gestion-commentaires pour actualiser la liste des commentaires
    //     $this->emit('articleSupprime');

    //     session()->flash('openBigTab', 2);
    //     redirect()->route('admin.gestion_articles')->with('message', "L'article a bien été supprimé.");
    // }

    // // Redirige vers la vue liste articles si edit annulé
    // public function returnListArticles() :void
    // {
    //     session()->flash('openBigTab', 2);
    //     redirect()->route('admin.gestion_articles');
    // }

    // public function resetError()
    // {
    //     $this->resetErrorBag('image');
    // }
}


