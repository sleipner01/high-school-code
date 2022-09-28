var bodyEl = document.getElementsByTagName("body");
var sirkelEl = document.getElementById("sirkel");

bodyEl[0].addEventListener("mousemove", flyttSirkel);

function flyttSirkel(e) {
    sirkelEl.style.left = (e.clientX - 25) + "px";
    sirkelEl.style.top = (e.clientY -25) + "px";

    sirkelEl.style.backgroundColor = "hsl(" + e.clientX + "," + e.clientY + "% , 50%";
}