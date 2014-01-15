var express = require('express');
var app     = express();
app.use(express.logger()) // Active le middleware de logging
.use(express.static(__dirname + '/public')) // Indique que le dossier /public contient des fichiers statiques
.use(express.favicon('public/favicon.ico')) // Active la favicon indiquée
.use(function(req, res){ // Répond enfin
    res.send('Hello');
});
app.listen(8080);