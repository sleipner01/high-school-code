var opprettEl = document.querySelector(".forside");
var ovelserEl = document.querySelector(".ovelser");

var navnEl = document.querySelector(".navn");
var motstandEl = document.querySelector(".motstand");
var settEl = document.querySelector(".sett");
var repitisjonerEl = document.querySelector(".repitisjoner");
var pauseEl = document.querySelector(".pause");
var leggTilEl = document.querySelector(".leggTil");

var oppsettEl = document.querySelector(".oppsett");

leggTilEl.addEventListener("click", leggTil);
var ovelser = [];

class Ovelse {
    constructor(navn, motstand, sett, repitisjoner, pause) {
        this.navn = navn;
        this.motstand = motstand;
        this.sett = sett;
        this.repitisjoner = repitisjoner;
        this.pause = pause;
    }
}

function leggTil() {
    ovelser.push(new Ovelse(navnEl.value, motstandEl.value, settEl.value, repitisjonerEl.value, pauseEl.value, leggTilEl.value))
    console.log(ovelser)

    oppsettEl.innerHTML = "<tr><th>Navn</th><th>Motstand</th><th>Sett</th><th>Repitisjoner</th><th>Pause</th></tr>";
    for(var i = 0; i < ovelser.length; i++) {
        oppsettEl.innerHTML += "<tr><td>" + ovelser[i].navn + "</td><td>" + ovelser[i].motstand + "</td><td>" + ovelser[i].sett + "</td><td>" + ovelser[i].repitisjoner + "</td><td>" + ovelser[i].pause + "</td></tr>" 
    }
}