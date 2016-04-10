<?PHP
function send_ok()
{
	header("location: panier.php?resp=OK");
	exit;
}

function send_fail()
{
	header("location: panier.php?resp=fail");
	exit;
}
function redirige($iduser, $idart, $total)
{
	session_start();
	if ($iduser == NULL || $idart == NULL || $total == NULL)
	{
		send_fail();
	}
	$val_article = explode(";",$idart);
	$val_article = array_filter($val_article, strlen);
	if (!(file_exists("bdd")))
		mkdir("bdd", 0700, TRUE);
	$article = array(
		"IDuser" => $iduser,
		"IDarticles" => $val_article,//TAB
		"montant"=> $total,
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
?>
