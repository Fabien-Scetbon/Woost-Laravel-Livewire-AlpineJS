<div>
    <div x-data="{openDeleteModal: @entangle('openDeleteModal')}">
        <div class="mx-auto">
            <div class="overflow-hidden rounded-lg bg-white shadow mt-4">
                <div class="p-10">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <div class="flex flex-row justify-between">
                            <h1 class="sm:text-base md:text-lg font-semibold text-gray-900 mb-0 md:mb-2">Liste des commentaires</h1>
                        </div>

                        @if($this->checkMessages())
                        <div class="rounded-md bg-blue-50 p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3 flex-1 md:flex md:justify-between">
                                    <p class="text-sm text-blue-700">
                                        @if(session()->has('addUserSuccess'))
                                        {{ session('addUserSuccess') }}
                                        @elseif(session()->has('updateUserSuccess'))
                                        {{ session('updateUserSuccess') }}
                                        @elseif(session()->has('deleteUserSuccess'))
                                        {{ session('deleteUserSuccess') }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="mt-6 flex flex-col">
                            <div class="flex justify-between flex-1 mb-2 sm:mb-0 sm:hidden">
                                <!-- @include('backend.partials.paginator-mobile', ['paginator' => $this->listeUser]) -->
                            </div>
                            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                        <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
                                            <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                                                <div>
                                                    <p class="text-sm text-gray-700 leading-5">
                                                        <span>Résultats de</span>
                                                        <span class="font-medium">{{ $this->listeUsers->firstItem() }}</span>
                                                        <span>à</span>
                                                        <span class="font-medium">{{ $this->listeUsers->lastItem() }}</span>
                                                        <br />(
                                                        <span class="font-medium">{{ $this->listeUsers->total() }}</span>
                                                        <span>résultats</span>)
                                                    </p>
                                                </div>
                                                <div class="flex gap-4">
                                                    <select wire:model="showUser" id="User" name="User" class="rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                                        <option value="10">10</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select>
                                                    <div class="flex-1 mt-2 text-sm text-gray-900">utilisateurs par page</div>
                                                </div>
                                                <div>
                                                    {{ $this->listeUsers->onEachSide(1)->links() }}
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
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-200 bg-white">
                                                <tr>
                                                    <td class="whitespace-nowrap pl-6 py-4 text-sm text-gray-500">
                                                        <div class="md:flex sm:w-56">
                                                            <input wire:model.debounce.500ms="searchUser" type="text" class="block rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm mt-5 md:mt-0" placeholder="Recherche utilisateur">
                                                        </div>
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">
                                                    </td>
                                                    <td class="whitespace-nowrap pl-6 py-4 text-sm text-gray-500">
                                                        <div class="md:flex sm:w-48 mt-4 sm:mt-0">
                                                            <input wire:model.debounce.500ms="searchEmail" type="text" class="block rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm mt-5 md:mt-0" placeholder="Recherche mail">
                                                        </div>
                                                    </td>
                                                    <td class="whitespace-nowrap pl-7 py-4 text-sm text-gray-500">
                                                        <div class="md:flex sm:w-48 mt-4 sm:mt-0">
                                                            <input wire:model.debounce.500ms="searchPostalcode" type="text" class="block rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm mt-5 md:mt-0" placeholder="Recherche code postal">
                                                        </div>
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                        <div class="md:flex sm:w-48 mt-4 sm:mt-0">
                                                            <select wire:model="searchStatus" id="choicestatus" name="choicestatus" class="block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-500 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                                <option value="all" selected>Tous</option>
                                                                <option value="{{\App\Enums\ArticleStatus::Depublier}}">Membre</option>
                                                                <option value="{{\App\Enums\ArticleStatus::Publier}}">Admin</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">
                                                    </td>

                                                </tr>
                                                @forelse($this->listeUsers as $user)
                                                <tr>
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
                                                        <span class="font-medium">{{ $this->listeUser->firstItem() }}</span>
                                                        <span>à</span>
                                                        <span class="font-medium">{{ $this->listeUser->lastItem() }}</span>
                                                        <br />(
                                                        <span class="font-medium">{{ $this->listeUser->total() }}</span>
                                                        <span>résultats</span>)
                                                    </p>
                                                </div>
                                                <div>
                                                    {{ $this->listeUser->onEachSide(1)->links() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-1 justify-between sm:hidden mt-5 sm:mt-0">
                            <!-- @include('backend.partials.paginator-mobile', ['paginator' => $this->listeUser]) -->
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