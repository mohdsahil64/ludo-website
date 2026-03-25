// Audio Controller

// Handle battle acceptance
function handleBattleAcceptance(battleId) {
    // Unlock audio first
    enableGameAudio();
    
    axios.post(`/battle/${battleId}/accept`)
        .then(response => {
            if(response.data.audio) {
                playBattleAudio(response.data.audio);
            }
            if(response.data.redirect) {
                window.location.href = response.data.redirect;
            }
        })
        .catch(error => {
            console.error('Battle acceptance failed:', error);
        });
}
document.addEventListener('DOMContentLoaded', function() {
    const audioElements = {
        accepted: document.getElementById('acceptedAudio'),
    };

    // Initialize audio (call this after user interaction)
    window.enableGameAudio = function() {
        audioElements.request.play().then(() => {
            audioElements.request.pause();
            audioElements.request.currentTime = 0;
        }).catch(e => console.log("Audio initialization:", e));
    };

    // Play audio function
    window.playBattleAudio = function(audioName) {
        if (!audioElements[audioName]) return;
        
        try {
            audioElements[audioName].currentTime = 0;
            audioElements[audioName].play();
        } catch (e) {
            console.error("Audio play error:", e);
            // Show UI message to click to enable sounds
        }
    };

    // Stop audio function (mainly for looped sounds)
    window.stopBattleAudio = function(audioName) {
        if (audioElements[audioName]) {
            audioElements[audioName].pause();
            audioElements[audioName].currentTime = 0;
        }
    };
});