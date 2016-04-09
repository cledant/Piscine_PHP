<?PHP
	session_start();
	if (!(file_exists("bdd/commande")))
	{
		echo "ERROR\n";
		return 0;
	}
	$tab = array();
	if (!($tab = unserialize(file_get_contents("bdd/commande"))))
	{
		echo "ERROR\n";
		return 0;
	}
	if (!empty($_POST["IDuser"]))
		$tab[$_POST["ID"]]["IDuser"] = $_POST["IDuser"];
	
	if (!empty($_POST["IDarticles"]))
		$tab[$_POST["ID"]]["IDarticles"] = $_POST["IDarticles"];
	
	if (!empty($_POST["montant"]))
		$tab[$_POST["ID"]]["montant"] = $POST["montant"];
	
	if (!empty($_POST["etat"]))
		$tab[$_POST["ID"]]["etat"] = $_POST["etat"];

?>
