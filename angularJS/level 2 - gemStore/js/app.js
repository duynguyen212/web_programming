(function (){
	var app = angular.module('store', []);

	// main controller
	app.controller('StoreController', function(){
		this.products = gems;
	});

	//data
	var gems = [
		{
			name: 'Dodecahedron',
			price: 110.95,
			description: 'Some gems have hidden qualities beyond their luster, beyond', 
			canPurchase: true,
			soldOut: true, 
			images: "http://mathworld.wolfram.com/images/eps-gif/DodecahedronIcosahedron_700.gif"
		}, 

		{
			name: 'Pentagon Gem',
			price: 115.95,
			description: 'Some gems have hidden qualities beyond their luster, beyond', 
			canPurchase: false,
			soldOut: false, 
			images: "http://image3.fmgstatic.com/images/p4994fxb.jpg"
		}		
	]
})();

