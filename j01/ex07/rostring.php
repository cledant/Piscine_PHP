#!/usr/bin/php
<?php
function ft_split($var)
{
	$array = explode(" ", $var);
	sort($array, SORT_STRING);
	$keys = array_keys($array, "");
	foreach ($keys as $k)
		unset($array[$k]);
	return $array;
}

if ($argc == 1)
	exit;
$str = $argv[1];
$str = trim($argv[1], " ");
$array = explode(" ", $str);
$array = array_filter($array, strlen);
$str = implode(" ",$array);
$count = count($array);
$inc = 1;
$cpy = $array[0];
unset($array[0]);
foreach ($array as $k)
{
	echo $k." ";
}
echo $cpy."\n";
?>
