var tall = [4, 6, 14, 75, 3, 17, 42];
var byer = ["Bergen", "Bodø", "Oslo", "Kristiansand", "Trondheim", "Lyngør<3"];

console.log(tall[0]);
console.log(tall[5]);
console.log(byer[0]);
console.log(byer[5]);

console.log("______");

console.log(tall.length);
console.log(byer.length);

console.log("______")

//Array inni en array, "Todimensjonal array"
var matOgDrikke = [
    ["Hamburger", "Pølse", "Pizza"],
    ["Kaffe", "Vann", "Te"]
]

console.log(matOgDrikke[0],matOgDrikke[1]);

console.log(matOgDrikke[0][1]);
console.log(matOgDrikke[1][0]);

//redigere arrayer
var eksTall = [4, 2, 5, 8, 12];
console.log("Nå er eksTall[2] = " + eksTall[2]);
eksTall[2] = 42;
console.log(eksTall);

eksTall.push(69);
console.log(eksTall);

eksTall.unshift(1);
console.log(eksTall);

eksTall.pop();
console.log(eksTall);

eksTall.shift();
console.log(eksTall);


console.log("______")

//Finne og fjerne enkeltverdier
var eksTall2 = [2, 4, 7, 14, 7, 42];
console.log(eksTall2.indexOf(7));
console.log(eksTall2.lastIndexOf(7));

var eksTall3 = [1, 2, 3, 4, 5];
eksTall3.splice(2, 1);
console.log(eksTall3);

eksTall2.splice(eksTall2.indexOf(7), 1);
console.log(eksTall2);

var eksTall4 = [1, 2, 3, 6];
eksTall4.splice(3, 0, 4, 5);
console.log(eksTall4);

console.log("_____");

//11.2
var tall = [1,2,3,4,6,8,12];

for(var i = 0; i < tall.length; i++) {
    console.log(tall[i]);
}

var sum = 0;

for(var i = 0; i < tall.length; i++) {
    sum += tall[i];
}

console.log(sum);


var storst = tall[0];

for(var i = 0; i < tall.length; i++) {
    if(tall[i] > storst) {
        storst = tall[i];
    }
}
console.log(storst);


function summer(tallArray) {
    var sum = 0;

    for(var i = 0; i < tallArray.length; i++) {
        sum += tallArray[i];
    }

    return sum;
}

var mineTall = [1,2,6,12];
console.log(summer(mineTall));

console.log("_____");

//querySelectorAll()
//Lager en array med alle p-elementene
var avsnittEl = document.querySelectorAll("p");

//Legger til en lytter på hvert av p-elementene
for(var i = 0; i < avsnittEl.length; i++) {
    avsnittEl[i].addEventListener("click", byttKlasse);
}

//Hvis klassen er cornFlowerBlue, bytt til white, hvis ikke bytt til cornFlowerBlue
function byttKlasse(e) {
    if(e.target.className === "cornFlowerBlue") {
        e.target.className = "white";
    } else {
        e.target.className = "cornFlowerBlue";
    }
}


//Kalk
var innpakningEl = document.getElementById("innpakning");
var resultatEl = document.getElementById("resultat");

var antallFelter = 6;

for(var i = 0; i < antallFelter; i++) {
    var nyttTallFelt = document.createElement("input");
    nyttTallFelt.type = "number";
    nyttTallFelt.addEventListener("input", beregn);
    innpakningEl.appendChild(nyttTallFelt);
}

function beregn() {
    var tallFeltEl = document.querySelectorAll("input[type='number']");

    var sum = 0;

    for(var i = 0; i < tallFeltEl.length; i++) {
        sum += Number(tallFeltEl[i].value);
    }

    resultatEl.innerHTML = "Summen av tallene er: " + sum;
}

//Todimensjonale arrays
var retter = [
    ["laksetartar", "ertesuppe"],
    ["biff med rødvinssaus", "lammeskank"], 
    ["jordbæris", "eplekake"]
];

for(var i = 0; i < retter.length; i++) {
    for(var j = 0; j < retter[i].length; j++){
        console.log(retter[i][j]);
    }
}

console.log("_____");


//Sortere Arrays
var drikke = ["te", "vann", "kaffe", "Appelsinsaft"];
drikke.sort();
console.log(drikke);

var tall = [1, 4, 41, 82, 101, 14];
tall.sort();
console.log(tall);

tall.reverse();
console.log(tall);

function sammenlignTall(a, b) {
    return a - b;
}

tall.sort(sammenlignTall);
console.log(tall);

