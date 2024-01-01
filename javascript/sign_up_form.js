var username = document.getElementById("username");
var email = document.getElementById("user_email");
var password = document.getElementById("password");
var password_conf = document.getElementById("password_conf");
var user_gender = document.getElementById("user_gender");
var b_date = document.getElementById("b_date");
var user_height = document.getElementById("user_height");
var user_weight = document.getElementById("user_weight");
var button = document.getElementById("sign_up_button");
var message = document.createElement("div");
message.innerHTML = "please fill this box before you go on!";
message.style.cssText =
  "display:block;margin-top:10px;font-size: 16px;color:white;text-align:center;font-weight:800;";
custom_message = document.createElement("div");
custom_message.style.cssText =
  "display:block;margin-top:10px;font-size: 16px;color:white;text-align:center;font-weight:800;";

error_messages = [
  "username is not valid",
  "email is not valid",
  "password is too short",
  "password confirmation is not valid",
  "gender is not selected",
  "birth date is not valid",
  "weight is not valid",
  "height is not valid",
];
var my_custom_clone = [];
my_custom_clone.push(custom_message.cloneNode(true));
my_custom_clone.push(custom_message.cloneNode(true));
my_custom_clone.push(custom_message.cloneNode(true));
my_custom_clone.push(custom_message.cloneNode(true));
my_custom_clone.push(custom_message.cloneNode(true));
my_custom_clone.push(custom_message.cloneNode(true));
my_custom_clone.push(custom_message.cloneNode(true));
my_custom_clone.push(custom_message.cloneNode(true));

for (i = 0; i < 8; i++) my_custom_clone[i].innerHTML = error_messages[i];
var my_clone = [];
my_clone.push(message.cloneNode(true));
my_clone.push(message.cloneNode(true));
my_clone.push(message.cloneNode(true));
my_clone.push(message.cloneNode(true));
my_clone.push(message.cloneNode(true));
my_clone.push(message.cloneNode(true));
my_clone.push(message.cloneNode(true));
my_clone.push(message.cloneNode(true));

trigger = function trigger(input, message, cust_message) {
  if (input.value == "") {
    message.style.display = "inline";
    input.style.cssText = "display:block;border:red 2px solid;";
    input.insertAdjacentElement("afterend", message);
    cust_message.style.display = "none";
  } else {
    message.style.display = "none";
    input.style.cssText = "border:none;";
  }
};
hide_trigger = function hide_trigger(input, message, cust_message, i) {
  if (input.value != "") {
    message.style.display = "none";
    input.style.cssText = "border:none;";

    if (!is_valid(i)) {
      console.log(input.innerHTML.length > 0);
      cust_message.style.display = "inline";
      input.insertAdjacentElement("afterend", cust_message);
    } else {
      cust_message.style.display = "none";
    }
  }
};

username.addEventListener("focusout", function () {
  trigger(username, my_clone[0], my_custom_clone[0]);
});
email.addEventListener("focusout", function () {
  trigger(email, my_clone[1], my_custom_clone[1]);
});
password.addEventListener("focusout", function () {
  trigger(password, my_clone[2], my_custom_clone[2]);
});
password_conf.addEventListener("focusout", function () {
  trigger(password_conf, my_clone[3], my_custom_clone[3]);
});
user_gender.addEventListener("focusout", function () {
  trigger(user_gender, my_clone[4], my_custom_clone[4]);
});
b_date.addEventListener("focusout", function () {
  trigger(b_date, my_clone[5], my_custom_clone[5]);
});
user_height.addEventListener("focusout", function () {
  trigger(user_height, my_clone[6], my_custom_clone[6]);
});
user_weight.addEventListener("focusout", function () {
  trigger(user_weight, my_clone[7], my_custom_clone[7]);
});

username.addEventListener("input", function () {
  hide_trigger(username, my_clone[0], my_custom_clone[0], 1);
});
email.addEventListener("input", function () {
  hide_trigger(email, my_clone[1], my_custom_clone[1], 2);
});
password.addEventListener("input", function () {
  hide_trigger(password, my_clone[2], my_custom_clone[2], 3);
});
password_conf.addEventListener("input", function () {
  hide_trigger(password_conf, my_clone[3], my_custom_clone[3], 4);
});
user_gender.addEventListener("input", function () {
  hide_trigger(user_gender, my_clone[4], my_custom_clone[4], 5);
});
b_date.addEventListener("input", function () {
  hide_trigger(b_date, my_clone[5], my_custom_clone[5], 6);
});
user_height.addEventListener("input", function () {
  hide_trigger(user_height, my_clone[6], my_custom_clone[6], 8);
});
user_weight.addEventListener("input", function () {
  hide_trigger(user_weight, my_clone[7], my_custom_clone[7], 7);
});
function switch_focus(input) {
  input.focus();
}

username.addEventListener("keypress", function (event) {
  if (event.key === "Enter") {
    event.preventDefault();
    switch_focus(email);
  }
});
email.addEventListener("keypress", function (event) {
  if (event.key === "Enter") {
    event.preventDefault();
    switch_focus(password);
  }
});
password.addEventListener("keypress", function (event) {
  if (event.key === "Enter") {
    event.preventDefault();
    switch_focus(password_conf);
  }
});
password_conf.addEventListener("keypress", function (event) {
  if (event.key === "Enter") {
    event.preventDefault();
    switch_focus(user_gender);
  }
});
user_gender.addEventListener("keypress", function (event) {
  if (event.key === "Enter") {
    event.preventDefault();
    switch_focus(b_date);
  }
});
b_date.addEventListener("keypress", function (event) {
  if (event.key === "Enter") {
    event.preventDefault();
    switch_focus(user_weight);
  }
});
user_weight.addEventListener("keypress", function (event) {
  if (event.key === "Enter") {
    event.preventDefault();
    switch_focus(user_height);
  }
});
user_height.addEventListener("keypress", function (event) {
  if (event.key === "Enter") {
    event.preventDefault();
    button.click();
  }
});

function is_valid(input) {
  switch (input) {
    case 1:
      return username.value != "";

      break;
    case 2:
      return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value);
      break;
    case 3:
      return password.value.length >= 8;
      break;
    case 4:
      return password_conf.value == password.value && password_conf.value != "";
      break;
    case 5:
      return user_gender.value != "";
      break;
    case 6:
      return b_date.value != "";
      break;
    case 7:
      return user_weight.value > 0 && user_weight.value <= 500;
      break;
    case 8:
      return user_height.value > 0 && user_height.value <= 300;

      break;
    default:
      break;
  }

  return true;
}
function my_alert(i) {
  switch (i) {
    case 1:
      alert("username is not valid");
      break;
    case 2:
      alert("email is not valid");
      break;
    case 3:
      alert("password is too short");
      break;
    case 4:
      alert("password confirmation is not valid");
      break;
    case 5:
      alert("gender is not selected");
      break;
    case 6:
      alert("birth date is not valid");
      break;
    case 7:
      alert("weight is not valid");
      break;
    case 8:
      alert("height is not valid");
      break;
    default:
      break;
  }
}

button.addEventListener("click", function () {
  for (i = 1; i < 9; i++) {
    if (!is_valid(i)) my_alert(i);
  }
  if (
    is_valid(1) &&
    is_valid(2) &&
    is_valid(3) &&
    is_valid(4) &&
    is_valid(5) &&
    is_valid(6) &&
    is_valid(7)
  )
    alert("you will be logged in as" + username.value);
});
