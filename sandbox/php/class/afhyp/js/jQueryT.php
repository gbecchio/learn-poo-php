<!DOCTYPE HTML>
<html>
<head>
	<style>
	.rouge
	{
		color:red;
	}
	</style>
    <title>TP : Mini jeu de combat</title>
    <meta charset="UTF-8">
    <script src="jquery.js"></script>
    <script src="mon-script.js"></script>
</head>
<body>
Ce texte est affiché en HTML

    <div id="texteJQ"></div>
    <div class='rouge'>rouge</div>
    <img src="canard.jpg" title="animal canard" border="11">
    <img src="chat.jpg" title="animal chat" border="4">
    <img src="cheval.jpg" title="cheval" border="2">
    <img src="chien.jpg" title="animal chien"  border="8">
    <img src="girafe.jpg" title="girafe" border="4">
    <div id="listes">
      <ul id="ul1">
        <li> Elément de liste 1
          <ul id="ul2">
            <li> Enfant 1</li>
            <li> Enfant 2</li>
          </ul>
        </li>
        <li> Elément de liste 2</li>
        <li> Elément de liste 3</li>
        <li> Elément de liste 4</li>
      </ul>
    </div>
      <div id="mondiv">
  Les valeurs stockées dans la balise &lt;div&gt; sont : <span id="sp1"></span>, <span id="sp2"></span> et <span id="sp3"></span>.
  </div>
  <style type="text/css">
  div { width: 400px; height: 300px; float: left; margin: 5px; }
  #premier { background-color: #F6E497; }
  #troisieme { background-color: #CAF1EC; }
  #quatrieme { background-color: #F1DBCA; }
</style>

<button id="majPremier">Mise à jour première zone</button>
<button id="majDeuxieme">Mise à jour deuxième zone</button><br /><br />
<div id="premier">
  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
</div>

<div id="deuxieme">
  <img src="image1.jpg">
</div>

<div id="troisieme">
  Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
</div>

<div id="quatrieme">
  Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. 
</div>
<input type="text" id="ref">
    <button id="action">Afficher</button><br />
    <div id="r">Entrez un nombre compris entre 1 et 10 pour afficher un proverbe chinois</div>
    <div id="r2">Entrez un nombre compris entre 1 et 10 pour afficher un proverbe chinois</div>
 <button id="action">Lancer la requête HTTP GET</button><br />
 <button id="charger">Charger et traiter les données</button>
<div id="r3">Cliquez sur "Charger et traiter les données" pour lancer la lecture et le traitement des données JSON</div>
    <button id="action2">Lancer la requête AJAX</button><br />
    <button id="action3">Lancer la requête AJAX 3</button><br /><br />
<div id="donnees3" style="background-color: yellow"></div><br />
<div id="message3">n</div>
<div id="mess">n</div>
<div class="trigger">Trigger</div>
<div class="result"></div>
<div class="log"></div>
</body>
</html>