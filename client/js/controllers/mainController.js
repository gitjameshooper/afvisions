(function() {
    'use strict';

    angular
        .module('mainApp')
        .controller('mainController', mainController);
    mainController.$inject = ['$scope', '$log','$document'];
      
    function mainController($scope, $log, $document) {
        var vm = this;
        // config
        vm.cfg = {};
        vm.showBtns = false;
         // functions
        vm.resizeDiv = resizeDiv;
            
        // console.log(angularModalService);


            window.onresize = function(event) {
            resizeDiv();
            }

            function resizeDiv() {
              var vpw = $(window).width();
              var vph = $(window).height();
              var logovph = vph/2.2;
            $('header').css({'height': vph + 'px'});
            $('.logo').css({'height': logovph + 'px'});
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