//7.2
var graEl = document.querySelector(".gra");
console.log(graEl);

var scotchEl = document.querySelector("#scotch");
console.log(scotchEl);

/*Andre attributter:
getElementById();
getElementsByClassName();
getElementsByTagName();
*/

//7.3
var overskriftEl = document.querySelector("h1");
overskriftEl.innerHTML = "Scotch";


var bodyEl = document.querySelector("body");

var table = "";

table += "<table>";
table += "<tr>";
table += "<th> Overskrift 1 </th>";
table += "<th> Overskrift 2 </th>";
table += "</tr>";
table += "<tr>";
table += "<td> Innhold 1 </td>";
table += "<td> Innhold 2 </td>";
table += "</tr>";
table += "</table>";

bodyEl.innerHTML += table;


bodyEl.innerHTML += "<p id='avsnitt'>Cornflowerblue er fortsatt best</p>";
bodyEl.innerHTML += "<p id='himym'>Himym er min favorittserie!</p>";

var avsnittEl = document.getElementById("avsnitt");
avsnittEl.setAttribute("id", "avsnitt2");

console.log(avsnittEl.style);
avsnittEl.style.backgroundColor = "blue";

//7.4
var elementAvsnittEl = document.createElement("p");

elementAvsnittEl.innerHTML = "Dette er bruk av 'createElement'";
elementAvsnittEl.setAttribute = "createElement";

bodyEl.appendChild(elementAvsnittEl);



var avsnitt2El = document.createElement("p");

avsnitt2El.innerHTML = "Se 'Barneys video resume' ";
avsnitt2El.setAttribute = "link";

bodyEl.appendChild(avsnitt2El);

var linkEl = document.createElement("a");
linkEl.innerHTML = "her";
linkEl.href = "http://barneysvideoresume.com/";
linkEl.target = "_blank";

avsnitt2El.appendChild(linkEl);

avsnitt2El.innerHTML += ".";