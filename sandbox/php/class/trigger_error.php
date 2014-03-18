<?php
/*
$divisor = 0;
if($divisor == 0)
{
  trigger_error("Impossible de diviser par zéro", E_USER_ERROR);
}
*/
function badgirl()
{
    trigger_error("shame on me",E_USER_ERROR);
    return true;
}
$sheis = @badgirl();
echo "ici";