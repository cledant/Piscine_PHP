<?PHP
function send_ok()
{
	header("Location: form_del_user.php?resp=OK");
	exit;
}

function send_fail()
{
	header("Location: form_del_user.php?resp=fail");
	exit;
}

function send_already()
{
	header("Location: form_del_user.php?resp=already");
	exit;
}

function send_no()
{
	header("Location: form_del_user.php?resp=NO");
	exit;
}

session_start();
if (strcmp($_POST[submit], "OK") === 0)
{
	if ($_POST["ID"] == NULL)
		send_fail();
	if (!file_exists("bdd/user"))
	{
		send_fail();
	}
	$tab = array();
	if (!($tab = unserialize(file_get_contents("bdd/user"))))
	{
		send_fail();
	}
	if (!array_key_exists($_POST["ID"], $tab))
		send_fail();
	if ($tab[$_POST["ID"]]["exist"] === 0)
		send_already();
	if ($tab[$_POST["ID"]]["user_type"] === 0)
		send_no();
	$tab[$_POST["ID"]]["exist"] = 0;
	if (!(file_put_contents("bdd/user", serialize($tab))))
	{
		send_fail();
	}
	send_ok();
}
else
	send_fail();
?>
