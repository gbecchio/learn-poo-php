<?php
$data = "la mère qu'on voit danser le long des golfes clairs a des reflets d'argent la mer";
$new_string = chunk_split($data, 10, "<br />");
echo $new_string;