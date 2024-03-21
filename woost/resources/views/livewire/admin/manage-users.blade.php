<div>
    <div x-data="{
        openCategoriePanel:@entangle('showCategoriePanel'),
        openSmallTab: 1,
        activeSmallTabClasses: 'border-indigo-500 text-indigo-600',
        inactiveSmallTabClasses: 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'
    }">
        <div class="mx-auto">
            <div class="overflow-hidden rounded-lg bg-white shadow mt-4">
                <div class="p-10">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <div class="flex flex-row justify-between">
                            <h1 class="sm:text-base md:text-lg font-semibold text-gray-900 mb-2">Liste des catégories</h1>
                            <div class="flex sm:flex-none">
                                <button x-on:click="openCategoriePanel = true; openSmallTab = 1" type="button" class="inline-flex justify-center md:justify-start flex-grow md:flex-grow-0 md:ml-0 items-center rounded-md border border-transparent bg-indigo-600 px-3 py-2 text-sm font-medium leading-4 text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="-ml-0.5 mr-2 h-4 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                    Ajouter une catégorie
                                </button>
                            </div>
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
                                            @if(session()->has('addCategorieSuccess'))
                                                {{ session('addCategorieSuccess') }}
                                            @elseif(session()->has('updateCategorieSuccess'))
                                                {{ session('updateCategorieSuccess') }}
                                            @elseif(session()->has('deleteCategorieSuccess'))
                                                {{ session('deleteCategorieSuccess') }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="mt-6 flex flex-col">
                            <div class="flex justify-between flex-1 mb-2 sm:mb-0 sm:hidden">
                                @include('backend.partials.paginator-mobile', ['paginator' => $this->listeCategoriesArticle])
                            </div>
                            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                        <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
                                            <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                                                <div>
                                                    <p class="text-sm text-gray-700 leading-5">
                                                        <span>Résultats de</span>
                                                        <span class="font-medium">{{ $this->listeCategoriesArticle->firstItem() }}</span>
                                                        <span>à</span>
                                                        <span class="font-medium">{{ $this->listeCategoriesArticle->lastItem() }}</span>
                                                        <br/>(
                                                        <span class="font-medium">{{ $this->listeCategoriesArticle->total() }}</span>
                                                        <span>résultats</span>)
                                                    </p>
                                                </div>
                                                <div class="flex gap-4">
                                                    <select wire:model="showCategorie" id="categorie" name="categorie" class="rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                                        <option value="10">10</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select>
                                                    <div class="flex-1 mt-2 text-sm text-gray-900">catégories par page</div>
                                                </div>
                                                <div>
                                                    {{ $this->listeCategoriesArticle->onEachSide(1)->links() }}
                                                </div>
                                            </div>
                                        </div>

                                        <table class="min-w-full table-fixed divide-y divide-gray-300">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th wire:click="toggleSorting('nom')" scope="col"
                                                        class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-bold text-gray-900 px-6 sm:w-16 sm:px-8 hover:cursor-pointer hover:text-gray-500">
                                                        <div class="flex items-center">
                                                            Nom
                                                            @if($sortBy === 'nom')
                                                                <x-arrow-sorting :ascending="$ascending"/>
                                                            @endif
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Description</th>
                                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Statut</th>
                                                    <th wire:click="toggleSorting('nb_articles')" scope="col"
                                                        class="whitespace-nowrap px-3 py-4 text-sm font-bold text-gray-900 hover:cursor-pointer hover:text-gray-500">
                                                        <div class="flex items-center justify-center">
                                                            Nombre d'articles associés
                                                            @if($sortBy === 'nb_articles')
                                                                <x-arrow-sorting :ascending="!$ascending"/>
                                                            @endif
                                                        </div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-200 bg-white">
                                                <tr>
                                                    <td class="whitespace-nowrap pl-6 py-4 text-sm text-gray-500">
                                                        <div class="md:flex sm:w-48 mt-4 sm:mt-0">
                                                            <input wire:model.debounce.500ms="searchCategorie" type="text"
                                                                   class="block rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm mt-5 md:mt-0"
                                                                   placeholder="Rechercher une catégorie">
                                                        </div>
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                        <div class="md:flex sm:w-48 mt-4 sm:mt-0">
                                                            <select wire:model="searchStatut" id="choixstatut" name="choixstatut" class="block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-500 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                                <option value="all" selected>Tous</option>
                                                                <option value="{{\App\Enums\ArticleStatus::Depublier}}">Dépubliée</option>
                                                                <option value="{{\App\Enums\ArticleStatus::Publier}}">Publiée</option>
                                                                <option value="{{\App\Enums\ArticleStatus::Archiver}}">Archivée</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">
                                                    </td>
                                                </tr>

                                            @forelse($this->listeCategoriesArticle as $categorie)
                                                <tr wire:click="modifyCategorie({{ $categorie->id }})" x-on:click="openCategoriePanel = true; openSmallTab = 1" class="hover:bg-gray-100 hover:cursor-pointer">
                                                    <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900 px-6">
                                                        <div data-tippy-content="{{ $categorie->nom }}" class="text-sm font-medium text-gray-900">
                                                            {{ \Illuminate\Support\Str::limit($categorie->nom, 35) }}
                                                        </div>
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                        <div data-tippy-content="{{ $categorie->description }}">
                                                            {{ \Illuminate\Support\Str::limit($categorie->description, 25) }}
                                                        </div>
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                        @switch($categorie->statut)
                                                            @case(\App\Enums\ArticleStatus::Depublier)
                                                                <span class="inline-flex items-center rounded-full bg-red-100 px-2.5 py-0.5 text-xs font-medium text-red-800">Dépubliée</span>
                                                                @break
                                                            @case(\App\Enums\ArticleStatus::Publier)
                                                                <span class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800">Publiée</span>
                                                                @break
                                                            @case(\App\Enums\ArticleStatus::Archiver)
                                                                <span class="inline-flex items-center rounded-full bg-orange-100 px-2.5 py-0.5 text-xs font-medium text-orange-800">Archivée</span>
                                                                @break
                                                        @endswitch
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">
                                                        <span class="inline-flex items-center px-2.5 py-0.5 text-xs font-medium text-gray-900">{{ $categorie->articles->count() }}</span>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td class="whitespace-nowrap text-center py-6 pr-3 text-sm font-medium text-gray-900 px-6" colspan="4">
                                                        Il n'y a aucun résultat pour cette recherche.
                                                    </td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                        <!-- This example requires Tailwind CSS v2.0+ -->
                                        <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
                                            <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                                                <div>
                                                    <p class="text-sm text-gray-700 leading-5">
                                                        <span>Résultats de</span>
                                                        <span class="font-medium">{{ $this->listeCategoriesArticle->firstItem() }}</span>
                                                        <span>à</span>
                                                        <span class="font-medium">{{ $this->listeCategoriesArticle->lastItem() }}</span>
                                                        <br/>(
                                                        <span class="font-medium">{{ $this->listeCategoriesArticle->total() }}</span>
                                                        <span>résultats</span>)
                                                    </p>
                                                </div>
                                                <div>
                                                    {{ $this->listeCategoriesArticle->onEachSide(1)->links() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-1 justify-between sm:hidden mt-5 sm:mt-0">
                            @include('backend.partials.paginator-mobile', ['paginator' => $this->listeCategoriesArticle])
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div x-cloak x-show="openCategoriePanel" class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
            <div x-show="openCategoriePanel" class="fixed bg-gray-500 bg-opacity-50 transition-opacity inset-0 "></div>

            <div class="fixed inset-0 overflow-hidden">
                <div class="absolute inset-0 overflow-hidden">
                    <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10 sm:pl-16">
                        <div x-show="openCategoriePanel"
                             x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                             x-transition:enter-start="translate-x-full"
                             x-transition:enter-end="translate-x-0"
                             x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                             x-transition:leave-start="translate-x-0"
                             x-transition:leave-end="translate-x-full"
                             class="pointer-events-auto w-screen max-w-md">
                            <form class="flex h-full flex-col divide-y divide-gray-200 bg-white shadow-xl">
                                <div class="h-0 flex-1 overflow-y-auto">
                                    <div class="bg-indigo-700 py-6 px-4 sm:px-6">
                                        <div class="flex items-center justify-between">
                                            <h2 class="text-lg font-medium text-white" id="slide-over-title">{{ $titleCategorieEditing }}</h2>
                                            <div class="ml-3 flex h-7 items-center">
                                                <button x-on:click="openCategoriePanel = false" wire:click="resetCategorieInputs" type="button" class="rounded-md bg-indigo-700 text-indigo-200 hover:text-white focus:outline-none focus:ring-2 focus:ring-white">
                                                    <span class="sr-only">Close panel</span>
                                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="mt-1">
                                            <p class="text-sm text-indigo-300">{{ $subTitleCategorieEditing }}</p>
                                        </div>
                                    </div>

                                    <div class="flex flex-1 flex-col justify-between">

                                        <div>
                                        @if(!$creatingNewCategorie)

                                                <div class="sm:hidden mx-auto mt-5 w-80 space-y-3">
                                                    <label for="smalltabs" class="text-sm text-gray-500">Que souhaitez-vous faire ?</label>
                                                    <select x-model="openSmallTab" id="smalltabs" name="smalltabs" class="block w-full rounded-md border-gray-300 text-sm text-gray-900 focus:border-indigo-500 focus:ring-indigo-500">
                                                        <option selected value="1">Modifier la catégorie</option>
                                                        <option value="2">Supprimer la catégorie</option>
                                                    </select>
                                                </div>

                                                <div class="hidden sm:block">
                                                    <div class="border-b border-gray-200">
                                                        <nav class="-mb-px flex justify-center space-x-8" aria-label="Tabs">

                                                            <a @click="openSmallTab = 1" href="#"
                                                               :class="openSmallTab === 1 ? activeSmallTabClasses : inactiveSmallTabClasses"
                                                               class="group inline-flex items-center border-b-2 py-4 px-1 text-sm font-medium">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-0.5">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                                </svg>
                                                                <span>Modifier la catégorie</span>
                                                            </a>

                                                            <a @click="openSmallTab = 2" href="#"
                                                               :class="openSmallTab === 2 ? activeSmallTabClasses : inactiveSmallTabClasses"
                                                               class="group inline-flex items-center border-b-2 py-4 px-1 text-sm font-medium">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                                </svg>
                                                                <span>Supprimer la catégorie</span>
                                                            </a>

                                                        </nav>
                                                    </div>
                                                </div>
                                            @endif

                                            <div class="w-full">

                                                <div x-show="openSmallTab == 1">
                                                    <div class="divide-y divide-gray-200 px-4 sm:px-6">
                                                        <div class="space-y-6 pt-6 pb-5">
                                                            <div>
                                                                <p class="text-sm text-gray-900 font-medium">
                                                                    {{ !$creatingNewCategorie ? 'Vous pouvez modifier les champs suivants :' : 'Veuillez compléter les champs suivants :' }}
                                                                </p>
                                                            </div>
                                                            <div>
                                                                <label for="nom" class="block text-sm font-medium text-gray-900">Nom <span class="text-red-700">*</span></label>
                                                                <div class="mt-1">
                                                                    <input wire:model.defer="nomCategorie" type="text" id="nomCategorie" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                                </div>
                                                                @error('nom') <small class="text-red-500">{{ $message }}</small> @enderror
                                                            </div>
                                                            <div>
                                                                <label for="descriptionCategorie" class="block text-sm font-medium text-gray-900">Description <span class="text-red-700">*</span></label>
                                                                <div class="mt-1">
                                                                    <textarea wire:model.defer="descriptionCategorie" rows="4" id="descriptionCategorie" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                                                                </div>
                                                                @error('description') <small class="text-red-500">{{ $message }}</small> @enderror
                                                            </div>
                                                            <div>
                                                                <p class="text-sm text-gray-900 font-medium pb-1">
                                                                    Statut de la catégorie
                                                                </p>
                                                                <p class="text-sm text-gray-900 pb-1">
                                                                    {{ !$creatingNewCategorie ? 'Vous pouvez modifier le statut de la catégorie :' : "Le statut par défaut d'une nouvelle catégorie est Dépubliée." }}
                                                                </p>
                                                            </div>

                                                            @if(!$creatingNewCategorie)
                                                            <fieldset class="mt-3">
                                                                <div class="space-y-2">
                                                                    <div class="flex items-center">
                                                                        <input wire:model.defer="categorieStatut" id="publier" name="categorieStatut" type="radio" value="{{\App\Enums\ArticleStatus::Publier}}" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                                        <label for="publier" class="ml-3 block text-sm leading-6 text-gray-900">Publiée</label>
                                                                    </div>
                                                                    <div class="flex items-center">
                                                                        <input wire:model.defer="categorieStatut" id="depublier" name="categorieStatut" type="radio" value="{{\App\Enums\ArticleStatus::Depublier}}" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                                        <label for="depublier" class="ml-3 block text-sm leading-6 text-gray-900">Dépubliée</label>
                                                                    </div>
                                                                    <div class="flex items-center">
                                                                        <input wire:model.defer="categorieStatut" id="archiver" name="categorieStatut" type="radio" value="{{\App\Enums\ArticleStatus::Archiver}}" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                                        <label for="archiver" class="ml-3 block text-sm leading-6 text-gray-900">Archivée</label>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="flex flex-shrink-0 justify-end px-4 py-4">
                                                        <button wire:click="resetCategorieInputs" type="button" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Annuler</button>

                                                        <button wire:loading.remove wire:click="saveCategorie" type="button" class="ml-4 basis-1/4 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Sauvegarder</button>
                                                        <button wire:loading.flex wire:target="saveCategorie" type="button" class="ml-4 basis-1/4 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-11 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                                            <svg class="w-6 h-5 animate-spin" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div x-show="openSmallTab == 2">
                                                    <div class="divide-y divide-gray-200 px-4 sm:px-6" >
                                                        <div class="pt-6 pb-5">
                                                            <div>
                                                                <p class="text-sm text-red-500 font-normal mb-2">
                                                                    Attention, vous allez supprimer une catégorie et tous les articles qui y sont rattachés.
                                                                </p>
                                                                <p class="text-sm text-red-500 font-medium mb-2">
                                                                    Cette action est irréversible !
                                                                </p>
                                                                <p class="text-sm text-gray-900">
                                                                    Pour supprimer cette catégorie, veuillez recopier son nom à l'identique dans la zone prévue à cet effet :
                                                                </p>
                                                            </div>
                                                            <div class="text-center mt-3">
                                                                <div class="p-2 border rounded border-blue-500 w-auto">
                                                                    {{ $nomCategorie }}
                                                                </div>
                                                            </div>
                                                            <div class="text-center mt-3">
                                                                <input wire:model.defer="copieNomCategorie" type="text" id="copieNomCategorie" placeholder="Recopier le nom ici" class="block w-full text-center rounded border-red-400 shadow-sm focus:border-red-500 focus:ring-red-500">
                                                            </div>
                                                            @error('copienom') <small class="text-red-500">{{ $message }}</small> @enderror

                                                            <div id="alertContainer1" class="mt-1 text-sm text-red-500">
                                                            @if(isset($message))
                                                                {{ $message }}
                                                            @endif
                                                            </div>

                                                        </div>
                                                        <div class="flex flex-shrink-0 justify-end px-4 py-4">
                                                            <button wire:click="resetCategorieInputs" type="button" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Annuler</button>

                                                            <button wire:loading.remove wire:click="deleteCategorie" type="button" class="ml-4 basis-1/4 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Supprimer</button>
                                                            <button wire:loading.flex wire:target="deleteCategorie" type="button" class="ml-4 basis-1/4 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-11 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                                                <svg class="w-6 h-5 animate-spin" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function updateMessage(message) {
            let alertContainer1 = document.getElementById('alertContainer1');
            alertContainer1.innerHTML = message;
        }

        document.addEventListener('copy', function (e) {
            e.preventDefault();
            updateMessage("Copier a été désactivé.");
        });

        document.addEventListener('cut', function (e) {
            e.preventDefault();
            updateMessage("Couper a été désactivé.");
        });

        document.addEventListener('paste', function (e) {
            e.preventDefault();
            updateMessage("Coller a été désactivé.");
        });
    </script>
</div>
