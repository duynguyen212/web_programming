//var app = angular.module('ngApp', []);
app.controller('getCountryandStateCtrl', function ($scope, locationService) {
    $scope.CountryID = null;
    $scope.StateID = null;
    $scope.CountryList = null;
    $scope.StateList = null;

    $scope.StateTextToShow = "Select your state";
    $scope.Result = '';

    //populate country
    locationService.getCountry().then(function (c) {
        $scope.CountryList = c.data;
    });

    //populate state
    $scope.getState = function () {
        $scope.StateID = null; //clear selected state if  any
        $scope.StateList = null;  //clear previously loaded state list
        $scope.StateTextToShow = "Loading...";

        console.log($scope.CountryID);

        locationService.getState($scope.CountryID).then(function (s) {
            $scope.StateList = s.data;
            $scope.StateTextToShow = "Select a state";
        }, function (e) {
            console.log("error");
        });

    };

    //function to show data into select list
    $scope.ShowStateIntoSelect = function () {
        $scope.Result = "Select Country ID: " + $scope.CountryID + "  State ID: " + $scope.StateID;
    };
});
    app.factory('locationService', function ($http) {
        var ft = {};

        ft.getCountry = function () {
            return $http.get('/Data/getListCountry');
        };

        ft.getState = function (countryID) {
            return $http.get('/Data/getStateByCountryID?countryID=' + countryID);
        };

        return ft;  
    });