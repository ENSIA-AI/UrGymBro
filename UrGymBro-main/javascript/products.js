function showPopup() {
  var popup = document.getElementById("popup1");
  popup.style.display = "block";

}
// Function to hide the popup
function hidePopup() {
  var popup = document.getElementById("popup1");
  popup.style.display = "none";
}
var img = document.querySelector(".popup-content #product1_img");
var imgval = document.querySelector("#product11_img");
var link = document.querySelector(".popup-content .links");
var linkval = document.querySelector("#product11_link");
var pname = document.querySelector(".popup-content #product1_name");
var pnameval = document.querySelector("#product11_name");
var price = document.querySelector(".popup-content #product1_price");
var descriptionval = document.querySelector("#product11_desc");
var description = document.querySelector(
  ".popup-content #product1_description"
);
let p1 = document.getElementById("popup-button1");
let p2 = document.getElementById("popup-button2");
let p3 = document.getElementById("popup-button3");
let p4 = document.getElementById("popup-button4");
let p5 = document.getElementById("popup-button5");
let p6 = document.getElementById("popup-button6");
let p7 = document.getElementById("popup-button7");
let p8 = document.getElementById("popup-button8");
let p9 = document.getElementById("popup-button9");

function updateinfo(num) {
  img.src = document.getElementById("product" + num + "_img").src;
  description.innerHTML = document.getElementById(
    "product" + num + "_description"
  ).innerHTML;
  link.innerHTML = document.getElementById(
    "product" + num + "_link"
  ).value;
  linkval.value=link.innerHTML;
  descriptionval.value=description.innerHTML;
  imgval.value=img.src;
  console.log(imgval.value);
  pname.innerHTML = document.getElementById(
    "product" + num + "_name"
  ).innerHTML;
  pnameval.value=pname.innerHTML;

  price.innerHTML = document.getElementById(
    "product" + num + "_price"
  ).innerHTML;

}

p1.addEventListener("click", function () {
  updateinfo(1);
  showPopup();
});
p2.addEventListener("click", function () {
  updateinfo(2);
  showPopup();
});
p3.addEventListener("click", function () {
  updateinfo(3);
  showPopup();
});
p4.addEventListener("click", function () {
  updateinfo(4);
  showPopup();
});
p5.addEventListener("click", function () {
  updateinfo(5);
  showPopup();
});
p6.addEventListener("click", function () {
  updateinfo(6);
  showPopup();
});
p7.addEventListener("click", function () {
  updateinfo(7);
  showPopup();
});
p8.addEventListener("click", function () {
  updateinfo(8);
  showPopup();
});
p9.addEventListener("click", function () {
  updateinfo(9);
  showPopup();
});

document.addEventListener("click", function (e) {
  if (e.target.className == "popup") {
    hidePopup();
  }
});
