//Henter alle elementene of legger til eventlistener til bildet
var bodyEl = document.querySelector("body");
var termometerEl = document.getElementById("termometer");
    termometerEl.addEventListener("click", sjekkPunkt);

function sjekkPunkt(e) {
    //Setter en variabel til y-posisjonen for at det skal være lettere å lese
    var punkt = e.clientY;
    //om det er klikket på den kalde delen. Har delt bildet fra midten for å gjøre det litt lettere.
    //Det gjør at skillet på varmt og kaldt er på +1,5 på termometeret
    if(punkt > termometerEl.height/2) {
        var farge = ((punkt-termometerEl.height/2)/termometerEl.height)*100;
        //hsl av 240 er en blåfarge. Les på w3schools om hvordan hsl() funker
        bodyEl.style.backgroundColor = "hsl(240, 100%, " + farge + "%)";
        //Om det er klikket på den varme delen
    } else if(punkt < termometerEl.height/2) {
        var farge = ((termometerEl.height/2-punkt)/termometerEl.height)*100;
        //Hsl av 0 er rød
        bodyEl.style.backgroundColor = "hsl(0, 100%, "+ farge + "%)"
    }
}
