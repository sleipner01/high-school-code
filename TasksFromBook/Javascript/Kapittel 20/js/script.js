"use strict";

class Dyr {
    constructor(navn, eier) {
        this.navn = navn;
        this.eier = eier;
    }

    sov() {
        return "sover";
    }

    spis() {
        return "spiser";
    }
}

var pluto = new Dyr("Pluto", "Mikke Mus");
var bjarne = new Dyr("Bjarne", "Pondus");

console.log(pluto.eier);
console.log(bjarne.navn);
console.log(pluto.spis());
console.log(pluto.sov())
console.log(pluto.navn + pluto.spis())

//20.3
class Hund extends Dyr {
    constructor(navn, eier) {
        super(navn, eier);
    }

    lyd() {
        return "Voff Voff";
    }
}

class Katt extends Dyr {
    constructor(navn, eier) {
        super(navn, eier);
    }

    lyd() {
        return "Mjauu";
    }
}

var idefix = new Hund("Idefix", "Obelix");

console.log(idefix.navn);
console.log(idefix.lyd());

var findus = new Katt("Findus", "Gubben Pettersen");

console.log(findus.eier);
console.log(findus.lyd());