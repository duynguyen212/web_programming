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
var divButton = document.createElement('div');
var btnElt = document.createElement('button');
btnElt.textContent = "Ajouter un lien";

//divButton.appendChild(btnElt);

//document.body.insertBefore(divButton, contenuElt);
contenuElt.insertBefore(btnElt, divButton);

//create a form
var formElt = document.createElement('form');

//event click for button
btnElt.addEventListener('click', function(){
    btnElt.style.visibility = "hidden";
    
    var txtAuter = createInput("text", "txtAuter", "Entrez votre nom", "required", "120px", "");
    var txtTitre = createInput("text", "txtTitre", "Entrez votre titre", "required", "250px", "");
    var txtLien = createInput("text", "txtLien", "Entrez votre lien", "required", "250px", "");
    var btnAjouter = createInput("submit", "btnAjouter", "", "", "", "Ajouter");

    formElt.appendChild(txtAuter);
    formElt.appendChild(txtTitre);
    formElt.appendChild(txtLien);
    formElt.appendChild(btnAjouter);
});

//document.body.insertBefore(formElt, contenu);
contenuElt.insertBefore(formElt, btnElt);

//form event submit
formElt.addEventListener("submit", function(e){
    e.preventDefault();

    var auteurValeur = formElt.elements.txtAuter.value;
    var titreValeur = formElt.elements.txtTitre.value;
    var lienValeur = formElt.elements.txtLien.value;

    if(lienValeur.indexOf("http://")===-1 || lienValeur.indexOf("https://")===-1)
    {
        lienValeur = "http://" + lienValeur;
        console.log(lienValeur);
    }
    
    var nouveauLien = {
        titre : titreValeur,
        auteur: auteurValeur,
        url: lienValeur
    };

    var lienElt = createALink(nouveauLien);

    var pMessage = document.createElement("p");
    pMessage.style.color = "#fff";
    pMessage.style.background = "#0099ff";
    pMessage.style.padding = "20px";
    pMessage.textContent = "Lien " + titreValeur + " a été ajouté par " + auteurValeur;
    
    contenuElt.insertBefore(lienElt, contenuElt.firstChild);

    //contenuElt.replaceChild(pMessage, formElt); 
    
    formElt.style.visibility = "hidden";
    btnElt.style.visibility = "visible";
/*
    setTimeout(function(){
      contenuElt.removeChild(pMessage);
    },5000);
*/
    
});
