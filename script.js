//section: open and close side-navigation

// Wait for the DOM to be fully loaded
document.addEventListener("DOMContentLoaded", function () {

    //open navigation
    document.getElementById("side-button").addEventListener("click", function () {
        document.getElementById("side-wrapper").classList.toggle("active");
    });

    //close navigation on clicking page
    document.getElementById("page-content-wrapper").addEventListener("click", function () {
        document.getElementById("side-wrapper").classList.remove("active");
    });

    //close navigation on close button click
    document.getElementById("nav-close").addEventListener("click", function () {
        document.getElementById("side-wrapper").classList.remove("active");
        
        // close resource section when clicking close button 
        document.getElementById("select-program").classList.toggle("active");
        document.getElementById("select-category1").classList.remove("active");
        document.getElementById("select-category2").classList.remove("active");
    });

    //   section: open and close resource and program links in side-navigation

    // open resource segment
    document.getElementById("resource-button").addEventListener("click", function () {
        document.getElementById("select-program").classList.toggle("active");

        // close BSc and BCA section when clicking resource button 
        document.getElementById("select-category1").classList.remove("active");
        document.getElementById("select-category2").classList.remove("active");
    });

    // open BSc segment 
    document.getElementById("program-button1").addEventListener("click", function () {
        document.getElementById("select-category1").classList.toggle("active");
    });

    // open BCA segment 
    document.getElementById("program-button2").addEventListener("click", function () {
        document.getElementById("select-category2").classList.toggle("active");
    });

    // section: goto a certain section of the page
    const scrollButton = document.getElementById('arrow-icon');
    scrollButton.addEventListener('click', function () {
        const targetSection = document.getElementById('section-2');
        targetSection.scrollIntoView({ behavior: 'smooth' });
    });

});




