<?PHP
function send_fail()
{
	header("Location: form_add_article.php?resp=fail");
	exit;
}

function send_ok()
{
	header("Location: form_add_article.php?resp=OK");
	exit;
}

session_start();
include("super.php");
if (isset($_SESSION["ID"]) !== TRUE)
	header("Location: index.php");
if (super() !== TRUE)
	header("Location: index.php");
if (strcmp($_POST[submit], "OK") == 0)
{
	if (!(file_exists("bdd")))
		mkdir("bdd", 0700, TRUE);
	if ($_POST["nom"] == NULL || $_POST["image"] == NULL || $_POST["description"] == NULL ||
		$_POST["categories"] || $_POST["price"] == NULL || $_POST["stock"] == NULL)
	{
		send_fail();
	}
	$ex_cat = explode(";", $_POST["categorie"]);
	$ex_cat = array_filter($ex_cat, strlen);
	$article = array(
		"nom" => $_POST["nom"],
		"image" => $_POST["image"],
		"description"=> $_POST["description"],
		"categories" => $ex_cat,//TAB
		"stock" => $_POST["stock"],
		"price" => $_POST["price"],
		"exist" => 1);
	// si le fichier 'article' n'existe pas //
	if (@file_get_contents("bdd/article") === FALSE)
	{
		$tab[0] = $article;
		if (!(file_put_contents("bdd/article", serialize($tab))))
		{
			send_fail();
		}
		send_ok();
	}	
	if (!($tab = unserialize(file_get_contents("bdd/article"))))
	{
		send_fail();
	}
	$i = count($tab);
	$tab[$i] = $article;
	if (!(file_put_contents("bdd/article", serialize($tab))))
	{
		send_fail();
	}
	send_ok();
}
else
	send_fail();
?>
