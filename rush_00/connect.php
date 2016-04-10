<?PHP
	session_start();
	if (isset($_POST["login"]) && isset($_POST["passwd"]))
	{
		if (empty($_POST["login"]) || empty($_POST["passwd"]))
		{
			echo "ERROR0\n";
			return 0;
		}
		$tab = array();
		if (!($tab = unserialize(@file_get_contents("bdd/user"))))
		{
			echo "ERROR1\n";
			return 0;
		}
		$hash = hash("Whirlpool", $_POST["passwd"]);
		foreach($tab as $key => $value)
		{
			if ($value["login"] === $_POST["login"])
			{
				
				if (strcmp($value["passwd"], $hash) === 0)
				{
					if ($value["exist"] === 1)
					{
						$_SESSION["ID"] = $key;
						header("Location: index.php");
						return 1;
					}
					else
					{
						echo "Votre compte a été supprimé\n";
						return 0;
					}
				}
				else if (strcmp($value["passwd"], $hash) !== 0)
				{
					echo "Wrong Password\n";
					return 0;
				}
			}
		}
	}
?>
<html>
	<head>
		<title="Identifcation indi-games">
		<link rel="stylesheet" type="text/css" href="display.css">
	</head>
	<body class=body>
	<div class=header>
		<img class=header src="ressources/header.png" alt=smb>
		<div class=header_titre>
			<a href="index.php" class=a alt=titre>TITRE</a>
		</div>
	</div>	
		<form action="connect.php" method="post" class=formulaire>
			<fieldset>
				<legend>connexion</legend>
				Identifiant:<input type=text autocomplete="off" name="login"><br>
				Mot de passe:<input type=text autocomplete="off" name="passwd"><br>
				<input type=submit name=submit value="Ok">
			</fieldset>
		</form>
		<?PHP
		include("form_add_user.php");
		?>
	</body>
</html>
