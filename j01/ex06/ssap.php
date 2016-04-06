#!/usr/bin/php
<?php
function ft_split($var)
{
	$array = explode(" ", $var);
	asort($array);
	$keys = array_keys($array, "");
	foreach ($keys as $k)
		unset($array[$k]);
	return $array;
}

if ($argc == 1)
	exit;
unset($argv[0]);
$inc = 1;
foreach ($argv as $k)
{
	$str = trim($k, " ");
	$array = explode(" ", $str);
	$array = array_filter($array, strlen);
	$argv[$inc] = implode(" ",$array);
	$inc += 1;
}
$exit_1 = 1;
foreach ($argv as $verif)
{
	if (strcmp($verif, "") !== 0)
		$exit_1 = 0;
}
if ($exit_1 === 1)
	exit;
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
asort($ret);
foreach($ret as $m)
{
	echo $m."\n";
}
?>
