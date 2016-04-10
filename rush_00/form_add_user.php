<?php
session_start();
if (strcmp($_GET[resp],"OK") === 0)
{
	echo "Bienvenue !";
}
else if (strcmp($_GET[resp],"fail") === 0)
{
	echo "Erreur ajout utilisateur"."\n";
}
else
{?>
	<html>
		<head>
			<style>
				.body{background-color:#505050;}
				.formu{width:50%;margin-left:auto;margin-right:auto;}
			</style>
		</head>
		<body class=body>	
			<form action="add_user.php" method="post">
			<fieldset>
				<legend>Inscription</legend>
				Identifiant: <INPUT type="text" name="login"><br>
				Mot de passe: <INPUT type="text" name="passwd"><br>
				Email: <INPUT type="text" name="email"><br>
				Telephone: <INPUT type="text" name="phone"><br>
				Adresse: <INPUT type="text" name="adress"><br>
				<INPUT type="submit" name="submit" value="OK"><br>
			</fieldset>
			</FORM>
		</body>
	</HTML>
<?PHP
}
?>
