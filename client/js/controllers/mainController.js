(function() {
    'use strict';

    angular
        .module('mainApp')
        .controller('mainController', mainController);
    mainController.$inject = ['$scope', '$log', '$http', '$document', '$timeout'];

    function mainController($scope, $log, $http, $document, $timeout) {
        var vm = this;
        // config
        vm.cfg = {};
        vm.showBtns = false;
        // functions
        vm.resizeDiv = resizeDiv;
        vm.hideMsg = hideMsg;
        vm.resetForm = resetForm;

        // email stuff
        vm.msg = false;
        vm.resultMessage;
        vm.formData; //formData is an object holding the name, email, subject, and message
        vm.submitButtonDisabled = false;
        vm.submitted = false; //used so that form errors are shown only after the form has been submitted
        vm.submit = function(contactform) {
            vm.submitted = true;
            vm.submitButtonDisabled = true;


            if (contactform.$valid) {
                $http({
                    method: 'POST',
                    url: '/php/email.php',
                    data: $.param(vm.formData), //param method from jQuery
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' } //set the headers so angular passing info as form data (not request payload)
                }).success(function(data) {
                    if (data.success) { //success comes from the return json object
                        vm.submitButtonDisabled = true;
                        vm.resultMessage = data.message;
                        vm.result = 'bg-success';
                        vm.msg = true;
                         vm.resetForm(contactform);
                        $timeout(vm.hideMsg, 5000);
                    } else {
                        vm.submitButtonDisabled = false;
                        vm.resultMessage = "Sorry, your message could not be sent at this time. Please contact me on LinkedIn or Facebook."
                        vm.result = 'bg-danger';
                        vm.msg = true;
                        $timeout(vm.hideMsg, 5000);
                    }
                });
            } else {
                vm.submitButtonDisabled = false;
                vm.resultMessage = 'Failed: Please fill out all the fields.';
                vm.result = 'bg-danger';
                vm.msg = true;
                $timeout(vm.hideMsg, 5000);
            }
        }

        function resetForm(contactform) {
            contactform.inputName = null;
            contactform.inputEmail = null;
            contactform.inputCompany = null;
            contactform.inputMessage = null;
            var form = document.getElementById("contactform");
            form.reset();
        }

        function hideMsg() {
            vm.msg = false;
        }


        $('.btn-open-modal').click(function() {
            $('#portfolio-modal').modal({
                keyboard: false
            });
        });
        $('.carousel').each(function() {
            $(this).carousel({
                interval: false
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
