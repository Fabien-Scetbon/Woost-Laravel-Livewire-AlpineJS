<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Enums\UserStatus;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ManageUsers extends Component

{
    use WithPagination;

    public int $showUser = 10;

    // variables pour la recherche

    public $searchUser = '';

    public $searchEmail = '';

    public $searchPostalcode = '';

    public $searchStatus = '';

    

    // gere l'affichage des commentaires par asc et desc selon 4 critères

    public $sortBy = 'nom_auteur'; // par défaut

    public $ascending = true;

    // variable pour delete

    public $openDeleteModal = false;

    public $commentaireToDeleteId = null;

    // met a jour la liste des commentaires quand un article vient d'etre supprime

    protected $listeners = ['articleSupprime' => '$refresh'];

    // détecter quelle colonne doit être triée    Commentaires
    private function getSortColumn()
    {
        return match ($this->sortBy) {
            'categorie' => 'categorie_articles.nom',
            'titre' => 'articles.titre',
            'created_at' => 'commentaires.created_at',
            default => 'commentaires.nom_auteur',
        };
    }

    // recupère la liste des articles sauf les soft-deleted
    public function getListeCommentairesProperty(): LengthAwarePaginator
    {
        $commentaires = Commentaire::with( 'article.categorie')
            ->select('commentaires.id', 'commentaires.nom_auteur', 'commentaires.contenu', 'commentaires.article_id', 'commentaires.created_at')
            ->join('articles', 'articles.id', '=', 'commentaires.article_id')
            ->join('categorie_articles', 'categorie_articles.id', '=', 'articles.categorie_article_id')
            ->when($this->searchCategorie, function ($query, $searchCategorie) {
                $query->whereHas('article.categorie', function ($innerQuery) use ($searchCategorie) {
                    $innerQuery->where('nom', 'like', '%' . $searchCategorie . '%');
                });
            })
            ->when($this->searchAuteur, function ($query, $searchAuteur) {
                $query->where('commentaires.nom_auteur', 'like', '%' . $searchAuteur . '%');
            })
            ->when($this->searchArticle, function ($query, $searchArticle) {
                $query->whereHas('article', function ($innerQuery) use ($searchArticle) {
                    $innerQuery->where('titre', 'like', '%' . $searchArticle . '%');
                });
            });

        $order = $this->ascending ? 'asc' : 'desc';

        return $commentaires->orderBy($this->getSortColumn(), $order)
            ->paginate($this->showCommentaire);
    }

    public function toggleSorting($column)
    {
        if ($this->sortBy === $column) {
            $this->ascending = !$this->ascending;
        } else {
            $this->sortBy = $column;
            $this->ascending = true;
        }

        $this->getListeCommentairesProperty();
    }

    public function setCommentaireToDelete($commentaireID)
    {
        $this->commentaireToDeleteId = $commentaireID;
        $this->openDeleteModal = true;
    }

    public function deleteCommentaire()
    {
        if (Auth::user()->hasRole('administrator'))
        {
            $commentaire = Commentaire::find($this->commentaireToDeleteId);
            $commentaire->delete();
            $this->reset(['commentaireToDeleteId']);
            session()->flash('deleteCommentaireSuccess', 'Le commentaire a bien été supprimé.');

        } else {
            throw ValidationException::withMessages([
                'no_authorization' => "Vous n'êtes pas autorisé à supprimer des commentaires.",
            ]);
        }
    }
}


