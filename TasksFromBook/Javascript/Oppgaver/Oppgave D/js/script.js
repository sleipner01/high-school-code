//Ikke den beste løsningen, men den funker. Måtte kjappe meg

var knappEl = document.getElementById("knapp");
    knappEl.addEventListener("click", kastTerninger);
var terningFeltEl = document.getElementById("terningFelt");
var tilbakemeldingEl = document.getElementById("tilbakemelding");
var kastEl = document.getElementById("kast");

for(var i = 0; i < 5; i++) {
    var bilde = document.createElement("img");
        bilde.setAttribute("class", "aapen");
        bilde.addEventListener("click", laas);
    terningFeltEl.appendChild(bilde);
}

var terningKast = [];
var antallKast = 0;
var bilder = document.getElementsByTagName("img");

function kastTerninger() {
    if(antallKast === 0) {
        for(var i = 0; i < 5; i++) {
            var kast = Math.floor(Math.random()*6) + 1;
        
            bilder[i].src = "media/Terning" + kast + ".jpg";
            tilbakemeldingEl.innerHTML = "Lås terningene du ønsker, og kast på nytt!";
            terningKast.push(kast);
            yatzi();
        }
    } else {
        for(var i = 0; i < 5; i++) {
            if(bilder[i].className === "laast") {
                i++;
            } else {
                var kast = Math.floor(Math.random()*6) + 1;
                bilder[i].src = "media/Terning" + kast + ".jpg";
                terningKast[i] = kast + 0;
                yatzi();
            }
        }
    }

    console.log(terningKast);
    antallKast++;
    kastEl.innerHTML = "Kast nr. " +  antallKast;
    if(antallKast === 3) {
        avslutt();
    }
}

function yatzi() {
    var seksere = 0;
    for(var i = 0; i < terningKast.length; i++) {
        if(terningKast[i] === 6) {seksere++;}
    }
    if(seksere === 5) {
        tilbakemeldingEl.innerHTML = "YATZI!";
        terningKast = [];
        antallKast = 0;
        for(var i = 0; i < bilder.length; i++) {
            bilder[i].className = "aapen";
        }
    }
}

function avslutt(seksere) {
    var sum = 0;
    var seksere = 0;
    for(var i = 0; i < terningKast.length; i++) {
        sum += terningKast[i];
        if(terningKast[i] === 6) {seksere++;}
    }

    tilbakemeldingEl.innerHTML = "Du fikk " + seksere + " seksere. Den totale summen ble " + sum;

    terningKast = [];
    antallKast = 0;
    for(var i = 0; i < bilder.length; i++) {
        bilder[i].className = "aapen";
    }
}

function laas(e) {
    if(e.target.className === "laast") {
        e.target.className = "aapen";
    } else if(e.target.className === "aapen") {
        e.target.className = "laast";
    }
}