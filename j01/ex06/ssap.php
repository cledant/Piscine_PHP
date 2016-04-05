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

unset($argv[0]);
$inc = 1;
foreach ($argv as $k)
{
	$str = trim($k, " ");
	$array = explode(" ", $str);
	$array = array_filter($array);
	$argv[$inc] = implode(" ",$array);
	$inc += 1;
}
$inc = 0;
foreach ($argv as $k)
{
	$array = ft_split($k);
	foreach($array as $l)
	{
		$ret[$inc] = $l;
		$inc += 1;
	}
}
sort($ret, SORT_STRING);
foreach($ret as $m)
{
	echo $m."\n";
}
?>
