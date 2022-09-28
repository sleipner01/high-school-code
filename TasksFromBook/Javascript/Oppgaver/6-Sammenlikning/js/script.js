var tall1 = prompt("Skriv inn et tall");
tall1 = tall1.replace(/\D/g,'');
var tall2 = prompt("Skriv inn enda et tall");
tall2 = tall2.replace(/\D/g,'');

if(tall1-tall2 == 0) {
    alert(tall1 + " er likt ditt andre tall "+ tall2);
} else if(tall1-tall2 > 0) {
    alert(tall1 + " er større enn " + tall2);
} else {
    alert(tall1 + " er mindre enn " + tall2);
}