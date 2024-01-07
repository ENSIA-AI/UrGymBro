const go_to_top = document.createElement("button");
const html1 = document.querySelector("html");
go_to_top.style.cssText =
  "display: block;opacity:0;width: 30px;height: 30px;position: relative;left: 95%;top: 85%;z-index: 500px;position: fixed;border: 1px solid;border-radius: 5PX;";
go_to_top.innerHTML = '<i class="fas fa-chevron-up"></i>';
document.body.appendChild(go_to_top);
const appear_hide = function appear_hide() {
  if (window.scrollY > 0) {
    go_to_top.style.transition = "opacity,0.5s";
    go_to_top.style.opacity = "1";
  } else {
    go_to_top.style.transition = "opacity,0.5s";
    go_to_top.style.opacity = "0";
  }
};

const scroll_top = function scroll_top() {
  html1.scrollIntoView({ behavior: "smooth" });
};

const hover = function hover() {
  go_to_top.style.backgroundColor = " rgb(221, 27, 27)";
  go_to_top.style.cursor = "pointer";
};
const not_hover = function not_hover() {
  go_to_top.style.backgroundColor = " rgb(253, 60, 60)";
};
go_to_top.addEventListener("mouseover", hover);
go_to_top.addEventListener("mouseleave", not_hover);
go_to_top.addEventListener("click", scroll_top);
window.addEventListener("scroll", appear_hide);
console.log(window.scrollY);