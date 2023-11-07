//section: open and close side-navigation

// Wait for the DOM to be fully loaded
document.addEventListener("DOMContentLoaded", function () {

 //open navigation
 document.getElementById("side-button").addEventListener("click", function () {
    document.getElementById("side-nav").classList.toggle("active");
});

//close navigation on clicking page
document.getElementById("page-content-wrapper").addEventListener("click", function () {
    document.getElementById("side-wrapper").classList.remove("active");
});


});




