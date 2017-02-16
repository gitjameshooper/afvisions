(function() {
    'use strict';

    angular
        .module('mainApp', ['ngRoute'])
        .config(['$routeProvider', function($routeProvider) {
            $routeProvider
                .when('/', {
                    templateUrl: "/views/main.html",
                    controller: 'mainController',
                    controllerAs: 'mainApp'
                })
                .otherwise({
                    redirectTo: "/"
                });
        }]);

})();