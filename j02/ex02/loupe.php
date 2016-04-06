#!/usr/bin/php
<?php
if (count($argv) === 1)
	exit;
$link = $argv[1];
$str = file_get_contents($link);


?>
