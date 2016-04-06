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
	$array = array_filter($array, strlen);
	$argv[$inc] = implode("",$array);
	$str = trim($argv[$inc], " ");
	$array = explode("\t", $str);
	$array = array_filter($array, strlen);
	$argv[$inc] = implode("",$array);
	$inc += 1;
}
$calc = explode("*", $argv[1]);
if (count($calc) == 2)
{
	if (is_numeric($calc[0]) === FALSE)
	{
		echo "Syntax Error\n";
		exit;
	}
	if (is_numeric($calc[1]) === FALSE)
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
	if (is_numeric($calc[0]) === FALSE)
	{
		echo "Syntax Error\n";
		exit;
	}
	if (is_numeric($calc[1]) === FALSE)
	{
		echo "Syntax Error\n";
		exit;
	}
	if ($calc[1] == 0)
	{
		echo "Incorrect Parameters\n";
		exit;
	}
	$ret = $calc[0] / $calc[1];
	echo $ret."\n";
	exit ;
}
$calc = explode("%", $argv[1]);
if (count($calc) == 2)
{
	if (is_numeric($calc[0]) === FALSE)
	{
		echo "Syntax Error\n";
		exit;
	}
	if (is_numeric($calc[1]) === FALSE)
	{
		echo "Syntax Error\n";
		exit;
	}
	if ($calc[1] == 0)
	{
		echo "Incorrect Parameters\n";
		exit;
	}
	$ret = $calc[0] % $calc[1];
	echo $ret."\n";
	exit ;
}
$sign_1 = 1;
$sign_2 = 1;
$sign_op = 1;
$first = 0;
$word = 1;
$inc = 0;
$dot = 0;
$split = str_split($argv[1], 1);
foreach($split as $k)
{
	if ($word == 1 && is_numeric($k) === FALSE && $inc == 0 && $first == 0)
	{
		$first = 1;
		if ($k == "+")
			$sign_1 = 1;
		else if ($k == "-")
			$sign_1 = -1;
		else if ($dot == 0 && $k == ".")
			$dot = 1;
		else
		{
			echo "Syntax Error\n";
			exit;
		}
	}
	else if ($word == 1 && is_numeric($k) === FALSE && $dot == 0 && $k == ".")
		$dot = 1;
	else if ($word == 2 && is_numeric($k) === FALSE && $dot == 0 && $k == ".")
			$dot = 1;
	else if ($word == 1 && is_numeric($k) === FALSE && $inc != 0)
	{
		$word = 2;
		$dot = 0;
		$inc = 0;
		$first = 0;
		if ($k == "+")
			$sign_op = 1;
		else if ($k == "-")
			$sign_op = -1;
		else
		{
			echo "Syntax Error\n";
			exit;
		}
	}
	else if ($word == 2 && is_numeric($k) === FALSE && $inc == 0 && $first == 0)
	{
		$first = 1;
		if ($k == "+")
			$sign_2 = 1;
		else if ($k == "-")
			$sign_2 = -1;
		else if ($dot == 0 && $k == ".")
			$dot = 1;
		else
		{
			echo "Syntax Error\n";
			exit;
		}
	}
	else if (is_numeric($k) == 1)
		$inc += 1;
	else
	{
		echo "Syntax Error\n";
		exit;
	}
}
$inc = 1;
foreach ($argv as $k)
{
	$str = trim($k, "+");
	$array = explode("+", $str);
	$array = array_filter($array, strlen);
	$argv[$inc] = implode(" ",$array);
	$str = trim($argv[$inc], "-");
	$array = explode("-", $str);
	$array = array_filter($array, strlen);
	$argv[$inc] = implode(" ",$array);
	$inc += 1;
}
$str = trim($argv[1], " ");
$array = explode(" ", $str);
$array = array_filter($array, strlen);
if (count($array) != 2)
{
	echo "Syntax Error\n";
	exit ;
}
else
{
	$count = 1;
	foreach ($array as $k)
	{
		if ($count == 1)
		{
			$count = 2;
			$ret = $sign_1 * $k;
		}
		else if ($count == 2)
			$ret = $ret + $sign_op * $sign_2 * $k;
	}
	echo $ret."\n";
	exit;
}
echo "Syntax Error\n";
?>
