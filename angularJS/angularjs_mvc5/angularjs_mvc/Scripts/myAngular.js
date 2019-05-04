var app = angular.module('myApp', []);
app.controller('homeCtrl', function ($scope) {
    $scope.Message = "This is a message from controller in AngularJS";
});

app.controller('dataCtrl', function ($scope, ContactService) {
    $scope.Contact = null;
    ContactService.getLastContact().then(function (dt) {
        // if success
        $scope.Contact = dt.data;
    }, function () {
        console.log("Failed to fetch data");
    });
});

app.controller('loginCtrl', function ($scope, LoginService) {
    $scope.isFormValid = false;
    $scope.isSubmitted = false;
    $scope.isLoggedIn = false;
    $scope.Message = '';

    $scope.loginData = {
        UserName: '',
        Password: ''
    };

    //check the form is validated or not, here fl is my FormName
    $scope.$watch('fl.$valid', function (newVal) {
        $scope.isFormValid = newVal;
    });

    $scope.Login = function () {
        $scope.isSubmitted = true;
        if ($scope.isFormValid) {
            LoginService.getLogin($scope.loginData).then(function (l) {
                if (l.data.UserName !== null) {
                    $scope.isLoggedIn = true;
                    $scope.Message = 'Login successfully. Welcome, ' + l.data.FullName;
                }
                else {
                    alert('Log in is failed');
                }
            });
        }
    };
});


app.factory('ContactService', function ($http) {
    var ft = {};

    ft.getLastContact = function () {
        return $http.get('/Data/GetLastContact');
    };

    return ft;
});


//Login service
app.factory('LoginService', function ($http) {
    var ft = {};

    ft.getLogin = function (l) {
        return $http({
            url: '/Data/UserLogin',
            method: 'POST',
            data: JSON.stringify(l),
            headers: {'content-type':'application/json'}
        });
    };

    return ft;
});

// Employee Controller 
app.controller('empCtrl', function ($scope, empService) {
    $scope.Employees = null;
    empService.getEmployeeList().then(function (e) {
        //success
        $scope.Employees = e.data;
    }, function () {
        //failed
        console.log("failed");
    }); 
});

//employee service
app.factory('empService', function ( $http) {
    var ft = {};

    ft.getEmployeeList = function () {
        return $http.get('/Data/getEmployeeList');
    };

    return ft;
});

/* app.controller('getCountryandStateCtrl', function ($scope, locationService) {
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
}); */

    /*app.factory('locationService', function ($http) {
        var ft = {};

        ft.getCountry = function () {
            return $http.get('/Data/getListCountry');
        };

        ft.getState = function (countryID) {
            return $http.get('/Data/getStateByCountryID?countryID=' + countryID);
        };

        return ft;  
    });*/