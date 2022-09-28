"use strict";

var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");

var knapper = [];

window.addEventListener("keydown", mottaTaster);
window.addEventListener("keyup", mottaTaster);

function mottaTaster(e) {
    if(e.type === "keydown") {
        knapper[e.keyCode] = true;
    } else {
        knapper[e.keyCode] = false;
    }
}

function finnAvstand(obj1, obj2) {
    var xAvstand2 = Math.pow(obj1.x - obj2.x, 2);
    var yAvstand2 = Math.pow(obj1.y - obj2.y, 2);
    var avstand = Math.sqrt(xAvstand2 + yAvstand2);
    return avstand;
}

var animasjonId;

function animer() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    hinder.flytt();
    hinder.tegn();

    spiller.flytt();
    spiller.tegn();

    if(finnAvstand(hinder, spiller) < 30) {
        cancelAnimationFrame(animasjonId);
    } else {
        animasjonId = requestAnimationFrame(animer);
    }
}

animasjonId = requestAnimationFrame(animer);

class Sirkel {
    constructor(x, y, farge) {
        this.x = x;
        this.y = y;
        this.farge = farge;
    }

    tegn() {
        ctx.beginPath();
        ctx.arc(this.x, this.y, 15, 0, Math.PI * 2);
        ctx.strokeStyle = "#000000";
        ctx.lineWidth = 5;
        ctx.stroke();
        ctx.fillStyle = this.farge;
        ctx.fill();
        ctx.closePath();
    }
}

class Hinder extends Sirkel {
    constructor(x, y, farge, fart) {
        super(x, y, farge);
        this.xFart = fart;
        this.yFart = fart;
    }

    flytt() {
        this.x += this.xFart;
        this.y += this.yFart;

        if(this.x - 15 < 0 || this.x + 15 > canvas.width) {
            this.xFart = -this.xFart;
        }

        if(this.y - 15 < 0 || this.y + 15 > canvas.height) {
            this.yFart = -this.yFart;
        }
    }
}

class Spiller extends Sirkel {
    constructor(x, y, farge, fart) {
        super(x, y, farge);
        this.fart = fart; 
    }

    flytt() {
        if(knapper[37]) { spiller.x -= spiller.fart; }
        if(knapper[39]) { spiller.x += spiller.fart; }
        if(knapper[38]) { spiller.y -= spiller.fart; }
        if(knapper[40]) { spiller.y += spiller.fart; }

        if(this.x - 15 < 0) {
            this.x = this.x + 15;
        } else if(this.x + 15 > canvas.width) {
            this.x = this.x - 15;
        } else if(this.y - 15 < 0) {
            this.y = this.y + 15;
        } else if(this.y + 15 > canvas.height) {
            this.y = this.y - 15;
        }
    }
}

var spiller = new Spiller(canvas.width/2, canvas.height/2 - 50, "orange", 5);
var hinder = new Hinder( canvas.width/2, canvas.height/2, "red", 10);