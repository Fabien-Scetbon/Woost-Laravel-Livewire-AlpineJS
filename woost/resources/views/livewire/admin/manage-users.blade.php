<div>
    <div x-data="{openDeleteModal: @entangle('openDeleteModal')}">
        <div class="mx-auto">
            <div class="overflow-hidden rounded-lg bg-white shadow mt-4">
                <div class="p-10">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <div class="flex flex-row justify-between">
                            <h1 class="sm:text-base md:text-lg font-semibold text-gray-900 mb-0 md:mb-2">Liste des utilisateurs</h1>
                            <div class="flex mt-4 sm:mt-0 sm:flex-none">
                                <a href="{{ route('admin.edit_user') }}" class="inline-flex justify-center md:justify-start flex-grow md:flex-grow-0 md:ml-0 items-center rounded-md border border-transparent bg-sky-500 px-3 py-2 text-sm font-medium leading-4 text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="-ml-0.5 mr-2 h-4 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                    Ajouter un utiisateur
                                </a>
                            </div>
                        </div>
                        @if(session()->has('deleteUserSuccess'))
                        <div class="w-1/2 flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium">{{ session('deleteUserSuccess') }}</span>
                            </div>
                        </div>
                        @endif
                        @if ($errors->has('no_authorization'))
                        <div class="w-1/2 flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium">{{ $errors->first('no_authorization') }}</span>
                            </div>
                        </div>
                        @endif
                        <div class="mt-6 flex flex-col">
                            <div class="flex justify-between flex-1 mb-2 sm:mb-0 sm:hidden">
                                <p> include('backend.partials.paginator-mobile', ['paginator' => $this->users])</p>
                            </div>
                            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                        <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
                                            <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                                                <div>
                                                    <p class="text-sm text-gray-700 leading-5">
                                                        <span>Résultats de</span>
                                                        <span class="font-medium">{{ $this->users->firstItem() }}</span>
                                                        <span>à</span>
                                                        <span class="font-medium">{{ $this->users->lastItem() }}</span>
                                                        <br />(
                                                        <span class="font-medium">{{ $this->users->total() }}</span>
                                                        <span>résultats</span>)
                                                    </p>
                                                </div>
                                                <div class="flex gap-4">
                                                    <select wire:model.live="showUser" id="User" name="User" class="rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                                        <option value="10">10</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select>
                                                    <div class="flex-1 mt-2 text-sm text-gray-900">utilisateurs par page</div>
                                                </div>
                                                <div>
                                                    {{ $this->users->links() }}
                                                </div>
                                            </div>
                                        </div>

                                        <table class="min-w-full table-fixed divide-y divide-gray-300">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th wire:click="toggleSorting('lastname')" scope="col" class="flex items-center min-w-[12rem] py-3.5 pr-3 text-left text-sm font-bold text-gray-900 px-6 hover:cursor-pointer hover:text-gray-500">
                                                        <div class="flex items-center">
                                                            Nom
                                                            @if($sortBy === 'lastname')
                                                            <x-arrow-sorting :ascending="$ascending" />
                                                            @endif
                                                        </div>
                                                    </th>
                                                    <th wire:click="toggleSorting('firstname')" scope="col" class="pflex items-center min-w-[12rem] py-3.5 pr-3 text-left text-sm font-bold text-gray-900 px-6 hover:cursor-pointer hover:text-gray-500">
                                                        <div class="flex items-center">
                                                            Prénom
                                                            @if($sortBy === 'firstname')
                                                            <x-arrow-sorting :ascending="$ascending" />
                                                            @endif
                                                        </div>
                                                    </th>
                                                    <th wire:click="toggleSorting('email')" scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-bold text-gray-900 px-6 sm:w-16 sm:px-8 hover:cursor-pointer hover:text-gray-500">
                                                        <div class="flex items-center">
                                                            Adresse mail
                                                            @if($sortBy === 'email')
                                                            <x-arrow-sorting :ascending="$ascending" />
                                                            @endif
                                                        </div>
                                                    </th>
                                                    <th wire:click="toggleSorting('postalcode')" scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-bold text-gray-900 px-6 sm:w-16 sm:px-8 hover:cursor-pointer hover:text-gray-500">
                                                        <div class="flex items-center">
                                                            Code postal
                                                            @if($sortBy === 'postalcode')
                                                            <x-arrow-sorting :ascending="$ascending" />
                                                            @endif
                                                        </div>
                                                    </th>
                                                    <th wire:click="toggleSorting('created_at')" scope="col" class="inline-flex px-3 py-3.5 text-center text-sm font-bold text-gray-900 hover:cursor-pointer hover:text-gray-500">
                                                        <div class="flex items-center">
                                                            Date d'inscription
                                                            @if($sortBy === 'created_at')
                                                            <x-arrow-sorting :ascending="$ascending" />
                                                            @endif
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Statut</th>
                                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Restrictions</th>
                                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"></th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-200 bg-white">
                                                <tr>
                                                    <td class="whitespace-nowrap pl-6 py-4 text-sm text-gray-500">
                                                        <div class="md:flex sm:w-56">
                                                            <input wire:model.live.debounce.500ms="searchUser" type="text" class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Recherche utilisateur">
                                                        </div>
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">
                                                    </td>
                                                    <td class="whitespace-nowrap pl-6 py-4 text-sm text-gray-500">
                                                        <div class="md:flex sm:w-48 mt-4 sm:mt-0">
                                                            <input wire:model.live.debounce.500ms="searchEmail" type="text" class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Recherche mail">

                                                        </div>
                                                    </td>
                                                    <td class="whitespace-nowrap pl-7 py-4 text-sm text-gray-500">
                                                        <div class="md:flex sm:w-48 mt-4 sm:mt-0">
                                                            <input wire:model.live.debounce.500ms="searchPostalcode" type="text" class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Recherche code postal">
                                                        </div>
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                        <div class="md:flex sm:w-48 mt-4 sm:mt-0">
                                                            <select wire:model.live="searchStatus" id="choicestatus" name="choicestatus" class="block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-500 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                                <option value="all" selected>Tous</option>
                                                                <option value="{{\App\Enums\UserStatus::Member}}">Membre</option>
                                                                <option value="{{\App\Enums\UserStatus::Admin}}">Admin</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">
                                                    </td>

                                                </tr>
                                                @forelse($this->users as $user)
                                                <tr>
                                                <tr wire:click="redirectToControlUser( '{{ $user->id }}' )" wire:key="{{ $user->id }}" class="hover:bg-gray-100 hover:cursor-pointer">
                                                    <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900 px-6">
                                                        {{ $user->lastname }}
                                                    </td>
                                                    <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900 px-6">
                                                        {{ $user->firstname }}
                                                    </td>
                                                    <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900 px-6">
                                                        {{ $user->email }}
                                                    </td>
                                                    <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900 px-6">
                                                        {{ $user->postalcode }}
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-left">
                                                        {{ $user->formatDate($user->created_at) }}
                                                    </td>
                                                    <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900 px-6">
                                                        {{ $user->status }}
                                                    </td>
                                                    <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900 px-6">
                                                        {{ $user->is_ban }}
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">
                                                        <span wire:click.stop="setUserToDelete( {{ $user->id }} )" class="inline-flex items-center rounded-full bg-red-100 px-2.5 py-0.5 text-xs font-medium text-red-700 hover:bg-red-500 hover:text-white hover:cursor-pointer">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                            </svg>
                                                        </span>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td class="whitespace-nowrap text-center py-6 pr-3 text-sm font-medium text-gray-900 px-6" colspan="5">
                                                        Il n'y a aucun résultat pour cette recherche.
                                                    </td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>

                                        <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
                                            <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                                                <div>
                                                    <p class="text-sm text-gray-700 leading-5">
                                                        <span>Résultats de</span>
                                                        <span class="font-medium">{{ $this->users->firstItem() }}</span>
                                                        <span>à</span>
                                                        <span class="font-medium">{{ $this->users->lastItem() }}</span>
                                                        <br />(
                                                        <span class="font-medium">{{ $this->users->total() }}</span>
                                                        <span>résultats</span>)
                                                    </p>
                                                </div>
                                                <div>
                                                    {{ $this->users->links() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-1 justify-between sm:hidden mt-5 sm:mt-0">
                            <p> include('backend.partials.paginator-mobile', ['paginator' => $this->users])</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div x-cloak x-show="openDeleteModal" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div x-show="openDeleteModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div x-show="openDeleteModal" class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                    <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                    <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                    <h3 class="text-base font-semibold leading-6 text-red-700" id="modal-title">Supprimer cet utilisateur</h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">Attention, vous allez supprimer cet utilisateur.</p>
                                        <p class="text-sm text-red-500 font-medium">Cette action est irréversible. </p>
                                        <p class="text-sm text-gray-500">Veuillez confirmer la suppression : </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                            <button x-on:click="openDeleteModal = false" type="button" wire:click="deleteUser" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Supprimer</button>
                            <button x-on:click="openDeleteModal = false" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Annuler</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>