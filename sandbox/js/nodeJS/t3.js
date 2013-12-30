var http      = require('http');
var orsidTxt  = 
"<h1>DOCAPOST-DPS</h2>"+
"<center>"+
  "<b>Statistiques annuelles</b>"+
  "<table border=\"1\">"+
    "<tr align='right'><td>7 861</td><td> euros</td></tr>"+
    "<tr align='right'><td>300 894</td><td>euros</td></tr>"+
    "<tr align='right'><td>158 215</td><td>euros</td></tr>"+
  "</table>"+
"</center>";
var server    = http.createServer(
  function(req, res)
  {
    res.writeHead(200, {"Content-Type": "text/html"});
    res.writeHead(200);
    res.write(
    "<!DOCTYPE html>"+
    "<html>"+
      "<head>"+
        "<meta charset=\"utf-8\" />"+
           "<title>Ma page Node.js !</title>"+
      "</head>"+
      "<body>"
    );
    res.write(orsidTxt);
    res.write(
      "</body>"+
    "</html>"
    );
    res.end();
});
server.listen(8080);