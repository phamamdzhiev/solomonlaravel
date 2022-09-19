// import './bootstrap';

window.addEventListener('load', function () {
    const toggleMenuButton = document.getElementById('js-toggle-hamburger');
    const navigationListMenu = document.getElementById('js-navigation-list');
    const toggleMenu = () => {
        navigationListMenu.classList.toggle('hidden')
    }

    toggleMenuButton.addEventListener('click', toggleMenu);
});


