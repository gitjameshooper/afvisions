(function() {
    'use strict';

    angular
        .module('mainApp')
        .controller('modalController', modalController);
    modalController.$inject = ['$scope', '$log'];
     
    function modalController($scope, $log) {
        var vm = this;
        // config
        vm.cfg = {};
       $scope.close = function(result) {
               close(result, 500); // close, but give 500ms for bootstrap to animate
            };
    }  
})();