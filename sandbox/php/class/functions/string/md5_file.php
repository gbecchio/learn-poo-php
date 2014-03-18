<?php
echo "<pre>";
$file = 'crc32.php';
echo 'La signature MD5 du fichier ' . $file . ' est ' . md5_file($file);
echo "<br />";
echo 'La signature MD5 du fichier ' . $file . ' est ' . md5_file($file, true);
echo "</ pre>";