var express = require('express');

// Create App
var app = express();
app.use(express.static('public'));
app.disable('x-powered-by');
app.listen(3000);


 
module.exports = app;
