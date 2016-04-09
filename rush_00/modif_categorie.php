<?PHP
	session_start();
	if (!(file_exists("bdd/categorie")))
	{
		echo "ERROR\n";
		return 0;
	}
	$tab = array();
	if (!($tab = unserialize(file_get_contents("bdd/categorie"))))
	{
		echo "ERROR\n";
		return 0;
	}
	if (!empty($_POST["nom"]))
		$tab[$_POST["ID"]]["nom"] = $_POST["nom"];

	if (!empty($_POST["article"]))
		$tab[$_POST["ID"]]["article"] = $_POST["article"];
?>
