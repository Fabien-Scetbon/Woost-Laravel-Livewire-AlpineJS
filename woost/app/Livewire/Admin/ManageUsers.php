<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Enums\UserStatus;
use BenSampo\Enum\Rules\EnumValue;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;
class ManageUsers extends Component
{
    use WithPagination;

    public bool $showCategoriePanel = false;

    public int $showCategorie = 10;

    public string $searchCategorie = '';

    public $searchStatut = null;

    // variables pour catégories

    public $currentCategorie = null;               //Objet Categorie lorsqu'on modifie une categorie existante

    public bool $creatingNewCategorie = true;    // creation ou edition d'une categorie

    public string $titleCategorieEditing;          // Titre du modal categorie

    public string $subTitleCategorieEditing;       // Sous-titre du modal categorie

    // Liste des inputs pour la création / modification / suppression d'une catégorie

    public string $nomCategorie = '';

    public string $descriptionCategorie = '';

    public $categorieStatut;

    public string $copieNomCategorie = '';

    // gere l'affichage des articles par asc et desc

    public $sortBy = 'nom'; // par défaut

    public bool $ascending = true;

    // détecter quelle colonne doit être triée

    private function getSortColumn()
    {
        return match ($this->sortBy) {
            'nb-articles' => 'articles_count',
            default => 'categorie_articles.nom',
        };
    }

    // liste de messages d'erreur lors des add et update

    protected function messages()
    {
        return [
            'nom.required' => 'Le nom est obligatoire',
            'nom.max' => 'Le nom ne doit pas dépasser 40 caractères',
            'nom.unique' => 'Ce nom est déjà utilisé',
            'description.required' => 'La description est obligatoire',
            'description.max' => 'La description ne doit pas dépasser 300 caractères',
            'copienom.required' => 'Veuillez recopier le nom de la catégorie',
            'copienom.in' => 'Les deux noms ne sont pas identiques',
        ];
    }

    public function checkMessages()
    {
        $conditions = [
            'addCategorieSuccess',
            'updateCategorieSuccess',
            'deleteCategorieSuccess',
        ];

        foreach ($conditions as $condition) {
            if (session()->has($condition)) {
                return true;
            }
        }
        return false;
    }

    // initialisation de la view
    public function mount()
    {
        $this->initCategorieTitles();
    }

    // initialisation des titres et sous-titres du categorie panel en fonction de add ou update
    public function initCategorieTitles()
    {
        if ($this->creatingNewCategorie)
        {
            $this->titleCategorieEditing = 'Nouvelle catégorie';
            $this->subTitleCategorieEditing = "Création d'une nouvelle catégorie";
        } else {
            $this->titleCategorieEditing = $this->currentCategorie->nom;
            $this->subTitleCategorieEditing = "Modification de la catégorie";
        }
    }

    // initialiser la modification d'une categorie
    public function modifyCategorie($categorie_id)
    {
        $this->creatingNewCategorie = false;
        $this->currentCategorie = CategorieArticle::select(['id', 'nom', 'description', 'statut'])->find($categorie_id);
        $this->initCategorieTitles();
        $this->initInputForModifingCategorie();
    }

    // initialiser les champs du form pour la modification d'une categorie
    private function initInputForModifingCategorie()
    {
        $this->nomCategorie = $this->currentCategorie->nom;
        $this->descriptionCategorie = $this->currentCategorie->description;
        $this->categorieStatut = $this->currentCategorie->statut;
    }

    // creer ou updater une categorie
    public function saveCategorie()
    {
        $validatedData = Validator::make(
            [
                'nom' => $this->nomCategorie,
                'description' => $this->descriptionCategorie,
                'statut' => is_null($this->categorieStatut) ? \App\Enums\ArticleStatus::Depublier : intval($this->categorieStatut), // contourner le pb de la valeur 0
            ],
            [
                'nom' => ['required', 'max:40', new NameTrashExists, Rule::unique('categorie_articles')->ignore($this->currentCategorie->id ?? null)], // ignore pour lever la Rule::unique pour update
                'description' => ['required', 'max:300'],
                'statut' => [new EnumValue(ArticleStatus::class)],
            ], $this->messages()
        )->validate();

        // Capitalize le nom avant de le stocker
        $validatedData['nom'] = Str::ucfirst($validatedData['nom']);

        if ($this->creatingNewCategorie)  // on cree une nouvelle categorie
        {
            CategorieArticle::create($validatedData);
            session()->flash('addCategorieSuccess', 'La catégorie a bien été ajoutée.');

        } else {   // on update une categorie existante

            $this->currentCategorie->update($validatedData);
            session()->flash('updateCategorieSuccess', 'Les modifications apportées à cette catégorie ont été mises à jour.');
        }

        $this->resetCategorieInputs();
    }

    // recupère la liste des categories sauf les soft-deleted
    public function getListeCategoriesArticleProperty(): LengthAwarePaginator
    {
        $categories = CategorieArticle::with('articles')
            ->select('id', 'nom', 'description', 'statut')
            ->withcount('articles')
            ->when($this->searchCategorie, function ($query, $searchCategorie) {
                $query->where('nom', 'like', '%' . $searchCategorie . '%');
            })
            ->when(isset($this->searchStatut) && $this->searchStatut !== 'all', function ($query) {
                $query->where('statut', $this->searchStatut);
            });

        $order = $this->ascending ? 'asc' : 'desc';

        return $categories->orderBy($this->getSortColumn(), $order)
                ->paginate($this->showCategorie);
    }

    public function toggleSorting($column)
    {
        if ($this->sortBy === $column) {
            $this->ascending = !$this->ascending;
        } else {
            $this->sortBy = $column;
            $this->ascending = true;
        }

        $this->getListeCategoriesArticleProperty();
    }

    // SOFT DELETE
    public function deleteCategorie()
    {
        Validator::make(
            [
                'copienom' => $this->copieNomCategorie,
            ],
            [
                'copienom' => ['required', Rule::in([$this->currentCategorie->nom])],
            ], $this->messages()
        )->validate();

            $this->currentCategorie->delete();
            $this->resetCategorieInputs();

            // Déclenchez un événement pour indiquer la suppression d'une catégorie au component gestion-articles pour actualiser la liste des articles
            $this->emit('categorieSupprimee');

            session()->flash('deleteCategorieSuccess', 'La catégorie a bien été supprimée.');
    }

    public function resetCategorieInputs()
    {
        $this->reset(['nomCategorie', 'descriptionCategorie', 'categorieStatut', 'copieNomCategorie', 'showCategoriePanel', 'creatingNewCategorie', 'currentCategorie']);
        $this->initCategorieTitles();
    }
}

