// goto a certain section of the page
document.addEventListener('DOMContentLoaded', function () {
    const scrollButton = document.getElementById('arrow-icon');
    scrollButton.addEventListener('click', function () {
        const targetSection = document.getElementById('section-2');
        targetSection.scrollIntoView({ behavior: 'smooth' });
    });
});
