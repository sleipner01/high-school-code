//Objekter
var land = {
    navn: "Norge",
    hovedstad: "Oslo",
    myntenhet: "NOK",
    storsteByer: ["Oslo", "Bergen", "Stavanger/Sandnes"]
}

console.log(land.navn);
console.log(land["navn"]);

console.log(land.storsteByer);
console.log(land.storsteByer[0]);
console.log(land["storsteByer"][2]);

console.log(land);

for(var egenskap in land) {
    console.log(egenskap);
    console.log(land[egenskap]);
}

//Redigere innhold
var person = {
    navn: "Ola",
    adresse: "Storgata 12"
}

person.adresse = "Kirkeveien 72";
person["adresse"] = "Kirkeveien 72";

person.favorittfarge = "rosa";

console.log(person);

delete person.favorittfarge;
console.log(person);

console.log("______");

//12.2
var person = {
    navn: "Ola",
    etternavn: "Hansen",
    adresse: "Storgata 12",

    fulltNavn: function() {
        return this.navn + " " + this.etternavn;
    }
}

console.log(person.fulltNavn());

console.log("_____");

//12.3
var person1 = {navn: "Ola", fodselsaar: 2014};
var person2 = {navn: "Emma", fodselsaar: 2010};
var person3 = {navn: "Byrkj", fodselsaar: 2004};

var personer = [person1, person2, person3];

console.log(personer[0]);

var personer = [
    {navn: "Ola", fodselsaar: 2014},
    {navn: "Emma", fodselsaar: 2010},
    {navn: "Byrkj", fodselsaar: 2004}
];

console.log(personer[0]);
console.log(personer[1].navn);

for(i = 0; i < personer.length; i++) {
    console.log(personer[i].navn + " ble født i " + personer[i].fodselsaar + ".");
}

console.log("_____");


var personer = [
    {fornavn: "Lisa", etternavn: "Simpson"},
    {fornavn: "Peter", etternavn: "Griffin"},
    {fornavn: "Eric", etternavn: "Cartman"}
];

function sammenlignEtternavn(a, b) {
    if(a.etternavn > b.etternavn) {
        return 1;
    } else if (a.etternavn < b.etternavn) {
        return -1;
    } else {
        return 0;
    }
}

console.log(personer.sort(sammenlignEtternavn));

console.log("_____");


var innpakningEl = document.getElementsByClassName("innpakning");

var personer = [
    {navn: "Ola", fodselsaar: 2014},
    {navn: "Emma", fodselsaar: 2010},
    {navn: "Byrkj", fodselsaar: 2004}
];

var tableEl = document.createElement("table");
var tbodyEl = document.createElement("tbody");
var overskrifter = "<tr>";
    overskrifter += "<th>Navn</th>";
    overskrifter += "<th>Fødselsår</th>";
    overskrifter += "</tr>";

tbodyEl.innerHTML += overskrifter;

for(var i = 0; i < personer.length; i++) {
    var rad = "<tr>";
        rad += "<td>" + personer[i].navn + "</td>";
        rad += "<td>" + personer[i].fodselsaar + "</td>";
        rad += "</tr>";

    tbodyEl.innerHTML += rad;
}

tableEl.appendChild(tbodyEl);
innpakningEl[0].appendChild(tableEl);

console.log("_____");

//12.4
var quizEl = document.createElement("h1");
    quizEl.innerHTML = "Quiz";
innpakningEl[0].appendChild(quizEl);

var resultatEl = document.createElement("p");
    resultatEl.setAttribute("id", "resultat");
    resultatEl.innerHTML = "Klikk på det du tror er riktig!";
    innpakningEl[0].appendChild(resultatEl);

var quiz = [
    { sporsmaal: "Hva heter Norges hovedstad?",
      alternativer: ["Oslo", "Stockholm", "København"],
      fasit: ["Riktig", "Galt", "Galt"]},
    { sporsmaal: "Hvilke byer ligger i Europa?",
      alternativer: ["Oslo", "New York", "London"],
      fasit: ["Riktig", "Galt", "Riktig"]},
    { sporsmaal: "Hvilken innsjø er Norges største?",
      alternativer: ["Røssvatnet", "Mjøsa", "Femunden"],
      fasit: ["Galt", "Riktig", "Galt"]}
];

for(var i = 0; i < quiz.length; i++) {
    var sporsmaalEl = document.createElement("div");

    sporsmaalEl.innerHTML += "<h3>" + quiz[i].sporsmaal + "</h3>";

    for(var j = 0; j < quiz[i].alternativer.length; j++) {
        var nyCheckbox = document.createElement("input");
            nyCheckbox.type = "checkbox";
            nyCheckbox.value = quiz[i].fasit[j];
            sporsmaalEl.appendChild(nyCheckbox);
            sporsmaalEl.innerHTML += quiz[i].alternativer[j] + "<br>";
    }
    innpakningEl[0].appendChild(sporsmaalEl);
}

var knapp = document.createElement("button");
    knapp.innerHTML = "Sjekk svar";
    knapp.addEventListener("click", finnPoeng);
    innpakningEl[0].appendChild(knapp);

    function finnPoeng() {
        var alleCheckboxEl = document.querySelectorAll("input[type='checkbox']");

        var antallPoeng = 0;

        for(var i = 0; i < alleCheckboxEl.length; i++) {
            if(alleCheckboxEl[i].checked) {
                if(alleCheckboxEl[i].value === "Riktig") {
                    antallPoeng++;
                } else {
                    antallPoeng--;
                }
            }
        }
        resultatEl.innerHTML = "Du fikk " + antallPoeng + " poeng!";
        console.log(antallPoeng);
    }
