//section: open and close side-navigation

// Wait for the DOM to be fully loaded
document.addEventListener("DOMContentLoaded", function() {
    //open navigation
    document.getElementById("side-button").addEventListener("click", function() {
        document.getElementById("side-wrapper").classList.toggle("active");
    });
    //close navigation
    document.getElementById("page-content-wrapper").addEventListener("click", function() {
        document.getElementById("side-wrapper").classList.remove("active");
    });
    document.getElementById("nav-close").addEventListener("click", function(){
        document.getElementById("side-wrapper").classList.remove("active");
    });
  });

//   section: open and close resource links in navigation

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("resource-button").addEventListener("click", function() {
        document.getElementById("select-program").classList.toggle("active");
    });

  });

// section: goto a certain section of the page
document.addEventListener('DOMContentLoaded', function () {
    const scrollButton = document.getElementById('arrow-icon');
    scrollButton.addEventListener('click', function () {
        const targetSection = document.getElementById('section-2');
        targetSection.scrollIntoView({ behavior: 'smooth' });
    });
});

