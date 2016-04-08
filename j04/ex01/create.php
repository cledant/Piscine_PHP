<?php
if (strcmp($_POST[submit], "OK") === 0)
{
	if ($_POST[login] == NULL || $_POST[passwd] == NULL)
	{
			echo "ERROR\n";
			exit;
	}
	if (file_exists("../private") === TRUE)
	{
		if (file_exists("../private/passwd") === TRUE)
			$file = 1;
		else
			$file = 0;
	}
	else
	{
		if (mkdir("../private", 0700, TRUE) !== TRUE)
		{
			echo "ERROR\n";
			exit;
		}
		$file = 0;
	}
	if ($file == 1)
	{
		$count = 0;
		$data = file_get_contents("../private/passwd");
		$data = unserialize($data);
		foreach ($data as $value)
		{
			if (strcmp($value[login], $_POST[login]) === 0)
			{
				echo "ERROR\n";
				exit;
			}
			$count++;
		}
		$hash = hash("whirlpool", $_POST[passwd]);
		$account = array("login"=>$_POST[login], "passwd"=>$hash);
		$data[$count] = $account;
		$new_data = serialize($data);
		file_put_contents("../private/passwd", $new_data);
	}
	else
	{
		$hash = hash("whirlpool", $_POST[passwd]);
		$account = array("login"=>$_POST[login], "passwd"=>$hash);
		$tab_data = array(0 => $account);
		$new_data = serialize($tab_data);
		file_put_contents("../private/passwd", $new_data);
	}
	echo "OK\n";
}
else
	echo "ERROR\n";
