document.addEventListener("DOMContentLoaded", function () {
  var descriptions = document.querySelectorAll(".product .product_description");

  descriptions.forEach(function (description) {
    description.classList.add("truncate");
  });
});
