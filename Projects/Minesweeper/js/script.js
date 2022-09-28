var bodyEl = document.getElementsByTagName("body");
var brettEl = document.getElementById("brett");

var brett = [];
var bomber = [];

var hoyde = 7;
var bredde = 7;


//Brettlager
for(var i = 0; i < hoyde; i++) {
    var rad = document.createElement("div");
        rad.setAttribute("id", i);
        rad.setAttribute("class", "rad");
        brettEl.appendChild(rad);
    for(var j = 0; j < bredde; j++) {
        var blokk = document.createElement("div");
            blokk.setAttribute("id", j);
            blokk.setAttribute("class", "blokk");
            blokk.addEventListener("click", sjekkBlokk);
            rad.appendChild(blokk);

            var tilfeldig = Math.floor(Math.random()*6);
            if(tilfeldig === 0) {
                bomber.push([i, j]);
            }
    }
}
console.log(bomber);

function sjekkBlokk(e) {
    console.log(e.target.parentNode.id + e.target.id);
    for(var i = 0; i < bomber.length; i++) {
        if(Number(e.target.parentNode.id) === bomber[i][0] && Number(e.target.id) === bomber[i][1]) {
            e.target.style.backgroundColor = "red";
            e.target.innerHTML = "BOMBE";
            break;
        } else {
            e.target.style.backgroundColor = "cornflowerblue";
        }
    }
}