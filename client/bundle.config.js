module.exports = {
    bundle: {
        main: {
            scripts: [
                './node_modules/jquery/dist/jquery.js',
                './node_modules/angular/angular.min.js',
                './node_modules/angular-route/angular-route.min.js',
                './node_modules/underscore/underscore-min.js',
                './node_modules/angular-scroll/angular-scroll.min.js',
                './node_modules/bootstrap/dist/js/bootstrap.min.js',
                './node_modules/angular-modal-service/dst/angular-modal-service.min.js',
                './client/js/app.js',
                './client/js/controllers/mainController.js',
                './client/js/controllers/modalController.js'
            ]
        }
    }
};