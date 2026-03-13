import './stimulus_bootstrap.js';

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');

window.addEventListener('scroll', () => {
    const body = document.body;
    if (window.scrollY > 80) {
        body.classList.add('is-scrolled');
        console.log('Body is scrolled');
    } else {
        body.classList.remove('is-scrolled');
        console.log('Body is at top');
    }
});
