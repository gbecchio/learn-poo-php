<?php
$data = "Deux D et un F.";

foreach (count_chars($data, 1) as $i => $val) {
   echo "Il y a $val occurence(s) de \"" , chr($i) , "\" dans la phrase.\n";
}
echo "<pre>";

foreach(count_chars($data) as $i => $val)
{
	echo $val ."=>".chr($i)."<br />";
}
echo "<br />";
echo "<br />";
echo "<br />";
echo "<br />";
foreach(count_chars($data, 1) as $i => $val)
{
	echo $val ."=>".chr($i)."<br />";
}
echo "<br />";
echo "<br />";
echo "<br />";
echo "<br />";
foreach(count_chars($data, 2) as $i => $val)
{
	echo $val ."=>".chr($i)."<br />";
}
echo "<br />";
echo "<br />";
echo "<br />";
echo "<br />";
var_dump(count_chars($data, 3));
echo "<br />";
echo "<br />";
echo "<br />";
echo "<br />";
var_dump(count_chars($data, 4));