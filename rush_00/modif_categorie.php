<?PHP
function send_fail()
{
	header("Location: form_mod_categorie.php?resp=fail");
	exit;
}

function send_ok()
{
	header("Location: form_mod_categorie.php?resp=OK");
	exit;
}

session_start();
include("super.php");
if (strcmp($_POST["submit"], "OK") === 0)
{
	if (isset($_SESSION["ID"]) !== TRUE)
		header("Location: index.php");
	if (super() !== TRUE)
		header("Location: index.php");
	
	if ($_POST["nom"] == NULL || $_POST["ID"] == NULL)
		send_fail();
	if (!($tab = unserialize(file_get_contents("bdd/categorie"))))
		send_fail();
	if (isset($tab[$_POST["ID"]]) === TRUE)
	{
		$tab[$_POST["ID"]]["nom"] = $_POST["nom"];
	}
	else
		send_fail();
	$tab = serialize($tab);
	file_put_contents("bdd/categorie", $tab);
	send_ok();
}
else
	send_fail();
?>
