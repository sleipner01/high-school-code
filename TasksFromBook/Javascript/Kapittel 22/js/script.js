"use strict"
var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");

var taster = [];

window.addEventListener("keydown", knappNedOpp);
window.addEventListener("keyup", knappNedOpp);

function knappNedOpp(e) {
    if(e.type === "keydown") {
        taster[e.keyCode] = true;  
    } else if(e.type === "keyup") {
        delete taster[e.keyCode];
    }
}

class Spiller {
    constructor(x, y, bredde, hoyde, fart , oppTast, nedTast, farge) {
        this.x = x;
        this.y = y;
        this.bredde = bredde;
        this.hoyde = hoyde;
        this.fart = fart;
        this.oppTast = oppTast;
        this.nedTast = nedTast;
        this.farge = farge;
    }

    tegn() {
        ctx.beginPath();
        ctx.fillStyle = this.farge;
        ctx.fillRect(this.x, this.y, this.bredde, this.hoyde);
    }

    flytt() {
        this.y += this.fart;

        if(taster[this.oppTast]) {
            this.y -= 4;
            this.fart = -4;
        } else if(taster[this.nedTast]) {
            this.y += 4;
            this.fart = 4;
        } else {
            this.fart = 0;
        }

        if(this.y < 0) {
            this.y = 0;
        } else if(this.y + this.hoyde > canvas.height) {
            this.y = canvas.height - this.hoyde;
        }
    }
}

var spiller1 = new Spiller(50, canvas.height/2 - 50, 20, 100, 0, 87, 83, "white");
var spiller2 = new Spiller(canvas.width - 70, canvas.height/2 - 50, 20, 100, 0, 38, 40, "white");


class Ball {
    constructor(x, y, radius, xFart, yFart, farge) {
        this.x = x;
        this.y = y;
        this.radius = radius;
        this.xFart = xFart;
        this.yFart = yFart;
        this.farge = farge;
    }

    tegn() {
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
        ctx.fillStyle = this.farge;
        ctx.fill();
    }

    flytt(sp1, sp2) {
        this.x += this.xFart;
        this.y += this.yFart;

        var topp = this.y - this.radius;
        var bunn = this.y + this.radius;
        var venstre = this.x - this.radius;
        var hoyre = this.x + this.radius;

        //Treffer topp eller bunn
        if(topp < 0 || bunn > canvas.height) {
            this.yFart = -this.yFart;
        }

        //Teffer spiller 1
        if(venstre < sp1.x + sp1.bredde && topp < sp1.y + sp1.hoyde && bunn > sp1.y) {
            this.xFart = -this.xFart;

            if(sp1.fart !== 0) {
                this.yFart = sp1.fart;
            }
        }
        //Treffer spiller 2
        if(hoyre > sp2.x && topp < sp2.y + sp2.hoyde && bunn > sp2.y) {
            this.xFart = -this.xFart;

            if(sp2.fart !== 0) {
                this.yFart = sp2.fart;
            }
        }
        

        if(this.x < 0 || this.x > canvas.width) {
            this.x = 300;
            this.y = 200;
        }
    }
}

var ball = new Ball(300, 200, 10, 5, 0, "white");

function spill() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    spiller1.flytt();
    spiller1.tegn();
    spiller2.flytt();
    spiller2.tegn();

    ball.flytt(spiller1, spiller2);
    ball.tegn()

    requestAnimationFrame(spill);
}

requestAnimationFrame(spill);