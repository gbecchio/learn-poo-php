var EventEmitter  = require('events').EventEmitter;
var connexion     = new EventEmitter();
connexion.on(
  'sortir',
  function(message)
  {
    console.log(message);
  }
);
connexion.emit
(
  'sortir',
  'Déconnexion'
);
