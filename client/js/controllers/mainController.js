(function() {
    'use strict';

    angular
        .module('mainApp')
        .controller('mainController', mainController);
    mainController.$inject = ['$scope', '$log'];
     
    function mainController($scope, $log) {
        var vm = this;
        // config
        vm.cfg = {};
         
    }
})();