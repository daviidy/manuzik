<x-new-layout>
    <x-slot name="header">
        <div class="flex justify-center items-center">
            <h2 class="mx-4 font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Playlist ' . $playlist->title) }}
            </h2>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" id="open-editModal{{ $playlist->id }}"
                class="trigger-edit-modal cursor-pointer w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
            </svg>
        </div>
    </x-slot>

    @include('includes.musics-list', ['musics' => $playlist->musics])

    <div id="editModal{{ $playlist->id }}" class="modal fade hidden relative z-10" aria-labelledby="modal-title"
        role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div id="editModal{{ $playlist->id }}Panel"
                class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="p-6 modal-body relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-xl">
                    <form method="post" action="{{ route('playlists.update', $playlist->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        {{ method_field('patch') }}
                        <div class="space-y-12">
                            <div class="border-b border-gray-900/10 pb-12">
                                <h2 class="text-base font-semibold leading-7 text-gray-900">Modifier une playlist
                                </h2>
                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="sm:col-span-4">
                                        <label for="title"
                                            class="block text-sm font-medium leading-6 text-gray-900">Titre</label>
                                        <div class="mt-2">
                                            <div
                                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                <input type="text" name="title" id="title" autocomplete="title"
                                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                    placeholder="Rich forever" value={{ $playlist->title }}>
                                            </div>
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

    @include('scripts.music-player', ['musics' => $playlist->musics]);
</x-new-layout>
