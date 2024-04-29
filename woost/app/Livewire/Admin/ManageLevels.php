<?php

namespace App\Livewire\Admin;

// use App\Models\Publication;
use App\Models\Level;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;

class ManageLevels extends Component
{
    use WithPagination;

    public int $showLevel = 10;

    // variables pour la recherche

    public $searchLevel = '';

    // gere l'affichage des tags par asc et desc selon 2 critères

    public $sortBy = 'name'; // par défaut

    public $ascending = true;

    // détecter quelle colonne doit être triée
    private function getSortColumn()
    {
        return match ($this->sortBy) {
            'nb_members' => 'members_count',
            default => 'name',
        };
    }

    // recupère la liste des tags
    #[Computed]
    public function levels(): LengthAwarePaginator
    {
        $levels = Level::select('id', 'name')                  // ::with('publications')
            
            // ->withcount('articles')
            ->when($this->searchLevel, function ($query, $searchLevel) {
                $query->where('name', 'like', '%' . $searchLevel . '%');
            });

        $order = $this->ascending ? 'asc' : 'desc';

        return $levels->orderBy($this->getSortColumn(), $order)
            ->paginate($this->showLevel);
    }

    public function toggleSorting($column)
    {
        if ($this->sortBy === $column) {
            $this->ascending = !$this->ascending;
        } else {
            $this->sortBy = $column;
            $this->ascending = true;
        }

        $this->levels();
    }
}
