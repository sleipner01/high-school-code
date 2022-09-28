var bodyEl = document.getElementsByTagName("body");
var boksEl = document.getElementById("boks");

var venstre = 0;
var topp = 0;

var fart = 10;

bodyEl[0].addEventListener("keydown", flyttBoks);

function flyttBoks(e) {
    if(e.keyCode === 37) {
        venstre -= fart;
    } else if(e.keyCode === 39) {
        venstre += fart;
    } else if(e.keyCode === 38) {
        topp -= fart;
    } else if(e.keyCode === 40) {
        topp += fart;
    }

    boksEl.style.top = topp + "px";
    boksEl.style.left = venstre + "px";
}
