const header = document.getElementById('header');

const menu_mobile = document.getElementById('menu_mobile');
const btn_open_menu = document.getElementById('btn_open_menu');
const btn_close_menu = document.getElementById('btn_close_menu');

let isMenuHidden = false;
let lastScrollY = window.scrollY;

btn_open_menu.addEventListener('click', () => {
    menu_mobile.classList.remove('hidden');
    menu_mobile.classList.add('fixed');
    menu_mobile.classList.add('backdrop-blur-lg');
})

btn_close_menu.addEventListener('click', () => {
    menu_mobile.classList.remove('fixed');
    menu_mobile.classList.remove('backdrop-blur-lg');
    menu_mobile.classList.add('hidden');
})

window.onscroll = () => {
    console.log(lastScrollY, window.scrollY)

    if (lastScrollY + 200 < window.scrollY) {
        isMenuHidden = true;

        header.classList.remove('translate-y-0')
        header.classList.add('-translate-y-full')
    } else {
        header.classList.remove('-translate-y-full')
        header.classList.add('translate-y-0')
        isMenuHidden = false;
    }

    if (window.scrollY > 100) {
        header.classList.add('backdrop-blur-xl')
    } else {
        header.classList.remove('backdrop-blur-xl')
    }
}

window.onscrollend = () => {
    lastScrollY = window.scrollY;
}