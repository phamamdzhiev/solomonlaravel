import './bootstrap';

//hamburder

const hamburgerToggleHandler = document.getElementById('js-toggle-hamburger');
const hamburgerMenu = document.getElementById('js-navigation-list');

hamburgerToggleHandler.addEventListener('click', function () {
    hamburgerMenu.classList.toggle('hidden')
});

// import Alpine from 'alpinejs';
//
// window.Alpine = Alpine;
//
// Alpine.start();
