<?PHP
	session_start();
	if (!(file_exists("bdd/article")))
	{
		echo "ERROR\n";
		return 0;
	}
	$tab = array();
	if (!($tab = unserialize(file_get_contents("bdd/article"))))
	{
		echo "ERROR\n";
		return 0;
	}
	if (!empty($_POST["nom"]))
		$tab[$_POST["ID"]]["nom"] = $_POST["nom"];
	
	if (!empty($_POST["image"]))
		$tab[$_POST["ID"]]["image"] = $_POST["image"];
	
	if (!empty($_POST["descritpion"]))
		$tab[$_POST["ID"]]["description"] = $POST["description"];
	
	if (!empty($_POST["categories"]))
		$tab[$_POST["ID"]]["categories"] = $_POST["categories"];

	if (!empty($_POST["stock"]))
		$tab[$_POST["ID"]]["stock"] = $_POST["stock"];
?>
