var bodyEl = document.getElementsByTagName("body");

var rodDorEl = document.getElementById("r");
    rodDorEl.addEventListener("click", sjekkDor);
var gronnDorEl = document.getElementById("g");
    gronnDorEl.addEventListener("click", sjekkDor);
var blaaDorEl = document.getElementById("b");
    blaaDorEl.addEventListener("click", sjekkDor);
var boxEl = document.getElementById("box");
var infoEl = document.getElementById("info");

var bilder = "rgb";
var riktigDor = bilder[Math.floor(Math.random() * bilder.length)];

var valg = 0;

function sjekkDor(e) {
    valg++;

    rodDorEl.style.border = "solid 2px transparent";
    gronnDorEl.style.border = "solid 2px transparent";
    blaaDorEl.style.border = "solid 2px transparent";
    e.target.style.border = "solid 2px white";
    
    if(valg === 1) {
        bilder = bilder.split(riktigDor).join("");
        if(e.target.id === riktigDor) {
            document.getElementById(bilder[Math.floor(Math.random() * bilder.length)]).src = "media/geit.png";
        } else {
            for(var i = 0; i < bilder.length; i++) {
                if(bilder[i] != e.target.id) {
                    document.getElementById([bilder[i]]).src = "media/geit.png";
                }
            }
        }
        infoEl.innerHTML = "Vil du bytte dør? <br>Hvis ikke trykker du på døren på nytt";
    }
    if(valg === 2) {
        for(var i = 0; i < bilder.length; i++) {
            document.getElementById(bilder[i]).src = "media/geit.png";
        }
        if(e.target.id === riktigDor) {
            e.target.src = "media/bil.png";
            infoEl.innerHTML = "Du vant bilen! Spillet startes på nytt om 3 sekunder...";
        } else {
            document.getElementById(riktigDor).src = "media/bil.png";
            infoEl.innerHTML = "Du tapte:( Spillet startes på nytt om 3 sekunder...";
        }

        setTimeout(omStart, 3000);
    }
}

function omStart(e) {
    bilder = "rgb";
    valg = 0;
    rodDorEl.src = "media/rod.png";
    gronnDorEl.src = "media/gronn.png";
    blaaDorEl.src = "media/blaa.png";
    rodDorEl.style.border = "solid 2px transparent";
    gronnDorEl.style.border = "solid 2px transparent";
    blaaDorEl.style.border = "solid 2px transparent";
    infoEl.innerHTML = "Hvilken dør vil du velge?";
}