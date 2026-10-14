import TomSelect from 'tom-select';
import 'tom-select/dist/css/tom-select.css';

const createButton = document.getElementById('create-mission-button');
const createModal = document.getElementById('create-mission-modal');
const closeCreateButton = document.getElementById('close-create-mission-modal');

createButton.addEventListener('click', function () {
    createModal.classList.remove('hidden');
});

closeCreateButton.addEventListener('click', function () {
    createModal.classList.add('hidden');
});

createModal.addEventListener('click', function (event) {
    if (!event.target.closest('#create-mission-modal-content')) {
        createModal.classList.add('hidden');
    }
});

if (window.openCreateMissionModal) {
    createModal.classList.remove('hidden');
}

const questSelect = document.getElementById('quest_id');
const heroSelect = document.getElementById('hero_ids');

if (questSelect) {
    new TomSelect(questSelect, {
        maxItems: 1,
        placeholder: 'Choose a quest...',
        create: false,

        render: {
            option: function (data, escape) {
                return `
                    <div class="px-3 py-2">
                        ${escape(data.text)}
                    </div>
                `;
            },

            item: function (data, escape) {
                return `
                    <div>${escape(data.text)}</div>
                `;
            },
        },
    });
}

if (heroSelect) {
    new TomSelect(heroSelect, {
        plugins: ['remove_button'],
        maxItems: 4,
        placeholder: 'Choose up to four heroes...',
        closeAfterSelect: false,
        create: false,

        render: {
            option: function (data, escape) {
                return `
                    <div class="px-3 py-2">
                        ${escape(data.text)}
                    </div>
                `;
            },

            item: function (data, escape) {
                return `
                    <div>${escape(data.text)}</div>
                `;
            },
        },
    });
}