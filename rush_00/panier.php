<?PHP
session_start();
include("add_commande_2.php");	
	if (isset($_POST["valider"]))
	{
		if (!isset($_SESSION["ID"]))
			echo "<div><br>Veuillez vous connecter</div><br>";
		else
		{
			if (!($tab = unserialize(@file_get_contents("bdd/article"))))
				return 0;
			$total = 0;
			foreach($tab as $id => $value)
			{
				$i = 0;
				while (isset($_SESSION["panier"][$i]))
				{
					if ($_SESSION["panier"][$i] == $id)
						$total = $total + $tab[$id]['price'];
					$i++;
				}
			}
			redirige($_SESSION["ID"], implode(";", $_SESSION["panier"]), $total);
		}
	}
	if (isset($_POST["empty"]))
	{
		unset($_SESSION["panier"]);
		unset($_SESSION["empty"]);
	}
	if ($_GET["resp"] === "OK")
	{
		echo "Commande Validée !";
		unset($_SESSION["panier"]);
		exit();
	}
			
	if (!($tab = unserialize(@file_get_contents("bdd/article"))))
	{
		header("Location: index.php");
		exit();
	}
	$ok = 0;
	
include("header.php");
	echo "<form action=panier.php method='post'>";
	echo "<input type=submit name=valider value='valider panier'>";
	
	echo "<form action=panier.php method='post'>";
	echo "<input type=submit name=empty value='Vider le panier'>";
	echo "</form>";
	$TOT = 0;
	foreach($tab as $id => $article)
	{
		$i = 0;
		while (isset($_SESSION["panier"][$i]))
		{
			if ($_SESSION["panier"][$i] == $id)
			{
				echo "<img src='".$tab[$id]["image"]."' class=cases alt=article1><br>";
				echo $tab[$id]['nom']."<br>";
				echo $tab[$id]['price']."<br>";
				echo "<br>";
				$TOT = $TOT + $tab[$id]['price'];
				$ok = 1;
			}
			$i++;
		}
	}
	echo "TOTAL = ".$TOT." euros<br>";
	if ($ok !== 1)
		echo "<div class=case>Votre panier est vide !!</div>";
?>	
