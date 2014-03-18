<?php
$data = "ещё";
$new_string = convert_cyr_string($data, "koi8-r", "windows-1251");
echo $data;
echo $new_string;