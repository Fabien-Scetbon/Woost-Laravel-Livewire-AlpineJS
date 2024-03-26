<div>

    <div class="flex flex-col justify-start bg-indigo-600 mb-4 px-6 py-2.5 sm:px-3.5 rounded">
        <p class="text-md text-white my-1">{{ $subTitleUserEditing }}</p>
    </div>


    <div class="w-full mx-auto">
        <div class="md:flex md:gap-5">
            {{-- Coté gauche --}}
            <div class="md:w-3/4 overflow-hidden rounded-lg bg-white shadow p-2">

                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive mail.</p>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-2">
                            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
                            <div class="mt-2">
                                <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
                            <div class="mt-2">
                                <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                            <div class="mt-2">
                                <input id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Country</label>
                            <div class="mt-2">
                                <select id="country" name="country" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    <option>United States</option>
                                    <option>Canada</option>
                                    <option>Mexico</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="street-address" class="block text-sm font-medium leading-6 text-gray-900">Street address</label>
                            <div class="mt-2">
                                <input type="text" name="street-address" id="street-address" autocomplete="street-address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-2 sm:col-start-1">
                            <label for="city" class="block text-sm font-medium leading-6 text-gray-900">City</label>
                            <div class="mt-2">
                                <input type="text" name="city" id="city" autocomplete="address-level2" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="region" class="block text-sm font-medium leading-6 text-gray-900">State / Province</label>
                            <div class="mt-2">
                                <input type="text" name="region" id="region" autocomplete="address-level1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="postal-code" class="block text-sm font-medium leading-6 text-gray-900">ZIP / Postal code</label>
                            <div class="mt-2">
                                <input type="text" name="postal-code" id="postal-code" autocomplete="postal-code" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="cover-photo" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Image de l'article</label>
                    @error('image') <small class="text-red-500">{{ $message }}</small> @enderror
                    <div class="flex justify-around">
                        <div class="flex flex-col mt-2 w-1/4">
                            <div onclick="chooseFile()" id="add_logo_div" wire:click="resetError" class="flex max-w-lg justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6 mt-2 cursor-pointer">
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
                            <p class="text-sm text-gray-700 mt-1 italic">Pour un meilleur affichage, préférez une taille de 1120x700 px</p>
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
                            <img class="max-h-56 w-auto mx-auto" src="{{ $image->temporaryUrl() }}">
                            @else
                            @if(!$creatingNewUser)
                            <p class="text-sm text-gray-500 mb-1">Image actuelle</p>
                            {{-- <img class="w-80 mx-auto" src="{{ asset('storage/articles/' . $article->image) }}" alt="Image de {{ $article->titre }}"> --}}
                            @endif
                            @endif
                        </div>
                    </div>

                </div>


            </div>

            {{-- Coté droit --}}
            <div class="md:w-1/4 overflow-hidden rounded-lg bg-white shadow p-2">

                @if(!$creatingNewUser)
                <div class="pb-5" x-data="{ openScheduleModal: false }">
                    <h2 class="text-sm text-gray-900 font-medium">Options de publication</h2>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-2 lg:gap-8">
                        <div>
                            <div class="mt-2">
                                <p class="text-sm text-gray-700 font-medium pb-1">
                                    Statut de l'article
                                </p>
                            </div>

                            <fieldset class="mt-3">
                                <div class="space-y-2">
                                    <div class="flex items-center" x-on:click="openScheduleModal = true">
                                        <input wire:model.defer="userStatus" id="visitor" name="userStatus" type="radio" value="{{\App\Enums\UserStatus::Visitor}}" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        <label for="visitor" class="ml-3 block text-sm leading-6 text-gray-900">Publié</label>
                                    </div>
                                    <div class="flex items-center" x-on:click="openScheduleModal = false">
                                        <input wire:model.defer="userStatus" id="member" name="userStatus" type="radio" value="{{\App\Enums\UserStatus::Member}}" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        <label for="member" class="ml-3 block text-sm leading-6 text-gray-900">Dépublié</label>
                                    </div>
                                    <div class="flex items-center" x-on:click="openScheduleModal = false">
                                        <input wire:model.defer="userStatus" id="admin" name="userStatus" type="radio" value="{{\App\Enums\UserStatus::Admin}}" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        <label for="admin" class="ml-3 block text-sm leading-6 text-gray-900">Archivé</label>
                                    </div>
                                </div>
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
                @else
                <div class="sm:mt-0 md:mt-4 md:mb-4 border-b border-gray-900/10">
                    <p class="text-sm text-gray-900 font-medium pb-1 mb-1">
                        Tags et options
                    </p>
                    <p class="text-sm text-gray-900 pb-1 mb-1">
                        Vous pourrez accéder à ces paramètres après la création de votre article.
                    </p>
                </div>
                @endif
            </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <div class="sm:w-full md:w-auto">
                <button wire:click="returnListArticles" type="button" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Annuler
                </button>

                <button wire:loading.remove wire:click="saveArticle" type="button" class="ml-4 basis-1/4 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Sauvegarder
                </button>
                <button wire:loading.inline wire:target="saveArticle" type="button" class="ml-4 basis-1/4 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-11 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
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


        {{--
                            <div class="space-y-12">
                                <div class="border-b border-gray-900/10 pb-12">
                                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                        <div class="col-span-full grid grid-cols-1 lg:grid-cols-2 gap-2 lg:gap-8">
                                            <div>
                                                <label for="cover-photo" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Image de votre article</label>

        <div class="container">
                                                    <div class="row justify-content-center">
                                                        <div class="col-md-6">
                                                            <div class="card">
        <div class="card-header" style="background: gray; color:#f1f7fa; font-weight:bold;">
                                                                    Laravel 10 Image Crop And Upload Example - Laravelia
                                                                </div>
                                                                <div class="card-body">
                                                                    <form action="{{ route('storeImageArticleHeader') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-3">
            <input type="file" name="image" class="image">
        </div>
        <input type="hidden" name="article_id" value="{{ $articleId }}">
        </form>
    </div>
    @error('image') <small class="text-red-500">{{ $message }}</small> @enderror
</div>

</div>
</div>
</div>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Choisissez la zone de votre image, vous pouvez aussi zoomer.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="crop">Crop</button>
            </div>
        </div>
    </div>
</div>
</div>

<div class="flex flex-col justify-center items-center">
    <div wire:loading wire:target="image" class="text-orange-500 mb-2">Chargement de votre image...</div>
    @if ($image)
    <img class="w-80 mx-auto" src="{{ $image->temporaryUrl() }}">
    @else
    @if(!$creatingNewArticle)
    <p class="text-sm text-gray-500 mb-1">Image actuelle</p>
    <img class="w-80 mx-auto" src="{{ asset('storage/articles/' . $article->image) }}" alt="Image de {{ $article->titre }}">
    @endif
    @endif
</div>
</div>
</div>
</div>
</div>
--}}
</div>

<style>
    #image {
        max-width: 100%;
        /* Largeur maximale pour conserver le ratio d'origine */
        max-height: 100%;
        /* Hauteur maximale pour conserver le ratio d'origine */
        object-fit: contain;
        /* Ajuste l'image tout en conservant le ratio */
        width: 100%;
        /* Largeur de 100% pour remplir la zone parente */
        height: 100%;
        /* Hauteur de 100% pour remplir la zone parente */
    }

    .preview {
        text-align: center;
        overflow: hidden;
        width: 160px;
        height: 160px;
        margin: 10px;
        border: 1px solid red;
    }
</style>

</div>