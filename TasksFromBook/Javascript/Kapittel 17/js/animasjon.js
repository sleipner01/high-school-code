var innpakningEl = document.getElementsByClassName("innpakning");

var antallBokser = 30;

for(var i = 0; i < antallBokser; i++) {
    var nyBoks = document.createElement("div");

    nyBoks.className = "animer";
    nyBoks.style.left = i * 20 + "px";
    nyBoks.style.animationDelay = i * 0.2 + "s";

    innpakningEl[0].appendChild(nyBoks);
}