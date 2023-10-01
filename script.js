// Wait for the DOM to be fully loaded
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("side-button").addEventListener("click", function() {
        document.getElementById("side-wrapper").classList.toggle("active");
    });
    document.getElementById("page-content-wrapper").addEventListener("click", function() {
        document.getElementById("side-wrapper").classList.remove("active");
    });
  });

// goto a certain section of the page
document.addEventListener('DOMContentLoaded', function () {
    const scrollButton = document.getElementById('arrow-icon');
    scrollButton.addEventListener('click', function () {
        const targetSection = document.getElementById('section-2');
        targetSection.scrollIntoView({ behavior: 'smooth' });
    });
});

