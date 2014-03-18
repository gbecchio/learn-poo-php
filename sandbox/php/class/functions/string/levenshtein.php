<?php
// mot mal orthographié
$input = 'carrrot';

// tableau de mots à vérifier
$words  = array('apple','pineapple','banana','orange',
                'radish','carrot','pea','bean','potato');

// aucune distance de trouvée pour le moment
$shortest = -1;

// boucle sur les des mots pour trouver le plus près
foreach ($words as $word) {

    // calcule la distance avec le mot mis en entrée,
    // et le mot courant
    $lev = levenshtein($input, $word);

    // cherche une correspondance exacte
    if ($lev == 0) {

        // le mot le plus près est celui-ci (correspondance exacte)
        $closest = $word;
        $shortest = 0;

        // on sort de la boucle ; nous avons trouvé une correspondance exacte
        break;
    }

    // Si la distance est plus petite que la prochaine distance trouvée
    // OU, si le prochain mot le plus près n'a pas encore été trouvé
    if ($lev <= $shortest || $shortest < 0) {
        // définition du mot le plus près ainsi que la distance
        $closest  = $word;
        $shortest = $lev;
    }
}

echo "Mot entré : $input\n";
if ($shortest == 0) {
    echo "Correspondance exacte trouvée : $closest\n";
} else {
    echo "Vous voulez dire : $closest ?\n";
}