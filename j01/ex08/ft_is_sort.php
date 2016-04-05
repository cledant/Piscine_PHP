<?php
function ft_is_sort($var)
{
	$inc = 0;
	foreach ($var as $k)
	{
		$cpy_array[$inc] = $k;
		$inc += 1;
	}
	$inc = 0;
	print_r($var);
	sort($var);
	print_r($var);
	foreach ($var as $l)
	{
		if (strcmp($cpy_array[$inc],$l) != 0)
		{
			return FALSE;
		}
		$inc += 1;
	}
	return TRUE;
}
?>
