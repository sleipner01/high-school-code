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
    for(var i = 0; i < 5; i++) {
        var kast = Math.floor(Math.random()*6) + 1;
        enkeltKast.push(kast);
        if(kast === 6) {seksere++};

        var bilder = document.getElementsByTagName("img");
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
}