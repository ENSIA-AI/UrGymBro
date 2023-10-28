document.addEventListener("DOMContentLoaded", function() {
    const menuButton = document.querySelector(".menu-button");
    const menuOptions = document.getElementById("menuOptions");
  
    // Toggle the menu options on button click
    menuButton.addEventListener("click", function() {
      menuOptions.classList.toggle("active");
    });
  
    // Close the menu options when clicking outside
    document.addEventListener("click", function(event) {
      if (!menuOptions.contains(event.target) && event.target !== menuButton) {
        menuOptions.classList.remove("active");
      }
    });
  });