console.log('Bienvenue dans Node.js !');
var http = require('http');
var server = http.createServer(
  function(req, res)
  {
    res.writeHead(200);
    res.end('Salut tout le monde !');
    console.log(res);
    console.log(req);
  }
);
server.listen(8080);