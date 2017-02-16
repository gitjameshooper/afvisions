module.exports = {
    bundle: {
        main: {
            scripts: [
                './node_modules/jquery/dist/jquery.js',
                './node_modules/angular/angular.min.js',
                './node_modules/angular-route/angular-route.min.js',
                './node_modules/underscore/underscore-min.js',
                './client/js/app.js',
                './client/js/controllers/mainController.js'
            ]
        }
    }
};