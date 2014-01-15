var http = require('http');
// Code identique au précédent
var instructionsNouveauVisiteur = function(req, res)
{
  res.writeHead(200);
  res.end('Salut tout le monde !');
};
var server = http.createServer(instructionsNouveauVisiteur);