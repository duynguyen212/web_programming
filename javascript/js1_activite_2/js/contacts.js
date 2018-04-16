/* 
Activité : gestion des contacts
*/

// TODO : complétez le programme
var choixMenu;
var nom;
var prenom;

var Contact = {
    //initialize le contact
    init: function (nom, prenom) {
        this.nom = nom;
        this.prenom = prenom;
    },

    //Renvoie la description le contact
    decrire: function () {
        var detailContact = "Nom: " + this.nom + ", prénom: " + this.prenom;
        return detailContact;
    }
};

//Initilize value
var contact1 = Object.create(Contact);
    contact1.init("NGUYEN", "Duy");

var contact2 = Object.create(Contact);
    contact2.init("NGUYEN", "Vy");

var nouveauContact = Object.create(Contact);

var contactLists = [];

contactLists.push(contact1);
contactLists.push(contact2); 

//ajouter un nouveau contact
function ajouterNouveau(nom, prenom) {
    nouveauContact.init(nom, prenom);
    contactLists.push(nouveauContact);
    console.log("Un nouveau contact a été ajouté!");
}

//afficher la liste des contacts
function afficherContact() { 
    contactLists.forEach(function(contactList){                
        console.log(contactList.decrire());
    });
}

//menu
function createMenu() {
    console.log("1 : Lister les contacts");
    console.log("2 : Ajouter un contact");
    console.log("0 : Quitter");  
}

console.log("Bienvenue dans le gestionnaire de contacts !");

createMenu();

while (choixMenu !== "0") {
    choixMenu  = prompt("Choisissez votre action (0 - 2): "); 

    switch (choixMenu) {
        case "1":
            console.log("Voici le contact");
           afficherContact();
            break;
        case "2":
            nom = prompt("Nom: ");
            prenom = prompt("Prénom: ");
            ajouterNouveau(nom, prenom);
            break;
    }

    if(choixMenu === "0") {
        console.log("Au revoir!");
    }
}

