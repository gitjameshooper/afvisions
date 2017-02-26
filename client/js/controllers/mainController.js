(function() {
    'use strict';

    angular
        .module('mainApp')
        .controller('mainController', mainController);
    mainController.$inject = ['$scope', '$log','$document', 'ModalService'];
      
    function mainController($scope, $log, $document, ModalService) {
        var vm = this;
        // config
        vm.cfg = {};
        vm.showBtns = false;
         // functions
        vm.resizeDiv = resizeDiv;
        vm.showModal = showModal;
            
        // console.log(angularModalService);


        function showModal(){
             // Just provide a template url, a controller and call 'showModal'.
                ModalService.showModal({
                  templateUrl: "/views/partials/modal.html",
                  controller: "modalController"
                }).then(function(modal) {
                  // The modal object has the element built, if this is a bootstrap modal
                  // you can call 'modal' to show it, if it's a custom modal just show or hide
                  // it as you need to.
                  
                  
                  modal.element.modal();
                   modal.close.then(function(result) {
                        $scope.message = "You said " + result;
                    });
                  
                });
        }

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
 
   

   

 
 