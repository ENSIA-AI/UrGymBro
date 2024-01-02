// Function to show the popup
function showPopup(productNumber) {
  var popup = document.getElementById("popup" + productNumber);
  popup.style.display = "block";
}

// Function to hide the popup
function hidePopup(productNumber) {
  var popup = document.getElementById("popup" + productNumber);
  popup.style.display = "none";
}

// Add event listeners
document.addEventListener("DOMContentLoaded", function () {
  var buttons = document.querySelectorAll(".popup-button");
  var closeIcons = document.querySelectorAll(".popup-close");

  buttons.forEach(function (button) {
    button.addEventListener("click", function () {
      var productNumber = this.dataset.productNumber;
      showPopup(productNumber);
    });
  });

  closeIcons.forEach(function (closeIcon) {
    closeIcon.addEventListener("click", function () {
      var productNumber = this.dataset.productNumber;
      hidePopup(productNumber);
    });
  });
});
