#!/usr/bin/php
<?php
$str = trim($argv[1], " ");
$array = explode(" ", $str);
$array = array_filter($array);
$ok = implode(" ",$array);
echo $ok."\n";
?>
