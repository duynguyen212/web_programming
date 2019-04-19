 var app = angular.module('myApp',['ngMaterial']);
 app.controller('MyController',  function($scope){
 	$scope.users = [
 		{
 			name: "Lionel Messi", 
 			yearofbirth: "1988",
 			facebook: "fb.com/lionelmessi"
 		},
 		{
 			name: "Cristiano Ronaldo", 
 			yearofbirth: "1986",
 			facebook: "fb.com/cr7"
 		},
 		{
 			name: "Kylian Mbappe", 
 			yearofbirth: "2001",
 			facebook: "fb.com/k10"
 		},
 		{
 			name: "Noname", 
 			yearofbirth: "1988",
 			facebook: "fb.com/nameno"
 		}
 	];

 	//$scope.editUserDisplay = false;

 	$scope.onEditUser = function(userObj) {
 		userObj.editUser = !userObj.editUser;
 	}
 })