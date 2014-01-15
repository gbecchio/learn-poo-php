var express = require('express');
var app     = express();
app.set('title', 'Docapost-DPS copy');
app.get('title');
app.get(
  '/',
  function(req, res)
  {
    res.setHeader('Content-Type', 'text/plain');
    res.end('Vous êtes à l\'accueil de Docapost DPS');
  }
);
app.get(
  '/index.php',
  function(req, res)
  {
    res.setHeader('Content-Type', 'text/plain');
    res.end('Docapost-DPS page PHP');
  }
);
app.get(
  '/index.php/:login/coffreFort',
  function(req, res)
  {
    res.setHeader("Content-Type", "text/html");
    res.render('coffreFort.ejs', {login: req.params.login});
  }
);
app.get(
  '/pp/:nombre',
  function(req, res)
  {
    var noms = ['Printemps RH', 'ADP', 'ADP RH', 'SNCF'];
    res.render('projetPerdu.ejs', {nbr_pp: req.params.nombre, noms: noms});
  }
);
app.use(
    function(req, res, next)
    {
      res.setHeader('Content-Type', 'text/plain');
      res.send(404, '\tDocapost-DPS\n\nPage introuvable !\n votre action a été loguée et vous allez avoir des problèmes avec la justice!');
  }
);
app.listen(8080);