<?PHP
function send_ok()
{
	header("location: form_add_commande.php?resp=OK");
	exit;
}

function send_fail()
{
	header("location: form_add_commande.php?resp=fail");
	exit;
}

session_start();
if (strcmp($_POST[submit], "OK") === 0)
{
	if ($_POST["IDuser"] == NULL || $_POST["IDarticles"] == NULL || $_POST["montant"] == NULL)
	{
			send_fail();
	}
	$val_article = explode(";",$_POST["ID_articles"]);
	$val_article = array_filter($val_article, strlen);
	if (!(file_exists("bdd")))
		mkdir("bdd", 0700, TRUE);
	$article = array(
		"IDuser" => $_POST["IDuser"],
		"IDarticles" => $val_article,//TAB
		"montant"=> $_POST["montant"],
		"etat" => "VALIDATION",
		"exist" => 1);
	// si le fichier 'article' n'existe pas //
	if (@file_get_contents("bdd/commande") === FALSE)
	{
		$tab[0] = $article;
		if (!(file_put_contents("bdd/commande", serialize($tab))))
		{
			send_fail();
		}
		send_ok();
	}	
	if (!($tab = unserialize(file_get_contents("bdd/commande"))))
	{
		send_fail();
	}
	$i = count($tab);
	$tab[$i] = $article;
	if (!(file_put_contents("bdd/commande", serialize($tab))))
	{
		send_fail();
	}
	send_ok();
}
else
	send_fail();
?>
