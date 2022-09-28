var alder = prompt("Skriv inn alderen din");
alder = alder.replace(/\D/g,'');

if(alder-18 >= 0 ) {
    alert("Du er myndig!");
} else {
    alert("Du er ikke myndig");
}
