document.addEventListener('DOMContentLoaded', function() {
    function openBurgerMenu() {
        document.querySelector('.menu--burger').addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector('.main-nav').classList.toggle('main-nav-open');
            this.classList.toggle('menu--close');
            document.body.classList.toggle('main--freezed');
        });
    }

    function setup() {
        openBurgerMenu();
    }

    setup();
});