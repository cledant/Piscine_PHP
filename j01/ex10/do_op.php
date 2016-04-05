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

if ($argc != "4")
{
	echo "Incorrect Parameters\n";
	exit;
}
unset($argv[0]);
$inc = 1;
foreach ($argv as $k)
{
	$str = trim($k, " ");
	$array = explode(" ", $str);
	$array = array_filter($array);
	$argv[$inc] = implode("",$array);
	$str = trim($argv[$inc], " ");
	$array = explode("\t", $str);
	$array = array_filter($array);
	$argv[$inc] = implode("",$array);
	$inc += 1;
}
if ($argv[2] == "+")
{
	$ret = $argv[1] + $argv[3];
	echo $ret."\n";
}
else if ($argv[2] == "/")
{
	$ret = $argv[1] / $argv[3];
	echo $ret."\n";
}
else if ($argv[2] == "-")
{
	$ret = $argv[1] - $argv[3];
	echo $ret."\n";
}
else if ($argv[2] == "*")
{
	$ret = $argv[1] * $argv[3];
	echo $ret."\n";
}
else if ($argv[2] == "%")
{
	$ret = $argv[1] % $argv[3];
	echo $ret."\n";
}
?>
