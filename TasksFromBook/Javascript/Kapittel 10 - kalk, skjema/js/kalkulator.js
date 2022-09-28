var tall1El = document.getElementById("tall1");
var tall2El = document.getElementById("tall2");
var resultatEl = document.getElementById("resultat");

tall1El.addEventListener("input", beregn);
tall2El.addEventListener("input", beregn);

function beregn() {
    var tall1 = Number(tall1El.value);
    var tall2 = Number(tall2El.value);
    var sum = tall1 + tall2;

    resultatEl.innerHTML = sum;
}