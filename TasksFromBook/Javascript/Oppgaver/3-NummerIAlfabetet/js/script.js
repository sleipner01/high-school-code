var bokstav = prompt("Skriv inn én bokstav:");

bokstav = bokstav.toUpperCase();

var alfabetet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

var tall = alfabetet.indexOf(bokstav) + 1;

alert(bokstav + "er bokstav nr. " + tall + " i alfabetet");