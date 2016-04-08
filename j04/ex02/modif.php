<?php
if (strcmp($_POST[submit], "OK") === 0)
{
	if ($_POST[login] == NULL || $_POST[oldpw] == NULL || $_POST[newpw] == NULL)
	{
		echo "ERROR\n";
		exit;
	}
	$found = 0;
	$count = 0;
	$data = file_get_contents("../private/passwd");
	$data = unserialize($data);
	foreach ($data as $value)
	{
		if (strcmp($value[login], $_POST[login]) === 0)
		{
			$cpy_val = $value;
			$found = 1;
			$id = $count;
		}
		$count++;
	}
	if ($found == 0)
	{
		echo "ERROR\n";
		exit;
	}
	$old_hash = hash("whirlpool", $_POST[oldpw]);
	if (strcmp($old_hash, $cpy_val[passwd]) !== 0)
	{
		echo "ERROR\n";
		exit;
	}	
	$hash = hash("whirlpool", $_POST[newpw]);
	$account = array("login"=>$_POST[login], "passwd"=>$hash);
	$data[$id] = $account;
	$new_data = serialize($data);
	file_put_contents("../private/passwd", $new_data);
	echo "OK\n";
}
else
	echo "ERROR\n";
