<?php
function ft_split($var)
{
	if (count($var) !== 1)
		return $array;
	$array = explode(" ", $var);
	asort($array);
	$keys = array_keys($array, "");
	foreach ($keys as $k)
		unset($array[$k]);
	return $array;
}
?>
