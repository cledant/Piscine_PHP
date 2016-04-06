#!/usr/bin/php
<?php
if (count($argv) === 1)
	exit;
$string = $argv[1];
$string = preg_replace("/^\t{1,}/", "", $string);
$string = preg_replace("/^\s{1,}/", "", $string);
$string = preg_replace("/\t{1,}$/", "", $string);
$string = preg_replace("/\s{1,}$/", "", $string);
$string = preg_replace("/\t{1,}/", " ", $string);
$string = preg_replace("/\s{2,}/", " ", $string);
echo $string."\n";
?>
