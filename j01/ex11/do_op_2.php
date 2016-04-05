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

if ($argc != "2")
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
$calc = explode("*", $argv[1]);
if (count($calc) == 2)
{
	if (is_numeric($calc[0]) == 0)
	{
		echo "Syntax Error\n";
		exit;
	}
	if (is_numeric($calc[1]) == 0)
	{
		echo "Syntax Error\n";
		exit;
	}
	$ret = $calc[0] * $calc[1];
	echo $ret."\n";
	exit ;
}
$calc = explode("/", $argv[1]);
if (count($calc) == 2)
{
	if (is_numeric($calc[0]) == 0)
	{
		echo "Syntax Error\n";
		exit;
	}
	if (is_numeric($calc[1]) == 0)
	{
		echo "Syntax Error\n";
		exit;
	}
	$ret = $calc[0] / $calc[1];
	echo $ret."\n";
	exit ;
}
$calc = explode("%", $argv[1]);
if (count($calc) == 2)
{
	if (is_numeric($calc[0]) == 0)
	{
		echo "Syntax Error\n";
		exit;
	}
	if (is_numeric($calc[1]) == 0)
	{
		echo "Syntax Error\n";
		exit;
	}
	$ret = $calc[0] % $calc[1];
	echo $ret."\n";
	exit ;
}
$calc = explode("+", $argv[1]);
$calc = array_filter($calc);
$ret = 0;
if (count($calc) == 2)
{
	foreach($calc as $k)
	{
		if (is_numeric($k) == 0)
		{
			echo "Syntax Error\n";
			exit;
		}
		$ret += $k;
	}
	echo $ret."\n";
	exit ;
}
$calc = explode("-", $argv[1]);
$calc = array_filter($calc);
$ret = 0;
if (count($calc) == 2)
{
	foreach($calc as $k)
	{
		if (is_numeric($k) == 0)
		{
			echo "Syntax Error\n";
			exit;
		}
		$ret -= $k;
	}
	echo $ret."\n";
	exit ;
}
echo "Syntax Error\n";
?>
