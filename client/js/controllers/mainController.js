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
        // console.log(angularModalService);
        console.log(duScroll);
            var container = angular.element(document.getElementById('about'));
           
            $scope.toTheTop = function() {
                 container.scrollTop(0, 5000);
            }
            console.log('hey');

            window.onresize = function(event) {
            resizeDiv();
            }

            function resizeDiv() {
              var vpw = $(window).width();
              var vph = $(window).height();
            $('header').css({'height': vph + 'px'});
            }
            resizeDiv();
        // $scope.show = function() {
        //     ModalService.showModal({
        //         templateUrl: '/views/partials/modal.html',
        //         controller: "ModalController"
        //     }).then(function(modal) {
        //         modal.element.modal();
        //         modal.close.then(function(result) {
        //             $scope.message = "You said " + result;
        //         });
        //     });
        // };
         
    }  
})();