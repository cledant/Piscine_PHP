<?PHP
session_start();
	if (isset($_POST["ident"]))
	{
		if ($_SESSION["panier"])
		{
			$i = count($_SESSION["panier"]);
			$_SESSION["panier"][$i] = $_POST["ident"];
			header("Location: index.php");
			exit();
		}
		else
		{
			$_SESSION["panier"][0] = $_POST["ident"];
			header("Location: index.php");
			exit();
		}
	}
	
include ("header.php");
	if (!file_exists("bdd/article"))
		return 0;
	
	if (!($tab = unserialize(@file_get_contents("bdd/article"))))
		return 0;
	echo "<img src='".$tab[$_POST["id"]]["image"]."' class=see alt=image><br>";
	echo "<form action=produit.php method='post'>";
	echo "<input type=hidden name='ident' value='".$_POST['id']."'>";
	echo "<input type=submit name=panier value='add to basket'>";
	echo "</form>";
	echo $tab[$_POST["id"]]["nom"]."<br>";
	echo "Description :".$tab[$_POST["id"]]["description"]."<br>";
	echo "Prix : ".$tab[$_POST["id"]]["price"]."<br>";
?>
