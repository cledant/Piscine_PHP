<?php
session_start();
function send_fail()
{
	header("Location: form_add_user.php?resp=fail");
	exit;
}

function send_ok()
{
	header("Location: form_add_user.php?resp=OK");
	exit;
}

if (strcmp($_POST[submit], "OK") === 0)
{
	if ($_POST[login] == NULL || $_POST[passwd] == NULL || $_POST[email] == NULL ||
			$_POST[phone] == NULL || $_POST[adress] == NULL)
	{
		send_fail();
	}
	if (file_exists("./bdd") === TRUE)
	{
		if (file_exists("./bdd/user") === TRUE)
			$file = 1;
		else
			$file = 0;
	}
	else
	{
		if (mkdir("./bdd", 0700, TRUE) !== TRUE)
		{
			send_fail();
		}
		$file = 0;
	}
	if ($file == 1)
	{
		$count = 0;
		$data = file_get_contents("./bdd/user");
		$data = unserialize($data);
		foreach ($data as $value)
		{
			if (strcmp($value[login], $_POST[login]) === 0)
			{
				send_fail();
			}
			$count++;
		}
		$hash = hash("whirlpool", $_POST[passwd]);
		$account = array("login"=>$_POST[login], "passwd"=>$hash, "user_type"=> 1,
			"email"=> $_POST[email], "phone" =>$_POST[phone], "adress" =>$_POST[adress], "exist" => 1);
		$data[$count] = $account;
		$new_data = serialize($data);
		file_put_contents("./bdd/user", $new_data);
		if (!isset($_SESSION["ID"]))
			$_SESSION["ID"] = $count;
	}
	else
	{
		$hash = hash("whirlpool", $_POST[passwd]);
		$account = array("login"=>$_POST[login], "passwd"=>$hash, "user_type"=> 1,
			"email"=> $_POST[email], "phone" =>$_POST[phone], "adress" =>$_POST[adress], "exist" => 1);
		$tab_data = array(0 => $account);
		$new_data = serialize($tab_data);
		file_put_contents("./bdd/user", $new_data);
		if (!isset($_SESSION["ID"]))
		   $_SESSION["ID"] = 0;
	}
	send_ok();
}
else
	send_fail();
