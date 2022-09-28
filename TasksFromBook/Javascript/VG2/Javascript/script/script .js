

var tekst = "hei på deg";
console.log(tekst);

var tall1 = 424;

var tall2 = 656;

var sum = tall1+tall2;
console.log(sum);


var diameter = 30;
var radius = diameter/2;
var arial = Math.PI*radius*radius;

console.log("En sirkel med radius: " + radius + ", har arealet: " + arial);


var tall = 15

if (tall < 10) {
    console.log("tallet er mindre enn 10");
} else {
    console.log("tallet er større enn 10");
}


//HTML

var utskriftEl = document.getElementById("numberofclicks");
var buttonEl = document.getElementById("button");

buttonEl.addEventListener("click", runFunction);

var numberOfClicks = 0;

function runFunction(e) {
    numberOfClicks++;
    
    utskriftEl.innerHTML = "Nå har du trykket " + numberOfClicks + " ganger.";
    buttonEl.innerHTML = "Fortsett å trykk på meg bro";


}