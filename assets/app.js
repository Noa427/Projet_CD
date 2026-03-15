import './stimulus_bootstrap.js';

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');

const updateHeaderScroll = () => {
    const header = document.getElementById('main-header');
    const spacer = document.getElementById('header-spacer');
    const body = document.body;
    const scrollY = window.pageYOffset || document.documentElement.scrollTop;

    // Calculate progress (0 to 1) over 150px
    const progress = Math.min(scrollY / 150, 1);
    if (header) {
        header.style.setProperty('--scroll-progress', progress);

        // Update spacer height dynamically
        const headerHeight = header.offsetHeight;
        if (spacer) {
            spacer.style.setProperty('--header-height', `${headerHeight}px`);
        }
    }

    if (scrollY > 60) {
        body.classList.add('is-scrolled');
    } else {
        body.classList.remove('is-scrolled');
    }
};

window.addEventListener('scroll', updateHeaderScroll);
window.addEventListener('DOMContentLoaded', updateHeaderScroll);
updateHeaderScroll(); // Immediate call
