<?php
$str = "first=value&arr[]=foo+bar&arr[]=baz";
parse_str($str);
echo $first."<br/>";  // value
echo $arr[0]."<br/>"; // foo bar
echo $arr[1]."<br/>"; // baz

parse_str($str, $output);
echo $output['first']."<br/>";  // value
echo $output['arr'][0]."<br/>"; // foo bar
echo $output['arr'][1]."<br/>"; // baz