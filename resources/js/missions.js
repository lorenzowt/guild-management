const outcomeModal = document.getElementById('mission-outcome-modal');

if (window.openMissionOutcomeModal) {
    outcomeModal.classList.remove('hidden');
}

outcomeModal.addEventListener('click', function(event) {
    if (event.target.closest('#close-mission-outcome-modal')) {
        outcomeModal.classList.add('hidden');
    }

    if (!event.target.closest('#mission-outcome-modal-content')) {
        outcomeModal.classList.add('hidden');
    }
});