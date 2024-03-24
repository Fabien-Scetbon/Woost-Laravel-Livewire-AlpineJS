<div x-data="{  searchCategorie: '',
                searchTag: '',
            }">

    <div class="flex flex-col justify-start bg-indigo-600 mb-4 px-6 py-2.5 sm:px-3.5 rounded">
        <p class="text-md text-white my-1">{{ $subTitleArticleEditing }}</p>
        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
            <input wire:model.defer="titreArticle" type="text" name="titrearticle" id="titrearticle" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-white placeholder:text-white focus:ring-0 sm:text-sm sm:leading-6" placeholder="Votre titre">
        </div>
        @error('titre') <small class="text-red-500">{{ $message }}</small> @enderror
    </div>


    <div class="w-full mx-auto" x-data="{openDeleteModal: false}">
        <div class="md:flex md:gap-5">
            {{-- Coté gauche --}}
            <div class="md:w-3/4 overflow-hidden rounded-lg bg-white shadow p-2">
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
                            @if(!$creatingNewArticle)
                            <p class="text-sm text-gray-500 mb-1">Image actuelle</p>
                            <img class="w-80 mx-auto" src="{{ asset('storage/articles/' . $article->image) }}" alt="Image de {{ $article->titre }}">
                            @endif
                            @endif
                        </div>
                    </div>

                </div>

                <div>
                    <div class="flex flex-col w-full" wire:ignore>
                        <div x-data x-init="initEditor($refs['{{ $name }}'])" wire:key="{{$name}}" x-ref="{{$name}}">
                            {!! $this->content !!}
                        </div>
                    </div>
                </div>

                {{--<div class="col-span-full">
                    <label for="content" class="block text-sm font-medium leading-6 text-gray-900">Contenu de l'article</label>
                    <div wire:ignore class="mt-2">
                        <textarea wire:model.defer="contenu" id="contenu" name="contenu" rows="3"
                                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{!! $contenu !!}</textarea>
                    </div>
                    @error('contenu') <small class="text-red-500">{{ $message }}</small> @enderror
                <p class="mt-3 text-sm leading-6 text-gray-600">Complétez ou modifiez le contenu
                    de votre article.</p>
            </div>--}}
        </div>

        {{-- Coté droit --}}
        <div class="md:w-1/4 overflow-hidden rounded-lg bg-white shadow p-2">
            <div x-data="{ openDescriptionInput : false }">
                <div class="sm:mt-0 md:mt-4 border-b border-gray-900/10 pb-6">
                    <p class="text-sm text-gray-900 font-medium pb-1 mb-1">
                        Catégorie de l'article
                    </p>
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        <div class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-sm text-gray-500 sm:leading-6">
                            {{ $articleCategorieNom !== '' ? $articleCategorieNom : "Pas de catégorie" }}
                        </div>
                    </div>
                    <p class="text-sm text-gray-900 pb-1 mt-2">
                        {{ !$creatingNewArticle ? "Vous pouvez modifier la catégorie de l'article à l'aide de la recherche." : "Veuillez choisir une catégorie pour votre article." }}
                    </p>

                    <input wire:model.debounce.500ms="searchCategorie" type="text" class="block rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm md:mt-0" placeholder="Rechercher une catégorie">
                    @error('categorie_article_id') <small class="text-red-500">{{ $message }}</small> @enderror

                    @if (!empty($searchCategorie))
                    <ul role="list" class="mt-1 divide-y divide-gray-100 sm:max-w-md">
                        @forelse($this->listeCategoriesArticle as $categorie)
                        <li class="flex gap-x-4 py-2 pl-2 text-sm text-gray-900 hover:bg-gray-100 hover:cursor-pointer" wire:click="selectCategory({{ $categorie->id }}, '{{ addslashes($categorie->nom) }}')">
                            {{ $categorie->nom }}
                        </li>
                        @empty
                        <p class="text-sm text-blue-500 italic">Aucun résultat.</p>
                        @endforelse
                    </ul>

                    @endif
                    <p class="text-sm text-blue-700">
                        @if(session()->has('linkCategorieSuccess'))
                        {{ session('linkCategorieSuccess') }}
                        @endif
                    </p>
                </div>

            </div>
            @if(!$creatingNewArticle)
            <div class="sm:mt-0 md:mt-4 md:mb-4 border-b border-gray-900/10">
                <p class="text-sm text-gray-900 font-medium pb-1 mb-1">
                    Tags de l'article
                </p>
                <div class="flex flex-wrap space-x-2 space-y-1 border border-gray-200 rounded p-2 mb-4">
                    @forelse($this->listeTagsThisArticle as $tag)
                    <span class="flex items-center px-2 py-1 bg-gray-100 text-gray-700 rounded-md" style="font-size: small">
                        {{ $tag->nom }}
                        <svg wire:click="deleteTag({{ $tag->id }})" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-500 ml-1 hover:cursor-pointer hover:text-red-700">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </span>
                    @empty
                    <p class="text-sm text-blue-500 italic">Cet article ne possède pas de tag.</p>
                    @endforelse
                    <input wire:model.debounce.500ms="searchTag" type="text" class="block rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm mt-5 md:mt-0" placeholder="Ajouter un tag">
                </div>

                @error('tagNom') <small class="text-red-500">{{ $message }}</small> @enderror

                @if (!empty($searchTag))
                <ul role="list" class="divide-y divide-gray-100 mt-1 sm:max-w-md">
                    @forelse($this->listeTagsArticle as $tag)
                    <li class="flex gap-x-4 py-2 pl-2 text-sm text-gray-900 hover:bg-gray-100 hover:cursor-pointer" wire:click="selectTag({{ $tag->id }})">
                        {{ $tag->nom }}
                    </li>
                    @empty
                    <li class="flex gap-x-4 py-2 pl-2 text-sm text-gray-900 hover:bg-gray-100 hover:cursor-pointer" wire:click="createTag">
                        {{ $searchTag }}
                    </li>
                    @endforelse
                </ul>
                @endif
                <p class="text-sm text-blue-700 mb-2">
                    @if(session()->has('addTagSuccess'))
                    {{ session('addTagSuccess') }}
                    @elseif(session()->has('linkTagSuccess'))
                    {{ session('linkTagSuccess') }}
                    @endif
                </p>
            </div>

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
                                    <input wire:model.defer="articleStatut" id="publier" name="articleStatut" type="radio" value="{{\App\Enums\ArticleStatus::Publier}}" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                    <label for="publier" class="ml-3 block text-sm leading-6 text-gray-900">Publié</label>
                                </div>
                                <div class="flex items-center" x-on:click="openScheduleModal = false">
                                    <input wire:model.defer="articleStatut" id="depublier" name="articleStatut" type="radio" value="{{\App\Enums\ArticleStatus::Depublier}}" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                    <label for="depublier" class="ml-3 block text-sm leading-6 text-gray-900">Dépublié</label>
                                </div>
                                <div class="flex items-center" x-on:click="openScheduleModal = false">
                                    <input wire:model.defer="articleStatut" id="archiver" name="articleStatut" type="radio" value="{{\App\Enums\ArticleStatus::Archiver}}" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                    <label for="archiver" class="ml-3 block text-sm leading-6 text-gray-900">Archivé</label>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div>
                        <div class="mt-2">
                            <p class="text-sm text-gray-900 font-medium pb-1">
                                Autoriser les commentaires
                            </p>

                        </div>

                        <fieldset class="mt-3">
                            <div class="space-y-2">
                                <div class="flex items-center">
                                    <input wire:model.defer="articleIsCommentable" id="articleIsCommentable" name="articleIsCommentable" type="radio" value="1" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                    <label for="isCommentable" class="ml-3 block text-sm leading-6 text-gray-900">Autoriser</label>
                                </div>
                                <div class="flex items-center">
                                    <input wire:model.defer="articleIsCommentable" id="isNotCommenatble" name="articleIsCommentable" type="radio" value="0" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                    <label for="isNotCommenatble" class="ml-3 block text-sm leading-6 text-gray-900">Ne pas autoriser</label>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                </div>
                <div class="relative w-full">
                    <div wire:ignore x-show="openScheduleModal && {{ $articleStatut }} !== {{ \App\Enums\ArticleStatus::Publier }}" x-transition:enter="transition ease-out duration-100 transform" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75 transform" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="origin-top-right right-0 mt-2 w-full rounded-md shadow-lg">
                        <div class="rounded-md bg-white shadow-xs mb-2">
                            <p class="px-3 text-sm text-gray-900 font-medium py-2">
                                Programmation de publication
                            </p>
                            <div class="px-3 text-sm text-gray-500 w-90">
                                <p>Vous pouvez programmer la publication de cet article à une date ultérieure.</p>
                            </div>
                            <div class="px-3 mt-2 pb-2">
                                <label for="dateSchedule" class="block text-sm font-medium text-gray-700">Date
                                    de publication</label>
                                <div class="mt-1">
                                    <input wire:model.defer="articleScheduleAt" type="datetime-local" id="dateSchedule" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>
                                @error('schedule_at') <small class="text-red-500">{{ $message }}</small> @enderror
                            </div>
                        </div>
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
            @if(!$creatingNewArticle)
            <button x-on:click="openDeleteModal = true" type="button" class="rounded-md border border-gray-300 bg-red-500 py-2 px-4 text-sm font-medium text-white border-transparent shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Supprimer
            </button>
            @endif
        </div>
    </div>
    <div x-cloak x-show="openDeleteModal" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div x-show="openDeleteModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div x-show="openDeleteModal" class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="divide-y divide-gray-200 px-4 sm:px-6">
                            <div class="pt-6 pb-5">
                                <div>
                                    <p class="text-sm text-red-500 font-normal mb-2">
                                        Attention, vous allez supprimer un article.
                                    </p>
                                    <p class="text-sm text-red-500 font-medium mb-2">
                                        Cette action est irréversible !
                                    </p>
                                    <p class="text-sm text-gray-900">
                                        Pour supprimer cet article, veuillez recopier ces caractères à l'identique dans la zone prévue à cet effet :
                                    </p>
                                </div>
                                <div class="text-center mt-3">
                                    <div class="p-2 border rounded border-blue-500 w-auto">
                                        {{ $titreArticle }}
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <input wire:model.defer="copieTitreArticle" type="text" id="copieTitreArticle" placeholder="Recopier le texte ici" class="block w-full text-center rounded border-red-400 shadow-sm focus:border-red-500 focus:ring-red-500">
                                </div>
                                @error('copietitre') <small class="text-red-500">{{ $message }}</small> @enderror

                                <div id="alertContainer2" class="mt-1 text-sm text-red-500">
                                    @if(isset($message))
                                    {{ $message }}
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 gap-2">
                        <button x-on:click="openDeleteModal = false" type="button" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Annuler
                        </button>

                        <button wire:loading.remove wire:click="deleteArticle" type="button" class="rounded-md border border-gray-300 bg-red-500 py-2 px-4 text-sm font-medium text-white border-transparent shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Supprimer
                        </button>
                        <button wire:loading.flex wire:target="deleteArticle" type="button" class="rounded-md border border-gray-300 bg-red-500 py-2 px-4 text-sm font-medium text-white border-transparent shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            <svg class="w-6 h-5 animate-spin" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
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

<script>
    function updateMessage(message) {
        let alertContainer2 = document.getElementById('alertContainer2');
        alertContainer2.innerHTML = message;
    }

    document.addEventListener('copy', function(e) {
        e.preventDefault();
        updateMessage("Copier a été désactivé.");
    });

    document.addEventListener('cut', function(e) {
        e.preventDefault();
        updateMessage("Couper a été désactivé.");
    });

    document.addEventListener('paste', function(e) {
        e.preventDefault();
        updateMessage("Coller a été désactivé.");
    });
</script>



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