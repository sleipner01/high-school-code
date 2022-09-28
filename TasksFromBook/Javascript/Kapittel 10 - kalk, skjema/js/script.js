var filmTittelEl = document.querySelector("#filmTittel");
console.log(filmTittelEl.value);

var oscarJaEl = document.getElementById("oscarJa");
var oscarNeiEl = document.getElementById("oscarNei");

if(oscarJaEl.checked) {
    console.log("Filmen har vunnet Oscar");
} else if(oscarNeiEl.checked) {
    console.log("Filmen har ikke vunnet Oscar");
}