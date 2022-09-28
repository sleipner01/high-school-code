//Antall poeng for å vinne
var VINNERSUM = 5;

//varierende spillerpoeng
var spillerPoeng = 0;

//varierende maskinpoeng
var maskinPoeng = 0;

//variabler for tekstEl
var spillerPoengEl = document.getElementById("spillerPoeng");
var maskinPoengEl = document.getElementById("maskinPoeng");
var infoEl = document.getElementById("info");

//Startinfo
infoEl.innerHTML = "Velg stein, saks eller papir! Førstemann til " + VINNERSUM + " poeng vinner.";

//Variabler for img
var steinEl = document.getElementById("stein");
var saksEl = document.getElementById("saks");
var papirEl = document.getElementById("papir");
var maskinEl = document.getElementById("maskin");

//Klikkhendelser
steinEl.addEventListener("click", sjekkResultat);
saksEl.addEventListener("click", sjekkResultat);
papirEl.addEventListener("click", sjekkResultat);

//Klikkfunksjon
function sjekkResultat(e) {
    //Tilfedig valg maskin
    var tilfeldig = Math.floor(Math.random() * 3) + 1;

    if (tilfeldig === 1) {
        var maskinValg = "stein";
        maskinEl.src = "media/maskin_stein.png"; 
    } else if (tilfeldig === 2) {
        var maskinValg = "saks";
        maskinEl.src = "media/maskin_saks.png";
    } else {
        var maskinValg = "papir";
        maskinEl.src = "media/maskin_papir.png";
    }

    console.log("maskinen valgte " + maskinValg);

    steinEl.style.border = "solid 2px transparent";
    saksEl.style.border = "solid 2px transparent";
    papirEl.style.border = "solid 2px transparent";
    console.log("Du klikket på " + e.target.id);
    e.target.style.border = "solid 2px black";
    //Spillervalg
    var spillerValg = e.target.id;

    if (spillerValg ===  maskinValg) {
        //Start spill på nytt
    } else if (spillerValg === "stein") {
        if (maskinValg === "saks") {
            spillerPoeng++;
            spillerPoengEl.innerHTML = "<b>Spiller:</b> " + spillerPoeng;
        } else {
            maskinPoeng++;
            maskinPoengEl.innerHTML = "<b>Maskin:</b> " + maskinPoeng;
        }
    } else if (spillerValg === "saks") {
        if (maskinValg === "papir") {
            spillerPoeng++;
            spillerPoengEl.innerHTML = "<b>Spiller:</b> " + spillerPoeng;
        } else {
            maskinPoeng++;
            maskinPoengEl.innerHTML = "<b>Maskin:</b> " + maskinPoeng;
        }
    } else {
        if (maskinValg === "stein") {
            spillerPoeng++;
            spillerPoengEl.innerHTML = "<b>Spiller:</b> " + spillerPoeng;
        } else {
            maskinPoeng++;
            maskinPoengEl.innerHTML = "<b>Maskin:</b> " + maskinPoeng;
        }
    }
    if (spillerPoeng === VINNERSUM || maskinPoeng === VINNERSUM) {
        steinEl.removeEventListener("click", sjekkResultat);
        saksEl.removeEventListener("click", sjekkResultat);
        papirEl.removeEventListener("click", sjekkResultat);
    
        steinEl.style.cursor = "auto";
        saksEl.style.cursor = "auto";
        papirEl.style.cursor = "auto";
    
        if (spillerPoeng === VINNERSUM) {
            infoEl.innerHTML = "Gratulerer! Du vant! Godt spilt.";
        } else {
            infoEl.innerHTML = "Huffda, du tapte...";
        }
    }
}

if (spillerPoeng === VINNERSUM || maskinPoeng === VINNERSUM) {
    steinEl.removeEventListener("click", sjekkResultat);
    saksEl.removeEventListener("click", sjekkResultat);
    papirEl.removeEventListener("click", sjekkResultat);

    steinEl.style.cursor = "auto";
    saksEl.style.cursor = "auto";
    papirEl.style.cursor = "auto";

    if (spillerPoeng === VINNERSUM) {
        infoEl.innerHTML = "Gratulerer! Du vant! Godt spilt.";
    } else {
        infoEl.innerHTML = "Huffda, du tapte...";
    }
}
