/* 
Activité 1
*/

// Liste des liens Web à afficher. Un lien est défini par :
// - son titre
// - son URL
// - son auteur (la personne qui l'a publié)
document.querySelector("h1").innerText = "Activité 2"

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
var contenuElt = document.getElementById("contenu");

function createALink (link)
{
    var pElt = document.createElement("p");
    
    var aElt = document.createElement("a");
    aElt.textContent = link.titre;
    aElt.style.textDecoration = "none";
    aElt.style.fontWeight = "bold";
    aElt.style.fontSize = "20px";
    aElt.style.color = "#428bca";
    aElt.style.pointerEvents = "pointer";
    aElt.href = link.url;

    var spanElt = document.createElement("span");
    spanElt.classList.add("span");
    spanElt.textContent = " " + link.url;

    var hElt = document.createElement("h5");
    hElt.innerText = "Ajouté par " + link.auteur;
    hElt.style.marginTop = 0;
    hElt.style.fontWeight = "normal";

    pElt.appendChild(aElt);
    pElt.appendChild(spanElt);  
    pElt.classList.add("lien");
    
    pElt.appendChild(hElt);

    return pElt;
}

listeLiens.forEach(function(listeLien){ 
    var lienElt = createALink(listeLien);
    contenuElt.appendChild(lienElt);
});

/* ACTIVITE 2 */ 

//create an input 
function createInput(type, name, placeholder, required, width, value)
{
    var inputElt = document.createElement('input');
    inputElt.setAttribute('type', type);
    inputElt.setAttribute('name', name);
    inputElt.setAttribute('placeholder', placeholder);
    inputElt.setAttribute('required', required);
    inputElt.setAttribute('value', value);
    inputElt.style.width = width;
    inputElt.style.marginRight = "10px";

    return inputElt;
}

//create a button 
var divElt = document.createElement("div");
var btnElt = document.createElement('button');
btnElt.textContent = "Ajouter un lien";
divElt.appendChild(btnElt);

document.body.insertBefore(divElt, contenuElt);

//event click of button
btnElt.addEventListener('click', function(){
    //create a form
    var formElt = document.createElement('form');    
    document.body.replaceChild(formElt, divElt);
    
    var txtAuter = createInput("text", "txtAuter", "Entrez votre nom", "required", "120px", "");
    var txtTitre = createInput("text", "txtTitre", "Entrez votre titre", "required", "250px", "");
    var txtLien = createInput("text", "txtLien", "Entrez votre lien", "required", "250px", "");
    var btnAjouter = createInput("submit", "btnAjouter", "", "", "", "Ajouter");

    formElt.appendChild(txtAuter);
    formElt.appendChild(txtTitre);
    formElt.appendChild(txtLien);
    formElt.appendChild(btnAjouter);

    formElt.addEventListener("submit", function(e){
        e.preventDefault();
        //document.body.removeChild(formElt);
        document.body.replaceChild(divElt,formElt);

        var auteurValeur = formElt.elements.txtAuter.value;
        var titreValeur = formElt.elements.txtTitre.value;
        var lienValeur = formElt.elements.txtLien.value;

        if(lienValeur.indexOf("http://")===-1 || lienValeur.indexOf("https://")===-1)
        {
            lienValeur = "http://" + lienValeur;
        }
        
        var nouveauLien = {
            titre : titreValeur,
            auteur: auteurValeur,
            url: lienValeur
        };

        var pMessage = document.createElement("p");
        pMessage.style.color = "#fff";
        pMessage.style.background = "#0099ff";
        pMessage.style.padding = "20px";
        pMessage.textContent = "Lien " + titreValeur + " a été ajouté par " + auteurValeur;

        document.body.insertBefore(pMessage,divElt);

        setTimeout(function(){
            document.body.removeChild(pMessage);
        }, 5000);

        var lienElt = createALink(nouveauLien);
  
        contenuElt.insertBefore(lienElt, contenuElt.firstChild);
    });
});

