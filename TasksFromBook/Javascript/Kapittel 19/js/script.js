var indeksSynligBilde = 0;
var indeksNesteBilde;
var tid = 3000;

var bildefiler = ["bilde1.jpg", "bilde2.jpg", "bilde3.jpg"];

var bildeKarusellEl = document.getElementById("bildekarusell");

for(var i = 0; i < bildefiler.length; i++) {
    var bildeDiv = document.createElement("div");
    bildeDiv.className = "bilde";
    bildeKarusellEl.appendChild(bildeDiv);
}

var bilder = document.getElementsByClassName("bilde");

for(var i = 0; i < bilder.length; i++) {
    bilder[i].style.backgroundImage = "url(media/" + bildefiler[i] + ")";

    if(i != 0) {
        bilder[i].style.display = "none";
    }
}

setTimeout(flytt, tid);

function flytt() {
    if(indeksSynligBilde === bilder.length - 1) {
        indeksNesteBilde = 0;
    } else {
        indeksNesteBilde = indeksSynligBilde + 1;
    }

    bilder[indeksNesteBilde].style.left = "600px";
    bilder[indeksNesteBilde].style.display = "initial";
    bilder[indeksNesteBilde].style.animation = "innFraHoyre 2s forwards";

    bilder[indeksSynligBilde].style.animation = "utTilVenstre 2s forwards";
    
    indeksSynligBilde = indeksNesteBilde;

    setTimeout(flytt, tid);
}