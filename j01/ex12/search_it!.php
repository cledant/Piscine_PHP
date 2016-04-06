#!/usr/bin/php
<?php
if ($argc == 1)
	exit;
if ($argc == 2)
	exit;
$search = $argv[1];
unset($argv[0]);
unset($argv[1]);
foreach ($argv as $k)
{
	$tmp = explode(":", $k);
	$array[$tmp[0]] = $tmp[1];
}
if (array_key_exists($search, $array) == 1)
	echo $array[$search]."\n";
?>
