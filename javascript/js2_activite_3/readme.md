# Activité 3 - Utilisez un serveur web externe

<a href="http://duynguyen-dev.cf/js2_activite_3/html/lienweb.html" target="_blank">Live Demo</a>


<img src="https://i.imgur.com/I9Oauml.gif">



<ul>

<li>Les liens affichés sont récupérés depuis le serveur.</li>

<li>Le nouveau lien n’est affiché sur la page qu’en cas de succès de l’ajout sur le serveur.</li>

<li>Le formulaire d’ajout est remplacé par le bouton “Ajouter un lien” quel que soit le résultat de l’ajout sur le serveur.</li>

<li>Contrairement à l’activité 2, le rechargement de la page web affiche toujours le nouveau lien puisque celui-ci est sauvegardé sur le serveur.</li>

<li>Les communications avec le serveur utilisent les fonctions <strong>ajaxGet</strong> et <strong>ajaxPost</strong> définies dans le cours.</li>

<li>Les variables JavaScript doivent respecter la norme camelCase et le fichier <strong>liensweb.js</strong> doit être correctement indenté.</li>
</ul>
<p>
L’API de récupération des liens est https://oc-jswebsrv.herokuapp.com/api/liens. Elle renvoie les derniers liens ajoutés sous forme de tableau JSON.

L’API d’ajout d’un lien est https://oc-jswebsrv.herokuapp.com/api/lien. Elle attend un objet JSON représentant un lien.

Voici le format JSON d’un lien.</p>

<pre>
{

  “titre”: “titre du lien”,

  “url”: “URL du lien”,

  “auteur”: “auteur du lien”

}
</pre>