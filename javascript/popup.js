// Function to show the popup
function showPopup() {
  var popup = document.getElementById("popup1");
  popup.style.display = "block";
}

// Function to hide the popup
function hidePopup() {
  var popup = document.getElementById("popup1");
  popup.style.display = "none";
}

// Add event listeners
document.addEventListener("DOMContentLoaded", function () {
  closeIcon = document.getElementsByClassName("close-btn");
  button = document.getElementsByClassName("popup-button");

  button.addEventListener("click", function () {
    console.log(100);
    showPopup();
  });

  closeIcon.addEventListener("click", function () {
    hidePopup();
  });
});
