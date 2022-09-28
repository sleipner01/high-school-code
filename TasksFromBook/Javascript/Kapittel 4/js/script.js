//4.1
function siHei() {
    console.log("Hei");
}

siHei();

//4.2
console.log("|------------|")
function siHeiTil(navn) {
    console.log("Hei " + navn + "!");
}

siHeiTil("Ola");

/*function fuksjonsNavn(argument1, argument2, argument3, ...) {
    kode
}*/
var lengde = prompt("Skriv inn lengden");
var bredde = prompt("Skriv inn bredden");

function arealRektangel(lengde, bredde) {
    var areal = lengde * bredde;
    console.log("Arealet av rektangelet er " + areal);
}

arealRektangel(lengde, bredde);


//4.3
function arealRektangel2(lengde, bredde) {
    var areal2 = lengde * bredde;
    return areal2;
}

console.log(arealRektangel2(lengde, bredde));


function arealRektangel3(lengde, bredde) {
    return lengde * bredde;
}

console.log(arealRektangel3(8, 4));



var alder = prompt("Skriv inn alderen din");

function sjekkMyndig(alder) {
    if(alder >= 18) {
        return "myndig";
    } else {
        return "ikke myndig";
    }
}

console.log(sjekkMyndig(alder));

function sjekkMyndig2(alder) {
    if (alder >= 18) {
        return "myndig";
    }
    return "ikke myndig";
}

console.log(sjekkMyndig2(alder));

console.log("----------")

function terning() {
    return Math.floor(Math.random() * 6) + 1;
}

var toLike = false;
var antallForsok = 0;

while(!toLike) {
    antallForsok++;

    var terning1 = terning();
    var terning2 = terning();

    console.log("Fikk " + terning1 + ", " + terning2);

    if(terning1 === terning2) {
        toLike = true;
        console.log("Fikk to like på " + antallForsok + " forsok");
    }
}


var tall = prompt("Tre tilfeldige tall mellom 1 og:")

function tallGenerator(tall) {
    return Math.floor(Math.random() * tall) + 1;
}

for(var i = 0; i < 3; i++) {
    console.log(tallGenerator(tall));
}



console.log("(\\ (\\");
console.log("( -.-)");
console.log("¤_(\")(\")");