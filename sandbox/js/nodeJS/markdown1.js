var markdown = require('markdown').markdown;
console.log(markdown.toHTML(' _Un_ paragraphe en **markdown** !    <?php if($i == 10){a=3;} ?>'));
console.log(markdown.toHTML('># Ce texte apparaîtra dans un élément HTML <blockquote>'));
console.log(markdown.toHTML('* a\n * b\n * c\n * d\t* dd\n'));
console.log(markdown.toHTML('titre niv 1\n ================================='));
console.log(markdown.toHTML('[texte du lien](http://www.url_du_lien.fr "texte pour le titre, facultatif")'));
console.log(markdown.toHTML('![Texte alternatif](url_de_l\'image "texte pour le titre, facultatif")'));
