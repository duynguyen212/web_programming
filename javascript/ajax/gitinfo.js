var divInfoElt = document.getElementById('info');
var formElt = document.querySelector('form');

formElt.addEventListener('submit', function(e) {
	e.preventDefault();
	var userText = formElt.elements.txtUserName.value;

	var urlAPI  = "https://api.github.com/users/" + userText;

	ajaxGet(urlAPI, function(response){
		var infoElt = JSON.parse(response);

		var userName = infoElt.name;
		var urlAvatar = infoElt.avatar_url;
		var hrefLink = infoElt.blog;

		var h1Elt = document.createElement("h1");
		h1Elt.textContent = userName;

		var imgElt = document.createElement("img");
		imgElt.style.width ="180px";
		imgElt.style.height = "180px";
		imgElt.src = urlAvatar;

		var pElt = document.createElement("p");

		var aElt = document.createElement("a");
		aElt.href = hrefLink;
		aElt.textContent = hrefLink;

		//supprimer les informations précédent profil
		divInfoElt.innerHTML = "";

		divInfoElt.appendChild(h1Elt);
		divInfoElt.appendChild(imgElt);
		pElt.appendChild(aElt);
		
		divInfoElt.appendChild(pElt);
	});
});
