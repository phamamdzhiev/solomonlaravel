// import './bootstrap';
import './admin';

//hamburder

window.addEventListener('load', function () {
    const hamburgerToggleHandler = document.getElementById('js-toggle-hamburger');
    const hamburgerMenu = document.getElementById('js-navigation-list');

    hamburgerToggleHandler.addEventListener('click', function () {
        hamburgerMenu.classList.toggle('hidden')
    });
})

// import Alpine from 'alpinejs';
//
// window.Alpine = Alpine;
//
// Alpine.start();
