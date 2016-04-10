<?PHP
function send_fail()
{
	header("Location: form_modif_article.php?resp=fail");
	exit;
}

function send_ok()
{
	header("Location: form_modif_article.php?resp=OK");
	exit;
}

session_start();
include("super.php");
if (isset($_SESSION["ID"]) !== TRUE)
	header("Location: index.php");
if (super() !== TRUE)
	header("Location: index.php");

if (!(file_exists("bdd/article")))
{
	send_fail();
}
if (strcmp($_POST[submit], "OK") === 0)
{
	if ($_POST["ID"] == NULL || $_POST["nom"] == NULL || $_POST["image"] == NULL ||
		$_POST["description"] == NULL || $_POST["price"] == NULL ||
		$_POST["stock"] == NULL || $_POST["categorie"] == NULL ||
		$_POST["exist"] == NULL)
	{
		send_fail();
	}
	$tab = array();
	if (!($tab = unserialize(file_get_contents("bdd/article"))))
	{
		send_fail();
	}
	$ex_cat = explode(";", $_POST["categorie"]);
	$ex_cat = array_filter($ex_cat, strlen);
	if (!empty($_POST["nom"]))
		$tab[$_POST["ID"]]["nom"] = $_POST["nom"];
	if (!empty($_POST["image"]))
		$tab[$_POST["ID"]]["image"] = $_POST["image"];
	if (!empty($_POST["description"]))
		$tab[$_POST["ID"]]["description"] = $POST["description"];
	$tab[$_POST["ID"]]["categories"] = $ex_cat;
	if (!empty($_POST["price"]))
		$tab[$_POST["ID"]]["price"] = $_POST["price"];
	if (!empty($_POST["stock"]))
		$tab[$_POST["ID"]]["stock"] = $_POST["stock"];
	if (!empty($_POST["exist"]))
		$tab[$_POST["ID"]]["exist"] = $_POST["exist"];
	$data = serialize($tab);
	file_put_contents("bdd/article", $data);
	send_ok();
}
else
	send_fail();
?>
