<!-- JavaScript to control the modal -->
<script>
    function toggleModal(modalId) {
        let modal = document.getElementById(modalId);
        modal.classList.toggle('hidden');
    }

    let modals = document.querySelectorAll('.modal');

    function closeModals() {
        modals.forEach(function(modal) {
            modal.classList.add('hidden');
        });
    }

    // Get references to the modal and buttons
    let modal = document.getElementById('addMusicModal');
    let addMusicModalButton = document.getElementById('addMusicModalButton');
    let addPlaylistModalButton = document.getElementById('addPlaylistModalButton');

    // Show the modal when the "Open Modal" button is clicked
    addMusicModalButton.addEventListener('click', function() {
        toggleModal('addMusicModal');
    });

    addPlaylistModalButton.addEventListener('click', function() {
        toggleModal('addPlaylistModal');
    });

    // Hide the modal when the overlay (background) is clicked
    modals.forEach(function(modal) {
        modal.addEventListener('click', function(event) {
            console.log(event.target)
            const id = modal.getAttribute('id');
            if (event.target === document.getElementById(id+"Panel")) {
                modal.classList.add('hidden');
            }
        });
    });


    // Get all elements with class name "cancel"
    let cancelButtons = document.querySelectorAll('.cancel');

    // Add click event listeners to close modals when cancel is clicked
    cancelButtons.forEach(function(cancelButton) {
        cancelButton.addEventListener('click', function() {
            closeModals();
        });
    });
</script>
