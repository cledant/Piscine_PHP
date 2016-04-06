<?php
function ft_is_sort($var)
{
	if (count($var) === 0)
		return TRUE;
	$inc = 0;
	foreach ($var as $k)
	{
		$cpy_array[$inc] = $k;
		$inc += 1;
	}
	$inc = 0;
	sort($var);
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
