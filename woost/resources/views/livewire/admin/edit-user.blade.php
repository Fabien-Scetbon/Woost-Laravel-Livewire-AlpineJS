<div>
    <div x-data="{openDeleteModal: false}">
        <div class="flex flex-col justify-start bg-indigo-600 mb-4 px-6 py-2.5 sm:px-3.5 rounded">
            <p class="text-md text-white my-1">{{ $subTitleUserEditing }} {{ $titleUserEditing }}</p>
        </div>

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

        <div class="w-full mx-auto">
            <form wire:submit="saveUser">
                <div class="md:flex md:gap-5">
                    {{-- Coté gauche --}}
                    <div class="md:w-3/4 overflow-hidden rounded-lg bg-white shadow p-2">
                        <div class="border-b border-gray-900/10 pb-12">
                            <h3 class="text-base font-semibold leading-7 text-gray-900 mb-5">Informations utilisateur</h3>
                            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                                <div class="sm:col-span-3">
                                    <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Prénom</label>
                                    <div class="mt-2">
                                        <input wire:model.defer="firstname" type="text" name="first-name" id="first-name" class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                    @error('firstname') <small class="text-red-500">{{ $message }}</small> @enderror
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Nom</label>
                                    <div class="mt-2">
                                        <input wire:model.defer="lastname" type="text" name="last-name" id="last-name" class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                    @error('lastname') <small class="text-red-500">{{ $message }}</small> @enderror
                                </div>

                                <div class="sm:col-span-3 sm:col-start-1">
                                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Adresse mail</label>
                                    <div class="mt-2">
                                        <input wire:model.defer="email" id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                    @error('email') <small class="text-red-500">{{ $message }}</small> @enderror
                                </div>

                                <div class="sm:col-span-1 sm:col-start-1">
                                    <label for="postalcode" class="block text-sm font-medium leading-6 text-gray-900">Code postal</label>
                                    <div class="mt-2">
                                        <input wire:model.defer="postalcode" wire:keydown.debounce.500ms="searchCityByPostalCode" id="postalcode" name="postalcode" type="text" class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                    @error('postalcode') <small class="text-red-500">{{ $message }}</small> @enderror
                                </div>

                                <div class="sm:col-span-2">
                                    <p class="block text-sm font-medium leading-6 text-gray-900">Ville</p>
                                    <div class="mt-2">
                                        <p wire:model="city" class="block w-full rounded-md border-0 h-9 px-2 py-1.5 text-gray-900 bg-gray-200 shadow-sm ring-1 ring-inset ring-gray-300">{{ $city }}</p>
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <p class="block text-sm font-medium leading-6 text-gray-900">Département</p>
                                    <div class="mt-2">
                                        <p wire:model="department" class="block w-full rounded-md border-0 h-9 px-2 py-1.5 text-gray-900 bg-gray-200 shadow-sm ring-1 ring-inset ring-gray-300">{{ $department }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 mb-4">
                            <h3 class="block text-base font-semibold leading-7 text-gray-900">Photo de profil ou Avatar</h3>
                            @error('image') <small class="text-red-500">{{ $message }}</small> @enderror
                            <div class="flex justify-around">
                                <div class="flex flex-col mt-2 w-1/4">
                                    <div onclick="chooseFile()" wire:click="resetError" class="flex max-w-lg justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6 mt-2 cursor-pointer">
                                        <div class="space-y-1 text-center">
                                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <div class="flex text-sm text-gray-600">
                                                <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                                    <span>Importer un fichier</span>
                                                    <input wire:model="image" id="file-upload" type="file" class="sr-only">
                                                </label>
                                            </div>
                                            <p class="text-xs text-gray-500">PNG, JPG & SVG jusqu'à 1MB</p>
                                        </div>
                                    </div>
                                    <p class="text-sm text-gray-700 mt-1 italic">Pour un meilleur affichage, préférez un format carré</p>
                                </div>

                                <script>
                                    function chooseFile() {
                                        let div = document.getElementById('file-upload');
                                        div.click();
                                    }
                                </script>

                                <div class="flex flex-col justify-center items-center">
                                    <div wire:loading wire:target="image" class="text-orange-500 mb-2">
                                        Chargement de votre image...
                                    </div>
                                    @if ($image)
                                    <img class="max-h-36 w-auto mx-auto" src="{{ $image->temporaryUrl() }}">
                                    @else
                                    @if(!$creatingNewUser)
                                    <p class="text-sm text-gray-500 mb-1">Image actuelle</p>
                                    <img class="w-36 mx-auto" src="{{ asset('storage/images/users/' . $user->image) }}" alt="Image de {{ $user->fullName() }}">
                                    @endif
                                    @endif
                                </div>
                            </div>

                        </div>


                    </div>

                    {{-- Coté droit --}}
                    <div class="md:w-1/4 overflow-hidden rounded-lg bg-white shadow p-2">
                        <div class="pb-5">

                            <h2 class="text-base font-semibold leading-7 text-gray-900">Mot de passe</h2>
                            <div class="mb-5">
                            @if(!$creatingNewUser)
                                <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Nouveau Mot de passe</label>
                            @endif
                                <div class="mt-2">
                                    <input wire:model.defer="password" name="password" id="password" type="text" class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                @error('password') <small class="text-red-500">{{ $message }}</small> @enderror
                            </div>

                            <h2 class="text-base font-semibold leading-7 text-gray-900">Options</h2>
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-2 lg:gap-8">
                                <div>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-700 font-medium pb-1">
                                            Statut
                                        </p>
                                    </div>

                                    <fieldset class="mt-3">
                                        <div class="space-y-2">
                                            <div class="flex items-center">
                                                <input wire:model.defer="status" id="visitor" name="status" type="radio" value="{{\App\Enums\UserStatus::Visitor}}" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                <label for="visitor" class="ml-3 block text-sm leading-6 text-gray-900">Visiteur</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input wire:model.defer="status" id="member" name="status" type="radio" value="{{\App\Enums\UserStatus::Member}}" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                <label for="member" class="ml-3 block text-sm leading-6 text-gray-900">Membre</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input wire:model.defer="status" id="admin" name="status" type="radio" value="{{\App\Enums\UserStatus::Admin}}" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                <label for="admin" class="ml-3 block text-sm leading-6 text-gray-900">Admin</label>
                                            </div>
                                        </div>
                                        @error('status') <small class="text-red-500">{{ $message }}</small> @enderror

                                    </fieldset>
                                </div>
                                <div>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-900 font-medium pb-1">
                                            Restrictions
                                        </p>

                                    </div>

                                    <fieldset class="mt-3">
                                        <div class="space-y-2">
                                            <div class="flex items-center">
                                                <input wire:model.defer="is_ban" id="is_not_ban" name="is_not_ban" type="radio" value="0" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                <label for="is_not_ban" class="ml-3 block text-sm leading-6 text-gray-900">Autoriser</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input wire:model.defer="is_ban" id="is_ban" name="is_ban" type="radio" value="1" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                <label for="is_ban" class="ml-3 block text-sm leading-6 text-gray-900">Bannir</label>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                {{-- boutons --}}
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <div class="sm:w-full md:w-auto">
                        <button wire:click="returnListUsers" type="button" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Annuler
                        </button>

                        <button wire:loading.remove wire:click="saveUser" type="button" class="ml-4 basis-1/4 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Sauvegarder
                        </button>
                        <button wire:loading.inline wire:target="saveUser" type="button" class="ml-4 basis-1/4 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-11 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            <svg class="w-6 h-5 animate-spin" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                            </svg>
                        </button>
                        @if(!$creatingNewUser)
                        <button x-on:click="openDeleteModal = true" type="button" class="rounded-md border border-gray-300 bg-red-500 py-2 px-4 text-sm font-medium text-white border-transparent shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Supprimer
                        </button>
                        @endif
                    </div>
                </div>
            </form>
        </div>

        <x-delete-user-modal />

    </div>
</div>