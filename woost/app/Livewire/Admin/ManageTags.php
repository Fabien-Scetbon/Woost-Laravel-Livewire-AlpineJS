<?php

namespace App\Livewire\Admin;

// use App\Models\Publication;
use App\Models\Tag;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;

class ManageTags extends Component
{
    use WithPagination;

    public int $showTag = 10;

    // variables pour la recherche

    public $searchTag = '';

    // gere l'affichage des tags par asc et desc selon 2 critères

    public $sortBy = 'nom'; // par défaut

    public $ascending = true;

    // détecter quelle colonne doit être triée
    private function getSortColumn()
    {
        return match ($this->sortBy) {
            'nb_articles' => 'articles_count',
            default => 'name',
        };
    }

    // recupère la liste des tags
    #[Computed]
    public function tags(): LengthAwarePaginator
    {
        $tags = Tag::select('id', 'name')                  // ::with('publications')
            
            // ->withcount('articles')
            ->when($this->searchTag, function ($query, $searchTag) {
                $query->where('nom', 'like', '%' . $searchTag . '%');
            });

        $order = $this->ascending ? 'asc' : 'desc';

        return $tags->orderBy($this->getSortColumn(), $order)
            ->paginate($this->showTag);
    }

    public function toggleSorting($column)
    {
        if ($this->sortBy === $column) {
            $this->ascending = !$this->ascending;
        } else {
            $this->sortBy = $column;
            $this->ascending = true;
        }

        $this->tags();
    }
}
