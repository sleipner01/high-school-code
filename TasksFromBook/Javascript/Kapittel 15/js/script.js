var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");

//Tegning
function tegnGalge() {
    ctx.beginPath();
    ctx.moveTo(100, 320);
    ctx.lineTo(100, 300);
    ctx.lineTo(500, 300);
    ctx.lineTo(500, 320);
    ctx.moveTo(200, 300);
    ctx.lineTo(200, 20);
    ctx.lineTo(350, 20);
    ctx.lineTo(350, 50);
    ctx.lineWidth = 4;
    ctx.strokeStyle = "lightgray";
    ctx.stroke();
}

function tegnHode() {
    ctx.beginPath();
    ctx.arc(350, 75, 25, 0 , Math.PI*2);
    ctx.stroke();
}

function tegn() {
    ctx.beginPath();
    ctx.stroke();
}

function tegnKropp() {
    ctx.beginPath();
    ctx.moveTo(350, 100);
    ctx.lineTo(350, 225);
    ctx.stroke();
}

function tegnVenstreArm() {
    ctx.beginPath();
    ctx.moveTo(350, 125);
    ctx.lineTo(300, 175);
    ctx.stroke();
}

function tegnHoyreArm() {
    ctx.beginPath();
    ctx.moveTo( 350, 125);
    ctx.lineTo(400, 175);
    ctx.stroke();
}

function tegnVenstreBen() {
    ctx.beginPath();
    ctx.moveTo(350, 225);
    ctx.lineTo(300, 275);
    ctx.stroke();
}

function tegnHoyreBen() {
    ctx.beginPath();
    ctx.moveTo(350, 225);
    ctx.lineTo(400, 275);
    ctx.stroke();
}

var sendInnEl = document.getElementById("sendInn");
var vindu = document.getElementById("forgrunnsvindu")
var losningsOrdEl = document.getElementById("losningsOrd")

sendInnEl.addEventListener("click", startSpill);
losningsOrdEl.addEventListener("change", startSpill);

function startSpill() {
    vindu.style.display = "none";

    //Løsningord
    var losningsOrd = losningsOrdEl.value.toUpperCase();

//Spill
    //Input elementet
    var bokstavEl = document.getElementById("bokstav");
    bokstavEl.addEventListener("change", sjekkBokstav);

    //p-elementer
    var sjanserIgjenEl = document.getElementById("sjanserIgjen");
    var ordEl = document.getElementById("ord");
    var brukteBokstaverEl = document.getElementById("brukteBokstaver");

    //Knapp
    var knappEl = document.getElementById("knapp");
    knappEl.addEventListener("click", sjekkBokstav);

    //Bruktebokstaver
    var brukteBokstaver = [];
    //Riktige bokstaver
    var ord = [];
    for(var i = 0; i < losningsOrd.length; i++) {
        ord.push("_");
    }
    
    //Antall sjanser
    var antallSjanser = 6;
    sjanserIgjenEl.innerHTML = "Antall sjanser igjen: " + antallSjanser;

    //Tegner galgen
    tegnGalge();

    //Legger inn antall bokstaver i "ord"    
    ordEl.innerHTML = "Ord: " + ord;
    
    //Knappen trykkes, sjekk bokstaven
    function sjekkBokstav() {

        var max_chars = 1;
        if(bokstavEl.value.length > max_chars) {
            alert("Du kan bare skrive inn ett tegn av gangen");
            bokstavEl.value = null;
        } else {

        //Henter gjettet bokstav, og gjør den stor
        var gjettetBokstav = bokstavEl.value.toUpperCase();

        //Sjekker at bokstaven ikke allerede er gjettet
        if(brukteBokstaver.indexOf(gjettetBokstav) === -1) {
            brukteBokstaver.unshift(gjettetBokstav);

            if(losningsOrd.indexOf(gjettetBokstav) === -1) {
                antallSjanser--;
            } else {
                //Sjekker om det er flere av bokstaven i løsningen
                for(var i = 0; i < losningsOrd.length; i++) {
                    if(losningsOrd[i] === gjettetBokstav) {
                        ord[i] = gjettetBokstav;
                    }
                }
            }
        } else {
            alert("Bokstaven er allerede gjettet");
        }

        bokstavEl.value = null;

        brukteBokstaverEl.innerHTML = "Brukte bokstaver: " + brukteBokstaver;
        ordEl.innerHTML = "Ord: " + ord;
        sjanserIgjenEl.innerHTML = "Antall sjanser igjen: " + antallSjanser;

        if(antallSjanser === 5) {
            tegnHode();
        } else if(antallSjanser === 4) {
            tegnKropp();
        } else if(antallSjanser === 3) {
            tegnVenstreArm();
        } else if(antallSjanser === 2) {
            tegnHoyreArm();
        } else if(antallSjanser === 1) {
            tegnVenstreBen();
        } else if(antallSjanser === 0) {
            tegnHoyreBen();
            alert("Du har tapt... Ordet var " + losningsOrd + ".");
        }

        var riktig = losningsOrd.localeCompare(ord.join(""));

        if(riktig === 0) {
            ordEl.innerHTML = "Ord: " + ord.join("");
            alert("Du vant! Ordet var: " + ord.join("") + "!");
        }
    }
    } 
}