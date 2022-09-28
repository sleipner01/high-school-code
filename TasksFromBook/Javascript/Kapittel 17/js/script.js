var boksEl = document.getElementsByClassName("boks2");
var knappEl = document.getElementById("knapp");

knappEl.addEventListener("click", flyttBoks);
boksEl[0].addEventListener("transitionend", ferdig);

function flyttBoks() {
    if(knappEl.innerHTML === "Start") {
        knappEl.innerHTML = "Tilbake";
        boksEl[0].classList.remove("flyttVenstre");
        boksEl[0].classList.add("flyttHoyre");
    } else {
        knappEl.innerHTML = "Start";
        boksEl[0].classList.remove("flyttHoyre");
        boksEl[0].classList.add("flyttVenstre");
    }
}

function ferdig() {
    boksEl[0].innerHTML = "ferdig";
}

var boks4El = document.getElementsByClassName("boks4");
var sirkelEl = document.getElementsByClassName("sirkel");

boks4El[0].addEventListener("animationstart", lytteFunksjon);
boks4El[0].addEventListener("animationiteration", lytteFunksjon);
boks4El[0].addEventListener("animationend", lytteFunksjon);
sirkelEl[0].addEventListener("animationstart", lytteFunksjon);
sirkelEl[0].addEventListener("animationiteration", lytteFunksjon);
sirkelEl[0].addEventListener("animationend", lytteFunksjon);

function lytteFunksjon(e) {
    console.log(e.type + " tid: " + e.elapsedTime);

    if(e.type === "animationend") {
        sirkelEl[0].style.animationPlayState = "running";
    }
}