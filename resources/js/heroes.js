const createButton = document.getElementById('create-hero-button');
const createModal = document.getElementById('create-hero-modal');
const cancelButton = document.getElementById('close-create-hero-modal');

createButton.addEventListener('click', function() {
    createModal.classList.remove('hidden');
});

cancelButton.addEventListener('click', function() {
    createModal.classList.add('hidden');
});

createModal.addEventListener('click', function(event) {
    if (!event.target.closest('#create-hero-modal-content')) {
        createModal.classList.add('hidden');
    }
});

if (window.openCreateHeroModal) {
    createModal.classList.remove('hidden');
}