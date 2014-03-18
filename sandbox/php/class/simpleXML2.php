<?php
$xmlstr = <<<XML
<?xml version='1.0' standalone='yes'?>
<movies>
 <movie>
  <title>PHP: Behind the Parser</title>
  <characters>
   <character>
    <name>Ms. Coder</name>
    <actor>Onlivia Actora</actor>
   </character>
   <character>
    <name>Mr. Coder</name>
    <actor>El Act&#211;r</actor>
   </character>
  </characters>
  <plot>
   So, this language. It's like, a programming language. Or is it a
   scripting language? All is revealed in this thrilling horror spoof
   of a documentary.
  </plot>
  <great-lines>
   <line>PHP solves all my web problems</line>
  </great-lines>
  <empty-a>
  							vide
  </empty-a>
  <rating type="thumbs">7</rating>
  <rating type="stars">5</rating>
 </movie>
</movies>
XML;
echo "<pre>";

$movies = new SimpleXMLElement($xmlstr);

echo $movies->movie[0]->plot;
echo $movies->movie->characters->character[1]->name;

$movies = new SimpleXMLElement($xmlstr);

echo $movies->movie->{'great-lines'}->line;
echo $movies->movie->{'empty-a'};

echo $movies->movie->rating[1]["type"];

/* Pour chaque <character>, nous affichons un <name>. */
foreach($movies->movie->characters->character as $character)
{
   echo $character->name, ' played by ', $character->actor, PHP_EOL;
}
/* Accès au node <rating> du premier <movie>.
 * Affichage des attributs de <rating> également. */
foreach ($movies->movie[0]->rating as $rating) {
    switch((string) $rating['type']) { // Récupération des attributs comme indices d'éléments
    case 'thumbs':
        echo $rating, ' thumbs up';
        break;
    case 'stars':
        echo $rating, ' stars';
        break;
    }
}
if ((string) $movies->movie->title == 'PHP: Behind the Parser') {
    print 'My favorite movie.';
}

echo htmlentities((string) $movies->movie->title);

foreach ($movies->xpath('//character') as $character) {
    echo $character->name, 'played by ', $character->actor, PHP_EOL;
}
$movies->movie[0]->characters->character[0]->name = 'Miss Coder';

echo $movies->asXML();
$character = $movies->movie[0]->characters->addChild('character');
$character->addChild('name', 'Mr. Parser');
$character->addChild('actor', 'John Doe');

$rating = $movies->movie[0]->addChild('racing', 'PG');
$rating->addAttribute('type', 'mpaa');

echo $movies->asXML();
$dom = new DOMDocument;
$dom->loadXML('<books><book><title>blah</title></book></books>');
if(!$dom)
{
    echo 'Erreur lors de l\'analyse du document';
    exit;
}
print_r($dom);
$books = simplexml_import_dom($dom);
echo $books->book[0]->title;
print_r($books);
echo $books->asXML();