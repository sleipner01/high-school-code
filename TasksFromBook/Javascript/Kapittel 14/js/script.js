var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");

ctx.fillRect(50, 50, 200, 100);
ctx.fillStyle = "red";
ctx.strokeStyle = "green";
ctx.lineWidth = 3;
ctx.fillRect(100, 100, 200, 100);
ctx.strokeRect(100, 100, 200, 100);
ctx.clearRect(75, 75, 150, 50);


var canvas2 = document.getElementById("canvas2");
var ctx = canvas2.getContext("2d");
var knapp = document.getElementById("knapp");
knapp.addEventListener("click", tilfeldigeRektangler);

var antall = 20;

function tilfeldigeRektangler() {
    for(var i = 0; i < antall; i++) {   
        var xKoordinat = Math.random() * canvas2.width;
        var yKoordinat = Math.random() * canvas2.height;

        ctx.fillStyle = "hsl(" + i * 30 + ", 100%, 70%)";
        ctx.fillRect(xKoordinat, yKoordinat, 50, 50);
    }
}

var canvas3 = document.getElementById("canvas3");
var ctx3 = canvas3.getContext("2d");

ctx3.beginPath();
ctx3.moveTo(100, 50);
ctx3.lineTo(100, 250);
ctx3.moveTo(200,50);
ctx3.lineTo(200,250);

ctx3.strokeStyle = "red";
ctx3.stroke();


ctx3.beginPath();
ctx3.moveTo(250, 50);
ctx3.lineTo(250, 250);
ctx3.lineTo(400, 250);

ctx3.strokeStyle = "blue";
ctx3.stroke();


ctx3.beginPath();
ctx3.moveTo(300, 50);
ctx3.lineTo(300, 200);
ctx3.lineTo(450, 200);
ctx3.closePath();

ctx3.strokeStyle = "green";
ctx3.stroke();


var canvas4 = document.getElementById("canvas4");
var ctx4 = canvas4.getContext("2d");

for(var x = 0; x < canvas4.width; x += 20) {
    ctx4.moveTo(x, 0);
    ctx4.lineTo(x, canvas.height);
}

ctx4.strokeStyle = "#323232";
ctx4.stroke();


var canvas5 = document.getElementById("canvas5");
var ctx5 = canvas5.getContext("2d");

ctx5.arc(canvas5.width / 2, canvas5.height / 2, 100, 0, Math.PI * 2);
ctx5.fillStyle = "red";
ctx5.fill();


var canvas6 = document.getElementById("canvas6");
var ctx6 = canvas6.getContext("2d");

var x = canvas6.width / 2;
var y = canvas6.height / 2;

ctx6.arc(x, y, 100, 0, Math.PI / 3);
ctx6.lineTo(x, y);
ctx6.fillStyle = "red";
ctx6.fill();

ctx6.beginPath();
ctx6.arc(x, y, 100, Math.PI / 3, Math.PI);
ctx6.lineTo(x, y);
ctx6.fillStyle = "blue";
ctx6.fill();

ctx6.beginPath();
ctx6.arc(x, y, 100, Math.PI, Math.PI * 2);
ctx6.lineTo(x, y);
ctx6.fillStyle = "green";
ctx6.fill();

//14.3
var canvas7 = document.getElementById("canvas7");
var ctx7 = canvas7.getContext("2d");

ctx7.font = "20px 'Century Gothic'";
ctx7.fillStyle = "red";
ctx7.textAlign = "start";
ctx7.fillText("hei", canvas7.width / 2, canvas7.height / 3);
ctx7.strokeStyle = "red";
ctx7.strokeText("hei", canvas7.width / 2 + 40, canvas7.height / 2);
ctx7.textAlign = "center";
ctx7.fillText("hei", canvas7.width / 2, canvas7.height / 2);
ctx7.textAlign = "end";
ctx7.fillText("hei", canvas7.width / 2, canvas7.height * 2/3);
ctx7.moveTo(canvas7.width / 2, 0);
ctx7.lineTo(canvas7.width / 2, canvas7.height);
ctx7.strokeStyle = "black";
ctx7.stroke();

//14.4
var canvas8 = document.getElementById("canvas8");
var ctx8 = canvas8.getContext("2d");

var data = [
    {beskrivelse: "Mandag", verdi: 5},
    {beskrivelse: "Tirsdag", verdi: 3},
    {beskrivelse: "Onsdag", verdi: 1},
    {beskrivelse: "Torsdag", verdi: 2},
    {beskrivelse: "Fredag", verdi: 5},
    {beskrivelse: "Lørdag", verdi: 6},
    {beskrivelse: "Søndag", verdi: 4}
];

var tekstBredde = 200;

var totalBredde = canvas8.width;

var soyleBredde = totalBredde - tekstBredde - 10;

canvas.height = data.length * 30;


var max = 0;

for(var i = 0; i < data.length; i++) {
    if(data[i].verdi > max) {
        max = data[i].verdi;
    }
}

ctx8.font = "24px 'Century Gothic";
ctx8.textAlign = "end";
ctx8.textBaseline = "hanging";

for(var i = 0; i < data.length; i++) {
    var andel = (data[i].verdi / max) * soyleBredde;

    ctx8.fillStyle = "#323232";

    ctx8.fillText(data[i].beskrivelse + "(" + data[i].verdi + ")", tekstBredde, (30 * i) + 3);

    ctx8.fillStyle = "hsl(" + i * 30 + ", 100%, 70%)";

    ctx8.fillRect(tekstBredde + 5, (30 * i) + 3, andel, 24);
}