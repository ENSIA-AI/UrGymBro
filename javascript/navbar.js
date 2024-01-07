// Code for Humberger menu
document.addEventListener("DOMContentLoaded", function () {
  const menuButton = document.querySelector(".menu-button")
  const menuOptions = document.querySelector(".nav-list")

  menuButton.addEventListener("click", function () {
      menuOptions.classList.toggle("active");
  });

  document.addEventListener("click", function (event) {
      if (!menuOptions.contains(event.target) && event.target !== menuButton) {
          menuOptions.classList.remove("active");
      }
  });
});