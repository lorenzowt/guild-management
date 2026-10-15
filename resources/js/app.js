const sidebar = document.getElementById('sidebar');
const sidebarBackdrop = document.getElementById('sidebar-backdrop');
const openSidebarButton = document.getElementById('open-sidebar-button');
const closeSidebarButton = document.getElementById('close-sidebar-button');

function openSidebar() {
    sidebar.classList.remove('-translate-x-full');
    sidebarBackdrop.classList.remove('hidden');
    openSidebarButton.setAttribute('aria-expanded', 'true');
    document.body.classList.add('overflow-hidden');
}

function closeSidebar() {
    sidebar.classList.add('-translate-x-full');
    sidebarBackdrop.classList.add('hidden');
    openSidebarButton.setAttribute('aria-expanded', 'false');
    document.body.classList.remove('overflow-hidden');
}

openSidebarButton?.addEventListener('click', openSidebar);
closeSidebarButton?.addEventListener('click', closeSidebar);
sidebarBackdrop?.addEventListener('click', closeSidebar);

window.addEventListener('resize', function () {
    if (window.innerWidth >= 1024) {
        closeSidebar();
    }
});