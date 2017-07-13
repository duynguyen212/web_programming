var motElt = document.getElementById("mots");

function afficherLexique(lettre) {
	ajaxGET("https://oc-jswebsrv.herokuapp.com/api/lexique/" + lettre, function(response){
		var mots = JSON.parse(response);

		if (mots.length > 0) {
			motElt.innerHTML = "";

			mots.forEach(function(mot) {

				var h3Elt = document.createElement("h3");
				h3Elt.textContent = mot.term;

				var pElt = document.createElement("p");
				pElt.textContent = mot.definition;
				

				motElt.appendChild(h3Elt);
				motElt.appendChild(pElt);
			});
		} else {
			motElt.innerHTML = "";

			var divElt = document.createElement("div");
			divElt.textContent = "Aucun mot trouvé pour " + lettre;
			divElt.style.paddingTop = '10px';
			divElt.style.fontSize = 'x-large';
			
			motElt.appendChild(divElt);
		}
	});
}

//create menu
var lettreElt = document.getElementById("lettres");

var lettres = ["A", "B", "C", "D", "E"];

lettres.forEach( function(lettre) {
	var aElt = document.createElement("a")
	aElt.textContent = lettre;
	aElt.href = "#";

	aElt.addEventListener("click", function(){
		afficherLexique(lettre);
	});

	lettreElt.appendChild(aElt);
	lettreElt.appendChild(document.createTextNode(" | "));
});

lettreElt.append(document.createTextNode("..."))
