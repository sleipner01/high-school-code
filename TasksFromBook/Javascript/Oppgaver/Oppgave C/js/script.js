var knappEl = document.getElementById("knapp");
    knappEl.addEventListener("click", kastTerninger);
var terningFeltEl = document.getElementById("terningFelt");
var tilbakemeldingEl = document.getElementById("tilbakemelding");

for(var i = 0; i < 5; i++) {
    var bilde = document.createElement("img");
    terningFeltEl.appendChild(bilde);
}

var terningKast = [];

function kastTerninger() {
    var seksere = 0;
    var enkeltKast = [];
    var bilder = document.getElementsByTagName("img");
    for(var i = 0; i < 5; i++) {
        var kast = Math.floor(Math.random()*6) + 1;
        enkeltKast.push(kast);
        if(kast === 6) {seksere++};

            bilder[i].src = "media/Terning" + kast + ".jpg";
    }
    terningKast.push(enkeltKast);

    tilbakemeldingEl.innerHTML = "Du fikk " + seksere + " seksere.";
    if(seksere > 0) {
        tilbakemeldingEl.innerHTML += " Summen av disse er: " + 6 * seksere;
    }
    if(seksere === 5) {
        tilbakemeldingEl.innerHTML = "YATZI";
    }

    console.log(enkeltKast);
    console.log(terningKast);

    if(terningKast.length === 3) {
        avslutt(seksere);
    }
}

function avslutt(seksere) {
    var best = [[0, 0]];
    for(var i = 0; i < terningKast.length; i++) {
        var sum = 0;
        for(var j = 0; j < terningKast[i].length; j++) {
            sum += terningKast[i][j];
        }
        if(sum === best[0][0]) {
            best.push([sum, i]);
        }
        if(sum > best[0][0]) {
            best[0][0] = sum;
            best[0][1] = i;
        }
    }
    if(best.length === 2) {
        tilbakemeldingEl.innerHTML = "Dine beste kast var kast nr. " + (best[0][1] + 1) + " og kast nr. " + (best[1][1] + 1) + ". Den totale summen ble " + best [0][0] + " og " + best[1][0];
    } else {
        tilbakemeldingEl.innerHTML = "Ditt beste kast var kast nr. " + (best[0][1] + 1) + " og ga " + seksere + " seksere. Den totale summen ble " + best [0][0];
    } 
    console.log(best);

    terningKast = [];
}