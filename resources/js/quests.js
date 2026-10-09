const showButtons = document.querySelectorAll('.quest-show-button');
const showModal = document.getElementById('show-quest-modal');
const showModalContent = document.getElementById('show-quest-modal-content');
const showModalBody = document.getElementById('show-quest-modal-body');
const editModalContainer = document.getElementById('edit-quest-modal-container');

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

showModal.addEventListener('click', function(event) {

    if (event.target.closest('#close-show-quest-modal')) {
        showModal.classList.add('hidden');
    }

    if (!event.target.closest('#show-quest-modal-content')) {
        showModal.classList.add('hidden');
    }
});