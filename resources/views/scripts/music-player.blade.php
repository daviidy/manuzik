<script>
    // const musics = @json($musics);
    // Store references to music elements
    const musicElements = document.querySelectorAll('.music');
    const audioPlayer = new Audio(); // Create an Audio element for playing music
    let currentMusicIndex = null; // Keep track of the currently playing music

    // Function to play the selected music
    function playMusic(index) {
        if (index !== currentMusicIndex) {
            // If a new music is selected
            currentMusicIndex = index;
            const musicUrl = musicElements[index].id;
            const src = musicElements[index].src;
            const title = musicElements[index].getAttribute('data-title');
            console.log(musicElements[index]);
            // Pause any currently playing music
            audioPlayer.pause();

            // Set the new audio source and play it
            document.getElementById('music-player').classList.remove('hidden');
            document.getElementById('player-image').src = src;
            document.getElementById('player-title').textContent = title;
            audioPlayer.src = musicUrl;
            audioPlayer.play();

            // Update the play/pause button to show the pause icon
            document.getElementById('play').style.display = 'none';
            document.getElementById('pause').style.display = 'inline-block';
        } else {
            // If the same music is clicked, toggle play/pause
            if (audioPlayer.paused) {
                audioPlayer.play();
                document.getElementById('play').style.display = 'none';
                document.getElementById('pause').style.display = 'inline-block';
            } else {
                audioPlayer.pause();
                document.getElementById('play').style.display = 'inline-block';
                document.getElementById('pause').style.display = 'none';
            }
        }
    }

    // Event listener for playing music when a music image is clicked
    musicElements.forEach((musicElement, index) => {
        musicElement.addEventListener('click', () => {
            playMusic(index);
        });
    });

    // Event listeners for play, pause, next, and previous buttons
    document.getElementById('play').addEventListener('click', () => {
        audioPlayer.play();
        document.getElementById('play').style.display = 'none';
        document.getElementById('pause').style.display = 'inline-block';
    });

    document.getElementById('pause').addEventListener('click', () => {
        audioPlayer.pause();
        document.getElementById('play').style.display = 'inline-block';
        document.getElementById('pause').style.display = 'none';
    });

    document.getElementById('next').addEventListener('click', () => {
        // Play the next music, assuming you have a way to track the current music index
        if (currentMusicIndex !== null && currentMusicIndex < musicElements.length - 1) {
            playMusic(currentMusicIndex + 1);
        }
    });

    document.getElementById('previous').addEventListener('click', () => {
        // Play the previous music, assuming you have a way to track the current music index
        if (currentMusicIndex !== null && currentMusicIndex > 0) {
            playMusic(currentMusicIndex - 1);
        }
    });
</script>
