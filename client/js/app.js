(function() {
    'use strict';

    angular
        .module('mainApp', ['ngRoute','duScroll'])
        .config(['$routeProvider','$locationProvider', function($routeProvider,$locationProvider) {
            $routeProvider
                .when('/', {
                    templateUrl: "/views/main.html",
                    controller: 'mainController',
                    controllerAs: 'mainApp'
                })
                .otherwise({
                    redirectTo: "/"
                });
            $locationProvider.html5Mode(true);
        }]);

})();