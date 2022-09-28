var innpakning2El = document.getElementsByClassName("innpakning2");

for(var i = 0; i < 48; i++) {
    var div = document.createElement("div");

    div.className = "bokser";

    div.style.animationDuration = (Math.random() * 5 + 1) + "s";

    innpakning2El[0].appendChild(div);
}