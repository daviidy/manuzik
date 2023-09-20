<x-new-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Accueil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @foreach ($musics as $music)
            <ul role="list" class="divide-y divide-gray-100 p-6">
                <li class="flex justify-between gap-x-6 py-5 bg-white rounded">
                    <div class="flex min-w-0 gap-x-4 p-6">
                        <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                            src="{{ Storage::disk('s3')->url($music->image) }}" alt="">
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm font-semibold leading-6 text-gray-900"> {{ $music->title }} </p>
                            <p class="mt-1 truncate text-xs leading-5 text-gray-500"> {{ $music->album }} </p>
                        </div>
                    </div>
                    <div class="sm:flex sm:flex-col sm:items-end p-6">
                        <p class="text-sm leading-6 text-gray-900"> {{ $music->artist }} </p>
                        <div class="flex mt-1 leading-5 justify-between">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" id="open-editMusicModal{{ $music->id }}"
                                class="trigger-edit-modal cursor-pointer w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" id="open-deleteMusicModal{{ $music->id }}"
                                class="trigger-delete-modal cursor-pointer ml-2 w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>

                            </p>
                        </div>
                </li>
            </ul>
        @endforeach
    </div>

    @foreach ($musics as $music)
        <div id="editMusicModal{{ $music->id }}" class="modal fade hidden relative z-10"
            aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div id="editMusicModal{{ $music->id }}Panel" class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="p-6 modal-body relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-xl">
                        <form method="post" action="{{ route('musics.update', $music->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            {{method_field('patch')}}
                            <div class="space-y-12">
                                <div class="border-b border-gray-900/10 pb-12">
                                    <h2 class="text-base font-semibold leading-7 text-gray-900">Modifier une musique
                                    </h2>
                                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                        <div class="sm:col-span-4">
                                            <label for="title"
                                                class="block text-sm font-medium leading-6 text-gray-900">Titre</label>
                                            <div class="mt-2">
                                                <div
                                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                    <input type="text" name="title" id="title"
                                                        autocomplete="title"
                                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                        placeholder="Rich forever" value={{ $music->title }}>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="sm:col-span-4">
                                            <label for="artist"
                                                class="block text-sm font-medium leading-6 text-gray-900">Artiste</label>
                                            <div class="mt-2">
                                                <div
                                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                    <input type="text" name="artist" id="artist"
                                                        autocomplete="artist"
                                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                        placeholder="Rick ross" value={{ $music->artist }}>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="sm:col-span-4">
                                            <label for="album"
                                                class="block text-sm font-medium leading-6 text-gray-900">Album</label>
                                            <div class="mt-2">
                                                <div
                                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                    <input type="text" name="album" id="album"
                                                        autocomplete="album"
                                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                        placeholder="Rich forever" value={{ $music->album }}>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="sm:col-span-4">
                                            <label for="year"
                                                class="block text-sm font-medium leading-6 text-gray-900">Annee</label>
                                            <div class="mt-2">
                                                <div
                                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                    <input type="text" name="year" id="year"
                                                        autocomplete="year"
                                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                        placeholder="2007" value={{ $music->year }}>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="sm:col-span-4">
                                            <label for="genre"
                                                class="block text-sm font-medium leading-6 text-gray-900">Genre</label>
                                            <div class="mt-2">
                                                <div
                                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                    <input type="text" name="genre" id="genre"
                                                        autocomplete="genre"
                                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                        placeholder="rap" value={{ $music->genre }}>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="sm:col-span-4">
                                            <label for="notation"
                                                class="block text-sm font-medium leading-6 text-gray-900">Notation</label>
                                            <div class="mt-2">
                                                <div
                                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                    <input type="number" name="notation" id="notation"
                                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                        placeholder="0 ou 1" value={{ $music->notation }}>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="sm:col-span-4">
                                            <label for="username"
                                                class="block text-sm font-medium leading-6 text-gray-900">Playlist</label>
                                            <div class="mt-2">
                                                <div
                                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                    <select name="playlist_ids[]" id="playlistSelect"
                                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                                        @foreach ($playlists as $playlist)
                                                            <option
                                                                {{ $music->playlists->contains($playlist->id) ? 'selected' : '' }}
                                                                value="{{ $playlist->id }}">{{ $playlist->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-span-full">
                                            <label for="photo"
                                                class="block text-sm font-medium leading-6 text-gray-900">Photo de
                                                l'album</label>
                                            <div class="mt-2 flex items-center gap-x-3">
                                                <input type="file" id="photoInput" name="image"
                                                    accept="image/*" class="hidden">
                                                <label for="photoInput" class="cursor-pointer">
                                                    <img id="photoPreview" class="h-12 w-12 text-gray-300"
                                                        src="{{ $music->image ? Storage::disk('s3')->url($music->image) : env('DEFAULT_IMAGE') }}"
                                                        alt="Image de la musique">
                                                </label>
                                                <button id="changePhoto" type="button"
                                                    class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Change</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="mt-6 flex items-center justify-end gap-x-6">
                                <button type="button"
                                    class="cancel text-sm font-semibold leading-6 text-gray-900">Annuler</button>
                                <button type="submit"
                                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Envoyer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($musics as $music)
        <div id="deleteMusicModal{{ $music->id }}" class="modal fade hidden relative z-10"
            aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div id="deleteMusicModal{{ $music->id }}Panel" class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                        <form method="post" action="{{ route('musics.destroy', $music->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div
                                        class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                        <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                        </svg>
                                    </div>
                                    <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                        <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">
                                            Supprimer {{ $music->title }}</h3>
                                        <div class="mt-2">
                                            <p class="text-sm text-gray-500">Etes-vous sûr de vouloir supprimer ce
                                                fichier? Toutes vos données seront définitivement supprimées. Cette
                                                action ne peut être
                                                reversible.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <button type="submit"
                                    class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Deactivate</button>
                                <button type="button"
                                    class="cancel mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</x-new-layout>
