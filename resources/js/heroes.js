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

const showButtons = document.querySelectorAll('.hero-show-button');
const showModal = document.getElementById('show-hero-modal');
const showModalContent = document.getElementById('show-hero-modal-content');
const showModalBody = document.getElementById('show-hero-modal-body');
const closeShowButton = document.getElementById('close-show-hero-modal');

showButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        const url = button.dataset.url;

        fetch(url)
            .then(function(response) {
                return response.text();
            })
            .then(function(html) {
                showModalBody.innerHTML = html;
                showModal.classList.remove('hidden');
            });
    });
});

closeShowButton.addEventListener('click', function() {
    showModal.classList.add('hidden');
});

showModal.addEventListener('click', function(event) {
    if (!event.target.closest('#show-hero-modal-content')) {
        showModal.classList.add('hidden');
    }
});