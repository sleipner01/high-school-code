
var onske = prompt("Hva er ditt ønske?");

var svar = ["Ja", "Nei", "Spør senere"];

var tilfeldig = Math.floor(Math.random() * (svar.length));

alert(svar[tilfeldig]);
