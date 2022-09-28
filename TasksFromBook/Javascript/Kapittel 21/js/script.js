"use strict"
/*
function animer() {
    //Kode som flytter på ting og tegner dem

    requestAnimationFrame(animer);
}

requestAnimationFrame(animer);
*/

var divEl = document.getElementsByTagName("div");
var rotasjon = 0;
var fart = 1;

function animerFirkant() {
    rotasjon += fart;

    divEl[0].style.transform = "rotate(" + rotasjon + "deg)";

    requestAnimationFrame(animerFirkant);
}

requestAnimationFrame(animerFirkant);


//21.2 21.3 21.4
var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");

var animasjonId;
var avslutt = false;

class Ball {
    constructor(x, y, r, xFart, yFart, id) {
        this.x = x;
        this.y = y;
        this.r = r;
        this.xFart = xFart;
        this.yFart = yFart;
        this.id = id;
    }

    tegn() {
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.r, 0, Math.PI * 2);
        ctx.strokeStyle = "black";
        ctx.lineWidth = 5;
        ctx.stroke();
        ctx.fillstyle = "orange";
        ctx.fill();
        ctx.closePath();
    }

    flytt() {
        this.x += this.xFart;
        this.y += this.yFart;

        if(this.x - this.r < 0) {
            this.xFart = -this.xFart;
            this.x = this.r
        } else if(this.x + this.r > canvas.width) {
            this.xFart = -this.xFart;
            this.x = canvas.width - this.r;
        }

        if(this.y - this.r < 0) {
            this.yFart = -this.yFart;
            this.y = this.r
        } else if(this.y + this.r > canvas.height) {
            this.yFart = -this.yFart;
            this.y = canvas.height - this.r;
        }
    }

    finnAvstand() {
            for(var j = 0; j < baller.length; j++) {
                if(this.id != baller[j].id) {
                    var xAvstand2 = Math.pow(this.x - baller[j].x, 2);
                    var yAvstand2 = Math.pow(this.y - baller[j].y, 2);
                    var avstand = Math.sqrt(xAvstand2 + yAvstand2);
                    
                    if(avstand < this.r + baller[j].r) {
                        if(this.r > baller[j].r) {
                            this.r = Math.sqrt(Math.pow(this.r, 2) + Math.pow(baller[j].r, 2));
                            baller.splice(j, 1);
                            /*baller[j].r = 0;*/
                            console.log(baller.length + " baller er igjen");
                        } else if(this.r === baller[j].r) {
                            var tilfeldig = Math.floor(Math.random() * 2);
                            if(tilfeldig === 0) {
                                this.r = Math.sqrt(Math.pow(this.r, 2) + Math.pow(baller[j].r, 2));
                                baller.splice(j, 1);
                            } else {
                                baller[j].r = Math.sqrt(Math.pow(baller[j].r, 2) + Math.pow(this.r, 2));
                                baller.splice(this.id, 1);
                            }                            
                          } else {
                            baller[j].r = Math.sqrt(Math.pow(baller[j].r, 2) + Math.pow(this.r, 2));
                            baller.splice(this.id, 1);
                            /*this.r = 0;*/
                            console.log(baller.length + " baller er igjen");
                        }
                    }
                }
            }    
    }
}

var baller = [];
var antallBaller = 10;

for(var i = 0; i < antallBaller; i++) {
    var xPos = Math.floor(Math.random() * canvas.width);
    var yPos = Math.floor(Math.random() * canvas.height);
    var radius = Math.floor(Math.random() * 20);
    var xFart = Math.floor(Math.random() * 5 + 1);
    var yFart = Math.floor(Math.random() * 5 + 1);
    var id = i;

    var ball = new Ball(xPos, yPos, radius, xFart, yFart, id);

    baller.push(ball);
}

function animer() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    for(var i = 0; i < baller.length; i++) {
        baller[i].flytt();
        baller[i].tegn();
        baller[i].finnAvstand();
    }

    if(baller.length === 1) {
        avslutt = true;
    }

    if(avslutt) {
        cancelAnimationFrame(animasjonId);
    } else {
        animasjonId = requestAnimationFrame(animer);
    }
}

animasjonId = requestAnimationFrame(animer);