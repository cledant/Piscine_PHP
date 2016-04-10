<?PHP
	session_start();
	include ("super.php");
	if (isset($_SESSION["ID"]) && super() === TRUE)
	{
		header("Location: super_index.php");
		exit();
	}
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>indi-games</title>
		<link rel="stylesheet" type="text/css" href="display.css">	
	</head>
	<body class=body>
		<?PHP
		include("header.php");
		?>
	<div class=produit>
<?PHP
		if (file_exists("bdd/article") && ($tab = unserialize(@file_get_contents("bdd/article"))))
		{
			$ok = 0;
			$i = 0;
			while($ok < count($tab))
			{
				while ($tab[$i]["exist"] === 0)
					$i++;
				if (isset($tab[$i]["image"]))
				{
					echo "<div class=both><div class=img><img src='".$tab[$i]["image"]."' class=case alt=article1></div>";
					echo "<form class=voir action='produit.php' method='post'>";
					echo "<input type=hidden name=id value=".$i." >";
					echo "<input type=submit name=voir value='voir article'>";
					echo "</form></div>";
				}
				
				else
					echo "<div class=img><img src='ressources/default.gif' class=case alt=default></div>";
				if ((($ok + 1) % 2) == 0)
					echo "<br>";
				$i++;
				$ok++;
			}
		}
?>	
			</div>	
	</body>
</html>
