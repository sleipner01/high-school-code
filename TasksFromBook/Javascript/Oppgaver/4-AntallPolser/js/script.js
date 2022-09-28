var barn = prompt("Antall barn")*1;

var polser = prompt("Antall pølser")*1;

var pto = polser % barn;

var pth = (polser - pto) / barn;

alert("Det blir "+ pth + " til hver og " + pto + " til overs.");