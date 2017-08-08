(function () {
	var app = angular.module('store', []);

	app.controller('TableCtrl', function ($scope) {
		var cols =[];
  		var data= [];

  		for (var i = 0; i <1; i++) {
  			cols.push ("Colone " + (i+1));
  			var rowData = [];
  			for (var j = 0; j <1; j++) {
  				rowData.push("Entete " + (j+1));
  			}
  			data.push(rowData);
  		}

  		  $scope.colCount = 3;

  		  $scope.cols = cols;
  		  $scope.data = data;

  		  $scope.addColumn = function (type) {
  		  	if (type === '+'){
  		  		$scope.colCount++;
  		  	} else {
  		  		$scope.colCount--;
  		  	}

  		  }
	});
})();





	