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
$inc_num = 0;
$inc_char = 0;
$inc_other = 0;
foreach($ret as $k)
{
	if (is_numeric($k) == TRUE)
	{
		$ret_num[$inc_num] = $k;
		$inc_num += 1;
	}
	elseif (ctype_alpha($k) == TRUE)
	{
		$ret_char[$inc_char] = $k;
		$inc_char += 1;
	}
	else
	{
		$ret_other[$inc_other] = $k;
		$inc_other += 1;
	}
}
sort($ret_num, SORT_STRING);
sort($ret_other, SORT_STRING);
usort($ret_char, strcasecmp);
foreach($ret_char as $m)
{
	echo $m."\n";
}
foreach($ret_num as $m)
{
	echo $m."\n";
}
foreach($ret_other as $m)
{
	echo $m."\n";
}
?>
