<div id="addMusicModal" class="modal fade hidden relative z-10" aria-labelledby="modal-title" role="dialog"
    aria-modal="true">
    <!--
    Background backdrop, show/hide based on modal state.

    Entering: "ease-out duration-300"
      From: "opacity-0"
      To: "opacity-100"
    Leaving: "ease-in duration-200"
      From: "opacity-100"
      To: "opacity-0"
  -->
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div id="addMusicModalPanel"
            class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <!--
        Modal panel, show/hide based on modal state.

        Entering: "ease-out duration-300"
          From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          To: "opacity-100 translate-y-0 sm:scale-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100 translate-y-0 sm:scale-100"
          To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      -->
            <div
                class="p-6 modal-body relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-xl">
                <form method="post" action="{{route('musics.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-12">
                            <h2 class="text-base font-semibold leading-7 text-gray-900">Ajouter une musique</h2>
                            <p class="mt-1 text-sm leading-6 text-gray-600">Ajoutez une musique, mais assurez vous
                                d'avoir selectionne la playlist</p>

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-4">
                                    <label for="title"
                                        class="block text-sm font-medium leading-6 text-gray-900">Titre</label>
                                    <div class="mt-2">
                                        <div
                                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                            <input type="text" name="title" id="title" autocomplete="title"
                                                class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                placeholder="Rich forever">
                                        </div>
                                    </div>
                                </div>

                                <div class="sm:col-span-4">
                                    <label for="artist"
                                        class="block text-sm font-medium leading-6 text-gray-900">Artiste</label>
                                    <div class="mt-2">
                                        <div
                                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                            <input type="text" name="artist" id="artist" autocomplete="artist"
                                                class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                placeholder="Rick ross">
                                        </div>
                                    </div>
                                </div>

                                <div class="sm:col-span-4">
                                    <label for="album"
                                        class="block text-sm font-medium leading-6 text-gray-900">Album</label>
                                    <div class="mt-2">
                                        <div
                                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                            <input type="text" name="album" id="album" autocomplete="album"
                                                class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                placeholder="Rich forever">
                                        </div>
                                    </div>
                                </div>

                                <div class="sm:col-span-4">
                                    <label for="year"
                                        class="block text-sm font-medium leading-6 text-gray-900">Annee</label>
                                    <div class="mt-2">
                                        <div
                                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                            <input type="text" name="year" id="year" autocomplete="year"
                                                class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                placeholder="2007">
                                        </div>
                                    </div>
                                </div>

                                <div class="sm:col-span-4">
                                    <label for="genre"
                                        class="block text-sm font-medium leading-6 text-gray-900">Genre</label>
                                    <div class="mt-2">
                                        <div
                                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                            <input type="text" name="genre" id="genre" autocomplete="genre"
                                                class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                placeholder="rap">
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
                                                placeholder="0 ou 1">
                                        </div>
                                    </div>
                                </div>

                                <div class="sm:col-span-4">
                                    <label for="audio"
                                        class="block text-sm font-medium leading-6 text-gray-900">Fichier audio</label>
                                    <div class="mt-2">
                                        <div
                                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                            <input type="file" name="audio" id="audio"
                                                class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
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
                                                @foreach($playlists as $playlist)
                                                    <option value="{{ $playlist->id }}">{{ $playlist->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-span-full">
                                    <label for="photo"
                                        class="block text-sm font-medium leading-6 text-gray-900">Photo de l'album</label>
                                    <div class="mt-2 flex items-center gap-x-3">
                                        <input type="file" id="photoInput" name="image" accept="image/*"
                                            class="hidden">
                                        <label for="photoInput" class="cursor-pointer">
                                            <img id="photoPreview" class="h-12 w-12 text-gray-300"
                                                src="{{env('DEFAULT_IMAGE')}}"
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
                        <button type="button" class="cancel text-sm font-semibold leading-6 text-gray-900">Annuler</button>
                        <button type="submit"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get references to the file input and image elements
        const photoInput = document.getElementById("photoInput");
        const photoPreview = document.getElementById("photoPreview");

        // Listen for changes in the file input
        photoInput.addEventListener("change", function() {
            const selectedFile = photoInput.files[0];

            // Check if a file was selected
            if (selectedFile) {
                // Create a FileReader to read the selected file
                const reader = new FileReader();

                // Define a function to run when the FileReader loads the file
                reader.onload = function(event) {
                    // Set the source of the image element to the loaded file data (image preview)
                    photoPreview.src = event.target.result;
                };

                // Read the selected file as a data URL
                reader.readAsDataURL(selectedFile);
            }
        });

        // Listen for clicks on the "Change" button
        const changePhotoButton = document.getElementById("changePhoto");
        changePhotoButton.addEventListener("click", function() {
            // Trigger a click event on the file input (opens file dialog)
            photoInput.click();
        });
    });
</script>

<script>
    // Function to create a searchable select input
    function makeSearchableSelect(selectElement) {
        // Create an input element for searching
        const searchInput = document.createElement('input');
        searchInput.setAttribute('type', 'text');
        searchInput.setAttribute('placeholder', 'Search for a playlist');

        // Append the input element before the select element
        selectElement.parentNode.insertBefore(searchInput, selectElement);

        // Add event listener for input changes
        searchInput.addEventListener('input', function () {
            const searchText = this.value.toLowerCase();
            const options = selectElement.options;

            for (let i = 0; i < options.length; i++) {
                const optionText = options[i].text.toLowerCase();
                const optionValue = options[i].value;

                if (optionText.includes(searchText)) {
                    options[i].selected = true;
                } else {
                    options[i].selected = false;
                }
            }
        });
    }

    // Call the function to make the select searchable
    makeSearchableSelect(document.getElementById('playlistSelect'));
</script>
