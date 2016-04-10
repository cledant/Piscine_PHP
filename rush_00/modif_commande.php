<?PHP
function send_fail()
{
	header("Location: form_modif_commande.php?resp=fail");
	exit;
}

function send_ok()
{
	header("Location: form_modif_commande.php?resp=OK");
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
	if ($_POST["ID"] == NULL || $_POST["IDarticles"] == NULL ||
		$_POST["montant"] == NULL || $_POST["etat"] == NULL ||
		$_POST["exist"] == NULL || $_POST["IDuser"] == NULL)
	{
		send_fail();
	}
	$tab = array();
	if (!($tab = unserialize(file_get_contents("bdd/commande"))))
	{
		send_fail();
	}
	$ex_cat = explode(";", $_POST["IDarticles"]);
	$ex_cat = array_filter($ex_cat, strlen);
	if (!(file_exists("bdd/commande")))
	{
		send_fail();
	}
	$tab = array();
	if (!($tab = unserialize(file_get_contents("bdd/commande"))))
	{
		send_fail();
	}
	$tab[$_POST["ID"]]["IDuser"] = $_POST["IDuser"];
	$tab[$_POST["ID"]]["IDarticles"] = $ex_cat;
	$tab[$_POST["ID"]]["montant"] = $_POST["montant"];
	$tab[$_POST["ID"]]["etat"] = $_POST["etat"];
	$tab[$_POST["ID"]]["exist"] = $_POST["exist"];
	$data = serialize($tab);
	file_put_contents("bdd/commande", $data);
	send_ok();
}
else
	send_fail();
?>
