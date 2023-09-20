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
            console.log(event.target);
            const id = modal.getAttribute('id');
            if (event.target === document.getElementById(id + "Panel")) {
                modal.classList.add('hidden');
            }
        });
    });


    // Get all elements with class name "cancel"
    let cancelButtons = document.querySelectorAll('.cancel');
    let editMusicButtons = document.querySelectorAll('.trigger-edit-modal');
    let deleteMusicButtons = document.querySelectorAll('.trigger-delete-modal');

    // Add click event listeners to close modals when cancel is clicked
    cancelButtons.forEach(function(cancelButton) {
        cancelButton.addEventListener('click', function() {
            closeModals();
        });
    });

    editMusicButtons.forEach(function(editButton) {
        editButton.addEventListener('click', function() {
            const buttonId = editButton.id;
            toggleModal(buttonId.split('-')[1]);
        });
    });

    deleteMusicButtons.forEach(function(deleteButton) {
        deleteButton.addEventListener('click', function() {
            console.log('test');
            const buttonId = deleteButton.id;
            toggleModal(buttonId.split('-')[1]);
        });
    });
</script>
