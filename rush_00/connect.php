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
		$hash = hash(Whirlpool, $_POST["passwd"]);
		foreach($tab as $key => $value)
		{
			if (strcmp($value["login"], $_POST["login"] === 0))
			{
				if (strcmp($value["passwd"], $hash) === 0)
				{
					$_SESSION["ID"] = $key;
					header("Location: index.php");
					return 1;
				}
				else
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
		<style>
			.body {background-color:#505050;}
			.formulaire
			{
				width:50%;
				margin-left:auto;
				margin-right:auto;
			}
			.header
			{
				width:900px;
				height:150px;
				background-color:#909090;
				margin-left:auto;
				margin-right:auto;
				border-radius:10px;
				position:relative;
			}
		</style>
	</head>
	<body class=body>
	<div class=header>
		<img class=header src="ressources/entete.jpg" alt=smb>
		<div class=header_titre>
			<a href="index.php" alt=titre>TITRE</a>
		</div>
	</div>	
		<form action="connect.php" method="post" class=formulaire>
			<fieldset>
				<legend>connexion</legend>
				Identifiant:<input type=text autocomplete="off" name="login"><br>
				Mot de passe:<input type=text autocomplete="off" name="passwd"><br>
				<input type=submit name=submit value="Ok">
			</fieldset>
			<a href="form_add_user.php" alt=inscription>Inscription</a>
		</form>
	</body>
</html>
