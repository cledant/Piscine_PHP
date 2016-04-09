<?PHP
	session_start();
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>indi-games</title>
		<style>
			.body
			{
				background-color:#505050;
			}
			.header
			{
				width:900px;
				height:150px;
				background-color:#909090;
				margin-left:auto;
				margin-right:auto;
				border-radius:10px;
				border:10px;
				position:relative;
			}
			.header_titre
			{
				position:absolute;
				top:10px;
				left:10px;
				font-size:200%;
				text-align:inline-block;
			}
		</style>
	</head>
	<body class=body>
		<div class=header>
			<img class=header src="ressources/entete.jpg" alt=smb>
			<div class=header_titre>
				<a href="index.php" alt=titre>TITRE</a>
<?PHP
				if ($_POST["deco"] === "deconnexion")
					unset($_SESSION["ID"]);
				if (isset($_SESSION["ID"]))
				{
					echo "<a href='profil.php' alt=profil>profil</a> ";
					echo "<form action='index.php' method='post'>";
					echo "<input type=submit name=deco value='deconnexion'>";
					echo "</form>";
				}
				else
					echo "<a href='connect.php' alt=connect>se connecter</a>";
?>
				<a href="panier.php" alt=panier>Panier</a>
			</div>
		</div>
	
	</body>
</html>
