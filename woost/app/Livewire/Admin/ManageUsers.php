<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;
use App\Models\User;
use App\Enums\UserStatus;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;
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

    // gere l'affichage des commentaires par asc et desc selon 6 critères

    public $sortBy = 'lastname'; // par défaut

    public $ascending = true;

    // variable pour delete

    public $openDeleteModal = false;

    public $userToDeleteId = null;

    // détecter quelle colonne doit être triée   
    private function getSortColumn()
    {
        return match ($this->sortBy) {
            'firstname' => 'firstname',
            'email' => 'email',
            'created_at' => 'created_at',
            'postalcode' => 'postalcode',
            default => 'lastname',
        };
    }

    // recupère la liste des utilisateurs
    #[Computed]
    public function users(): LengthAwarePaginator
    {
        $users = User::select('id', 'firstname', 'lastname', 'email', 'postalcode', 'status', 'is_ban', 'created_at')
            ->when($this->searchUser, function ($query, $searchUser) {
                $query->where('lastname', 'like', '%' . $searchUser . '%')
                    ->orWhere('firstname', 'like', '%' . $searchUser . '%');
            })
            ->when($this->searchEmail, function ($query, $searchEmail) {
                $query->where('email', 'like', '%' . $searchEmail . '%');
            })
            ->when($this->searchPostalcode, function ($query, $searchPostalcode) {
                $query->where('postalcode', 'like', '%' . $searchPostalcode . '%');
            })
            ->when($this->searchStatus, function ($query, $searchStatus) {
                $query->where('status', 'like', '%' . $searchStatus . '%');
            });

        $order = $this->ascending ? 'asc' : 'desc';

        return $users->orderBy($this->getSortColumn(), $order)
            ->paginate($this->showUser);
    }

    public function toggleSorting($column)
    {
        if ($this->sortBy === $column) {
            $this->ascending = !$this->ascending;
        } else {
            $this->sortBy = $column;
            $this->ascending = true;
        }

        $this->users();
    }

    public function setUserToDelete($userID)
    {
        $this->userToDeleteId = $userID;
        $this->openDeleteModal = true;
    }

    public function deleteUser()
    {
        $user = User::find($this->userToDeleteId);
            $user->delete();
            $this->reset(['userToDeleteId']);
            session()->flash('deleteUserSuccess', "L'utilisateur a bien été supprimé.");
        
        // if (Auth::user()->hasRole('administrator')) {
        //     $user = User::find($this->userToDeleteId);
        //     $user->delete();
        //     $this->reset(['userToDeleteId']);
        //     session()->flash('deleteUserSuccess', "L'utilisateur a bien été supprimé.");
        // } else {
        //     throw ValidationException::withMessages([
        //         'no_authorization' => "Vous n'êtes pas autorisé à supprimer des utilisateurs.",
        //     ]);
        // }
    }
}
