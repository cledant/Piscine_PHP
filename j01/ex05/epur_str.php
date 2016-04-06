#!/usr/bin/php
<?php
if ($argc != 2)
	exit;
$str = trim($argv[1], " ");
$array = explode(" ", $str);
$array = array_filter($array, strlen);
$ok = implode(" ",$array);
echo $ok."\n";
?>
