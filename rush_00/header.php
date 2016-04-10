<?PHP
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="display.css">
</head>
<body>
	<div class=header>
		<img src="ressources/header.png" class=header alt=smb>
		<div class=header_titre><a href="index.php" class=a alt=titr>TITRE</a>
		<?PHP
		if ($_POST["deco"] === "deconnexion")
			unset($_SESSION["ID"]);
		if (isset($_SESSION["ID"]))
			echo "<a href='profil.php' alt=profil>profil</a>";
		else
			echo"<a href='connect.php' alt=connect>se connecter</a>";
		?>
		<a href="panier.php" alt=panier>panier</a>
		</div>
		<?PHP
		if (isset($_SESSION["ID"]))
		{
			echo "<form actioin='index.php' class=deco method='post'>";
			echo "<input type=submit name='deco' value='deconnexion'>";
			echo "</form>";
		}
		?>
	</div>
</body>
</html>
