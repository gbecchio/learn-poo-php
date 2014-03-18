<?php
$a = <<<EOT

echo "t";
\$b = 10;
var_dump(\$b);
EOT;
eval($a);
echo $b;