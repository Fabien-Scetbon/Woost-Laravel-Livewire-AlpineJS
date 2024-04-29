<div>
    <div class="mx-auto">
        <div class="overflow-hidden rounded-lg bg-white shadow mt-4">
            <div class="p-10">
                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="flex flex-row justify-between">
                        <h1 class="sm:text-base md:text-lg font-semibold text-gray-900 mb-2">Liste des niveaux</h1>
                    </div>

                    <div class="mt-6 flex flex-col">
                        <div class="flex justify-between flex-1 mb-2 sm:mb-0 sm:hidden">
                            <!-- include('backend.partials.paginator-mobile', ['paginator' => $this->levels]) -->
                        </div>
                        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
                                        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                                            <div>
                                                <p class="text-sm text-gray-700 leading-5">
                                                    <span>Résultats de</span>
                                                    <span class="font-medium">{{ $this->levels->firstItem() }}</span>
                                                    <span>à</span>
                                                    <span class="font-medium">{{ $this->levels->lastItem() }}</span>
                                                    <br />(
                                                    <span class="font-medium">{{ $this->levels->total() }}</span>
                                                    <span>résultats</span>)
                                                </p>
                                            </div>
                                            <div class="flex gap-4">
                                                <select wire:model="showLevel" id="level" name="level" class="rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                                    <option value="10">10</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select>
                                                <div class="flex-1 mt-2 text-sm text-gray-900">niveaux par page</div>
                                            </div>
                                            <div>
                                                {{ $this->levels->onEachSide(1)->links() }}
                                            </div>
                                        </div>
                                    </div>

                                    <table class="min-w-full table-fixed divide-y divide-gray-300">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th wire:click="toggleSorting('name')" scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-bold text-gray-900 px-6 sm:w-16 sm:px-8 hover:cursor-pointer hover:text-gray-500">
                                                    <div class="flex items-center">
                                                        Nom
                                                        @if($sortBy === 'name')
                                                        <x-arrow-sorting :ascending="$ascending" />
                                                        @endif
                                                    </div>
                                                </th>
                                                <th wire:click="toggleSorting('nb_articles')" scope="col" class="whitespace-nowrap px-3 py-4 text-sm font-bold text-gray-900 hover:cursor-pointer hover:text-gray-500">
                                                    <div class="flex items-center justify-center">
                                                        Nombre d'articles associés
                                                        @if($sortBy === 'nb_members')
                                                        <x-arrow-sorting :ascending="$ascending" />
                                                        @endif
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                            <tr>
                                                <td class="whitespace-nowrap pl-6 py-4 text-sm text-gray-500">
                                                    <div class="md:flex sm:w-48 mt-4 sm:mt-0">
                                                        <input wire:model.debounce.500ms="searchLevel" type="text" class="block rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm mt-5 md:mt-0" placeholder="Rechercher un niveau">
                                                    </div>
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                </td>
                                            </tr>

                                            @forelse($this->levels as $level)
                                            <tr>
                                                <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900 px-6">
                                                    {{ $level->name }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">
                                                    <span class="inline-flex items-center px-2.5 py-0.5 text-xs font-medium text-gray-900">15</span> <!-- $level->publications->count() -->
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td class="whitespace-nowrap text-center py-6 pr-3 text-sm font-medium text-gray-900 px-6" colspan="2">
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
                                                    <span class="font-medium">{{ $this->levels->firstItem() }}</span>
                                                    <span>à</span>
                                                    <span class="font-medium">{{ $this->levels->lastItem() }}</span>
                                                    <br />(
                                                    <span class="font-medium">{{ $this->levels->total() }}</span>
                                                    <span>résultats</span>)
                                                </p>
                                            </div>
                                            <div>
                                                {{ $this->levels->onEachSide(1)->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-1 justify-between sm:hidden mt-5 sm:mt-0">
                        <!-- include('backend.partials.paginator-mobile', ['paginator' => $this->levels]) -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>