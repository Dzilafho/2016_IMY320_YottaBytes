'use strict';

var myApp = angular.module('loginForm', []);

myApp.controller('loginController', ["$scope", "$window", "$http", function($scope, $window, $http) {

    $scope.submitFunction = function() {

        var username = $scope.userName;
        var password = $scope.password;
       
        

        //Try to log in to account
        $http({
            method: 'POST',
            url: 'webresources/login',
            data: {username:username ,password: password},
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response) {
          
               $window.alert(response);

            }).
            error(function(response) {
                $window.alert("Wrong username/password. Please try again");
            });
            
    };
    
}]);