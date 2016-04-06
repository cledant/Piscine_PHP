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

function ft_uber_sort($a, $b)
{
	$sort = "abcdefghijklmnopqrstuvwxyz0123456789 !\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
	$sort = str_split($sort, 1);
	$a = strtolower($a);
	$b = strtolower($b);
	$i = 0;
	while ($a[$i] == $b[$i])
	{
		$i += 1;
	}
	foreach ($sort as $key => $value)
	{
		if ($a[$i] == $value)
		{
			$key_a = $key;
			break;
		}
	}
	foreach ($sort as $key => $value)
	{
		if ($b[$i] == $value)
		{
			$key_b = $key;
			break;
		}
	}
	if ($key_a > $key_b)
		return (1);
	if ($key_a < $key_b)
		return (-1);
	return (0);
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
usort($ret, "ft_uber_sort");
foreach($ret as $k)
{
	echo $k."\n";
}
?>
