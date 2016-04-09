<?PHP
function send_ok()
{
	header("Location: form_add_categorie.php?resp=OK");
	exit;
}

function send_fail()
{
	header("Location: form_add_categorie.php?resp=fail");
	exit;
}

session_start();
if ($_POST[categorie] == NULL)
{
	send_fail();
}
if (strcmp($_POST[submit], "OK") === 0)
{
	if (!file_exists("bdd"))
		mkdir("bdd", 0700, TRUE);
	$categorie = array(
		"nom" => $_POST["nom"],
		"exist" => 1);
	// Si le fichier 'categorie' n'existe pas //
	if (!(@file_get_contents("bdd/categorie")))
	{
		$tab[0] = $categorie;
		if (!(file_put_contents("bdd/categorie", serialize($tab))))
		{
			send_fail();
		}
		send_ok();
	}
	// Si le fichier 'categorie' existe //
	if (!($tab = unserialize(file_get_contents("bdd/categorie"))))
	{
		send__fail();
	}
	$i = count($tab);
	$tab[$i] = $categorie;
	if (!(file_put_contents("bdd/categorie", serialize($tab))))
	{
		send_fail();
	}
	send_ok();
}
send_fail();
?>
