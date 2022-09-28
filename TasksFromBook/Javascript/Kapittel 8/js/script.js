//8.1
var overskriftEl = document.createElement("h1");
overskriftEl.innerHTML = "Hendelser | ";
overskriftEl.innerHTML += "Klikk";
overskriftEl.setAttribute = "overskrift";

var bodyEl = document.getElementsByTagName("body");
bodyEl[0].appendChild(overskriftEl);

overskriftEl.addEventListener("mouseover", minFunksjon)

function minFunksjon(){
    overskriftEl.style.cursor = "pointer";
}

overskriftEl.addEventListener("click", minFunksjon2);

function minFunksjon2(){
    console.log("Du har klikket på overskriften.");
    overskriftEl.style.color = "lightgreen";
}


var avsnittEl = document.createElement("p");
bodyEl[0].appendChild(avsnittEl);
avsnittEl.innerHTML = "Trykk på meg bro...";
avsnittEl.style.cursor = "pointer";
avsnittEl.addEventListener("click", endre);

var bildeEl = document.createElement("div");
    bildeEl.setAttribute = "bilde";
    bodyEl[0].appendChild(bildeEl);

function endre(){
    avsnittEl.innerHTML = "Du trykket på meg!!! Her har du et bilde av Barney i fem sekunder";
    avsnittEl.style.color = "#323232";
    bildeEl.innerHTML = "<img src='media/suit-up.jpg' />";
    bodyEl[0].style.backgroundColor = "#FFFFFF";
    setTimeout("gjem()", 5000);
}

function gjem() {
    bildeEl.innerHTML = "";
    bodyEl[0].style.backgroundColor = "#323232";
    avsnittEl.innerHTML = "Trykk på meg bro...";
    avsnittEl.style.color = "#f2f2f2";
}


var linkEl = document.createElement("a");
linkEl.innerHTML = "Klikk her for å teste ut Monty Hall problemet";
linkEl.href = "montyHall.html";
bodyEl[0].appendChild(linkEl);


//8.3
var xPosisjonEl = document.createElement("p");
xPosisjonEl.setAttribute = "xPosisjon";
var yPosisjonEl = document.createElement("p");
yPosisjonEl.setAttribute = "yPosisjon";

bodyEl[0].addEventListener("mousemove", visPosisjon);
bodyEl[0].appendChild(xPosisjonEl);
bodyEl[0].appendChild(yPosisjonEl);

function visPosisjon(e) {
    xPosisjonEl.innerHTML = "X: " + e.clientX;
    yPosisjonEl.innerHTML = "Y: " + e.clientY;
}


var trykketEl = document.createElement("p");
trykketEl.setAttribute = "trykket";

bodyEl[0].addEventListener("keydown", sjekkKnapp);
bodyEl[0].appendChild(trykketEl);

function sjekkKnapp(e) {
    trykketEl.innerHTML = "keyCode: " + e.keyCode;

    if(e.keyCode === 87) {
        console.log("Du har trykket på W-knappen");
    }
}

//8.4
/*element.addEventListener("click", function() {
    minFunksjon(argument);
});*/