<?PHP
function send_ok()
{
	header("Location: form_del_article.php?resp=OK");
	exit;
}

function send_fail()
{
	header("Location: form_del_article.php?resp=fail");
	exit;
}

function send_already()
{
	header("Location: form_del_article.php?resp=already");
	exit;
}

session_start();
if (strcmp($_POST[submit], "OK") === 0)
{
	if ($_POST["ID"] == NULL)
		send_fail();
	if (!file_exists("bdd/article"))
	{
		send_fail();
	}
	$tab = array();
	if (!($tab = unserialize(file_get_contents("bdd/article"))))
	{
		send_fail();
	}
	if (!array_key_exists($_POST["ID"], $tab))
		send_fail();
	if ($tab[$_POST["ID"]]["exist"] === 0)
		send_already();
	$tab[$_POST["ID"]]["exist"] = 0;
	if (!(file_put_contents("bdd/article", serialize($tab))))
	{
		send_fail();
	}
	send_ok();
}
else
	send_fail();
?>
