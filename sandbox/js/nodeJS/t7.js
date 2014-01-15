var http          = require('http');
var http_deux     = require('t1');
var EventEmitter  = require('events').EventEmitter;
var i             = 0;
var server        = http.createServer();
server.on('request', function(req, res) { });
var server  = http.createServer();
server.on(
  'request',
  function(req, res)
  {
    res.writeHead(200);
    res.write('Docapost-DPS');
    i++;
    res.end();
  }
);
server.on(
  'close',
  function()
  { // On écoute l'évènement close
    console.log('Déconnexion');
  }
);
server.listen(8080); // Démarre le serveur
// Arrête le serveur. Déclenche l'évènement close
var connexion     = new EventEmitter();
connexion.on
(
  'sortir',
  function(message, lint)
  {
    console.log(message);
    console.log(lint[10]);
    server.close();
  }
);
connexion.emit
(
  'sortir',
  'Déconnexion',
  [
    1,2,3,4,5,6,7,8,9,10,"Printemps RH"
  ],
  'a'
);