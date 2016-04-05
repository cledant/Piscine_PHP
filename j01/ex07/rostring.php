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

$str = $argv[1];
$str = trim($argv[1], " ");
$array = explode(" ", $str);
$array = array_filter($array);
$str = implode(" ",$array);
$count = count($array);
$inc = 1;
while ($inc < $count)
{
	echo $array[$inc]." ";
	$inc += 1;
}
echo $array[0]."\n";
?>
