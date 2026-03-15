import './stimulus_bootstrap.js';

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');

const updateHeaderScroll = () => {
    const header = document.getElementById('main-header');
    const body = document.body;
    const scrollY = window.pageYOffset || document.documentElement.scrollTop;

    // Calculate progress (0 to 1) over 150px
    const progress = Math.min(scrollY / 150, 1);
    if (header) {
        header.style.setProperty('--scroll-progress', progress);
    }

    if (scrollY > 80) {
        body.classList.add('is-scrolled');
    } else {
        body.classList.remove('is-scrolled');
    }
};

window.addEventListener('scroll', updateHeaderScroll);
window.addEventListener('DOMContentLoaded', updateHeaderScroll);
updateHeaderScroll(); // Immediate call
