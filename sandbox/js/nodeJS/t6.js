var http        = require('http');
var url         = require('url');
var querystring = require('querystring');
var server      = http.createServer(
  function(req, res)
  {
    var params = querystring.parse(url.parse(req.url).query);
    res.writeHead(200, {"Content-Type": "text/plain"});
    if('prenom' in params && 'nom' in params)
    {
        res.write('Docapost-DPS :</ br> nom et prénom' + params['prenom'] + ' ' + params['nom']);
    }
    else
    {
        res.write('Vous devez bien avoir un prénom et un nom pour utiliser l\'application La Poste');
    }
    res.end();
    server.close();
});
server.listen(8080);
server.on(
  'close',
  function()
  {
    console.log("Serveur arrêté");
});