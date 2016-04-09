<?php

function send_fail()
{
	header("Location: form_mod_user_passwd.php?resp=fail");
	exit;
}

function send_ok()
{
	header("Location: form_mod_user_passwd.php?resp=OK");
	exit;
}

if (strcmp($_POST[submit], "OK") === 0)
{
	if ($_POST[login] == NULL || $_POST[oldpw] == NULL || $_POST[newpw] == NULL)
	{
		send_fail();
	}
	$found = 0;
	$count = 0;
	$data = file_get_contents("../bdd/user");
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
		send_fail();
	}
	$old_hash = hash("whirlpool", $_POST[oldpw]);
	if (strcmp($old_hash, $cpy_val[passwd]) !== 0)
	{
		send_fail();
	}	
	$hash = hash("whirlpool", $_POST[newpw]);
	$account = array("login"=>$_POST[login], "passwd"=>$hash);
	$data[$id] = $account;
	$new_data = serialize($data);
	file_put_contents("../bdd/user", $new_data);
	send_ok();
}
else
	send_fail();
?>
