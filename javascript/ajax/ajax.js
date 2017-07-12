function ajaxGet (url, callback) {
	var req = new XMLHttpRequest();

	req.open ("GET", url);

	req.addEventListener ("load", function (){
		if (req.status >= 200 && req.status < 400) {
			callback(req.responseText);
		} else {
			console.log(req.status + " " + req.statusText);
		}
	});
	
	req.addEventListener("error", function(){
		console.log("Erreur réseau avec l'URL " + url);
	});	

	req.send(null);
}


