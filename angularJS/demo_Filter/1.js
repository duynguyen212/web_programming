 var app = angular.module('myApp',['ngMaterial']);
 app.controller('MyController',  function($scope){
 	$scope.depts = [
 		{
 			code: "01",
 			name: "Ain", 
 		},
 		{
 			code: "02",
 			name: "Aisne", 
 		},
 		{
 			code: "04",
 			name: "Alpes-de-haute-provence", 
 		},
 		{
 			code: "05",
 			name: "Hautes-Alpes", 
 		},
 		{
 			code: "06",
 			name: "Alpes-Maritimes", 
 		},
 		{
 			code: "94",
 			name: "Val-de-Marne", 
 		},
 		{
 			code: "95",
 			name: "Val-d'Oise", 
 		}
 	];

 	//$scope.editUserDisplay = false;

 	$scope.onEditUser = function(userObj) {
 		userObj.editUser = !userObj.editUser;
 	}
 })