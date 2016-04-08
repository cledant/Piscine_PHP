<?php
function auth($login, $passwd)
{
	if ($login == NULL || $passwd == NULL)
		return FALSE;
	$found = 0;
	$data = file_get_contents("../private/passwd");
	$data = unserialize($data);
	foreach ($data as $value)
	{
		if (strcmp($value[login], $login) === 0)
		{
			$cpy_val = $value;
			$found = 1;
		}
	}
	if ($found == 0)
		return FALSE;
	$curr_hash = hash("whirlpool", $passwd);
	if (strcmp($curr_hash, $cpy_val[passwd]) !== 0)
		return FALSE;	
	return TRUE;
}
?>
