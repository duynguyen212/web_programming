/* 
Activité : jeu de devinette
*/

// NE PAS MODIFIER OU SUPPRIMER LES LIGNES CI-DESSOUS
// COMPLETEZ LE PROGRAMME UNIQUEMENT APRES LE TODO

console.log("Bienvenue dans ce jeu de devinette !");

// Cette ligne génère aléatoirement un nombre entre 1 et 100
var solution = Math.floor(Math.random() * 100) + 1;

// Décommentez temporairement cette ligne pour mieux vérifier le programme
//console.log("(La solution est " + solution + ")");

// TODO : complétez le programme

var compteur = 0;

//console.log("Solution " + solution);

while (compteur <=6)
{
    var nombre = prompt("Entrez un nombre: ");
    
    if (nombre > solution)
    {
        console.log (nombre + " est trop grand");
        
    }
    else if (nombre < solution)
    {
        console.log (nombre + " est trop petit");
        
    }
    else
    {
        console.log (nombre + " Vous avez gagner! Après " + ++compteur + " essais");
        break;
    }
    compteur++;

    if (compteur == 6)
    {
        console.log ("Perdu! La solution est " + solution);
        break;
    }
}
 