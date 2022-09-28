var mittLydklipp = document.getElementById("audio");

mittLydklipp.addEventListener("ended", ferdig);

function ferdig() {
    console.log("Den er ferdig dust");
}

//13.6
var visVideo = document.getElementById("visVideo");
var lukkVideo = document.getElementById("lukkVideo");
var vindu = document.getElementById("forgrunnsvindu");

visVideo.addEventListener("click", visVideoVindu);
lukkVideo.addEventListener("click", lukkVideoVindu);

function visVideoVindu() {
    var topp = (window.innerHeight - 266) / 2;
    var venstre = (window.innerHeight - 346) / 2;
    vindu.style.top = topp + "px";
    vindu.style.left = venstre + "px";
    vindu.style.display = "initial";
}

function lukkVideoVindu() {
    vindu.style.display = "none";
}