/* 
Activité 1
*/

// Liste des liens Web à afficher. Un lien est défini par :
// - son titre
// - son URL
// - son auteur (la personne qui l'a publié)
var listeLiens = [
    {
        titre: "So Foot",
        url: "http://sofoot.com",
        auteur: "yann.usaille"
    },
    {
        titre: "Guide d'autodéfense numérique",
        url: "http://guide.boum.org",
        auteur: "paulochon"
    },
    {
        titre: "L'encyclopédie en ligne Wikipedia",
        url: "http://Wikipedia.org",
        auteur: "annie.zette"
    }
];

// TODO : compléter ce fichier pour ajouter les liens à la page web

var divElt = document.createElement("div");


listeLiens.forEach(function(listeLien){ 
    var pElt = document.createElement("p");
    
    var aElt = document.createElement("a");
    aElt.textContent = listeLien.titre;
    aElt.style.textDecoration = "none";
    aElt.style.fontWeight = "bold";
    aElt.style.fontSize = "20px";
    aElt.style.color = "#428bca";
    aElt.style.pointerEvents = "pointer";
    aElt.href = listeLien.url;

    var spanElt = document.createElement("span");
    spanElt.classList.add("span");
    spanElt.textContent = " " + listeLien.url;

    var hElt = document.createElement("h5");
    hElt.innerText = "Ajouté par " + listeLien.auteur;
    hElt.style.marginTop = 0;
    hElt.style.fontWeight = "normal";

    pElt.appendChild(aElt);
    pElt.appendChild(spanElt);  
    pElt.classList.add("lien");
    
    pElt.appendChild(hElt);
    divElt.appendChild(pElt);
    
});

document.getElementById("contenu").appendChild(divElt);
