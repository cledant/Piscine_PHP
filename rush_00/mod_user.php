<?php
session_start();
include("super.php");
if (isset($_SESSION["ID"]) !== TRUE)
{
	header("Location: index.php");
	exit();
}
if (super() !== TRUE)
{
	header("Location: index.php");
	exit();
}
function send_fail()
{
	header("Location: form_mod_user.php?resp=fail");
	exit;
}

function send_ok()
{
	header("Location: form_mod_user.php?resp=OK");
	exit;
}

if (strcmp($_POST[submit], "OK") === 0)
{
	if ($_POST[login] == NULL || $_POST[email] == NULL || $_POST[phone] == NULL || 
		$_POST[adress] == NULL || $_POST[exist] == NULL)
	{
		send_fail();
	}
	$found = 0;
	$count = 0;
	$data = file_get_contents("./bdd/user");
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
	$account = array("login"=>$_POST[login], "passwd"=>$cpy_val[passwd], "email"=>$_POST[email],
		"adress"=>$_POST[adress], "phone" =>$_POST[phone], "exist" => $_POST[exist]);
	$data[$id] = $account;
	$new_data = serialize($data);
	file_put_contents("./bdd/user", $new_data);
	send_ok();
}
else
	send_fail();
?>
