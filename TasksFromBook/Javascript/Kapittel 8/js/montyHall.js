//Monty Hall
var bodyEl = document.getElementsByTagName("body");

var rodDorEl = document.getElementById("r");
var gronnDorEl = document.getElementById("g");
var blaaDorEl = document.getElementById("b");
var boxEl = document.getElementById("box");

rodDorEl.addEventListener("click", sjekkDor);
gronnDorEl.addEventListener("click", sjekkDor);
blaaDorEl.addEventListener("click", sjekkDor);

var bilder = "rgb";
var riktigDor = bilder[Math.floor(Math.random() * bilder.length)];
console.log(riktigDor);


function sjekkDor(e) {
    var trykketDor = e.target;

    if(trykketDor.id === "r") {
        console.log("Du trykket på den røde døren");
        rodDorEl.style.border = "solid 2px white";
        gronnDorEl.style.border = "solid 2px transparent";
        blaaDorEl.style.border = "solid 2px transparent";
        varselEl.innerHTML = "Du valgte den røde døren";
    } else if (trykketDor.id === "g") {
        console.log("Du trykket på den grønne døren");
        gronnDorEl.style.border = "solid 2px white";
        rodDorEl.style.border = "solid 2px transparent";
        blaaDorEl.style.border = "solid 2px transparent";
        varselEl.innerHTML = "Du valgte den grønne døren";
    } else {
        console.log("Du trykket på den blå døren");
        blaaDorEl.style.border = "solid 2px white";
        gronnDorEl.style.border = "solid 2px transparent";
        rodDorEl.style.border = "solid 2px transparent";
        varselEl.innerHTML = "Du valgte den blå døren";
    }

    if(trykketDor.id === "r") {
        if(riktigDor === "b") {
            gronnDorEl.src = "media/geit.png";
        } else if(riktigDor === "g") {
            blaaDorEl.src = "media/geit.png";
        } else {
            var bilde = "gb";
            var tilfeldig = bilde[Math.floor(Math.random() * bilde.length)];
            console.log(tilfeldig);
            if(tilfeldig = "g") {
                gronnDorEl.src = "media/geit.png";
            } else {
                blaaDorEl.src = "media/geit.png";
            }
        }
    } else if (trykketDor.id === "g") {
        if(riktigDor === "r") {
            blaaDorEl.src = "media/geit.png";
        } else if(riktigDor === "b") {
            rodDorEl = "media/geit.png";
        } else {
            var bilde = "rb";
            var tilfeldig = bilde[Math.floor(Math.random() * bilde.length)];
            console.log(tilfeldig);
            if(tilfeldig = "r") {
                rodDorEl.src = "media/geit.png";
            } else {
                blaaDorEl.src = "media/geit.png";
            }
        }
    } else {
        if(riktigDor === "r") {
            gronnDorEl.src = "media/geit.png";
        } else if(riktigDor === "b") {
            rodDorEl = "media/geit.png";
        } else {
            var bilde = "rg";
            var tilfeldig = bilde[Math.floor(Math.random() * bilde.length)];
            console.log(tilfeldig);
            if(tilfeldig = "r") {
                rodDorEl.src = "media/geit.png";
            } else {
                gronnDorEl.src = "media/geit.png";
            }
        }
    }
}

var varselEl = document.createElement("p");
bodyEl[0].appendChild(varselEl);
