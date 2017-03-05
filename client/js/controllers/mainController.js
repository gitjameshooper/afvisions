(function() {
    'use strict';

    angular
        .module('mainApp')
        .controller('mainController', mainController);
    mainController.$inject = ['$scope', '$log', '$http', '$document'];

    function mainController($scope, $log, $http, $document) {
        var vm = this;
        // config
        vm.cfg = {};
        vm.showBtns = false;
        // functions
        vm.resizeDiv = resizeDiv;
        vm.sendEmail = sendEmail;




        // console.log(angularModalService);

        function sendEmail(form) {
            console.log(form);
            // Trigger validation flag.
            vm.submittedEmail = true;

            // // If form is invalid, return and let AngularJS show validation errors.
            if (form.$invalid) {
                return;
            }


            $.ajax({
                type: "POST",
                url: "/php/email.php",
                data: $('#contact-form').serialize(),
                success: function() {
                    form.name = null;
                    form.email = null;
                    $('.success').fadeIn(2000, function() {
                        $('.success').fadeOut(4000);
                    });
                },
                error: function() {
                    $('.no-success').fadeIn(2000, function() {
                        $('.no-success').fadeOut(4000);
                    });
                }
            });


        }
        $('.btn-open-modal').click(function() {
            $('#portfolio-modal').modal({
                keyboard: false
            });
        });

        window.onresize = function(event) {
            resizeDiv();
        }

        function resizeDiv() {
            var vpw = $(window).width();
            var vph = $(window).height();
            var logovph = vph / 2.2;
            $('header').css({ 'height': vph + 'px' });
            $('.logo').css({ 'height': logovph + 'px' });
        }
        resizeDiv();


    }
})();
