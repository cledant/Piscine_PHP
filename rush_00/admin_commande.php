<?php
session_start();
include("super.php");
if ($_POST["deco"] === "deconnexion")
	unset($_SESSION["ID"]);
if (isset($_SESSION["ID"]) !== TRUE)
	header("Location: index.php");
if (super() !== TRUE)
	header("Location: index.php");
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
			.below_header
			{
				width:900px;
				height:300px;
				background-color:#909090;
				margin-left:auto;
				margin-right:auto;
				border-radius:10px;
				border:10px;
				position:relative;
			}
			.header_titre
			{
				width=100%;
				position:absolute;
				top:10px;
				left:10px;
				font-size:200%;
				text-align:inline-block;
			}
			.deco
			{
				position:absolute;
				top:10px;
				right:10px;
				font-size:200%;
			}
		</style>
	</head>
	<body class=body>
		<div class=header>
			<img class=header src="ressources/header.png" alt=smb>
			<div class=header_titre>
				<a href="index.php" alt=titre>TITRE</a>
			</div>
<?PHP
				if (isset($_SESSION["ID"]))
				{
					echo "<form action='super_index.php' class=deco method='post'>";
					echo "<input type=submit name='deco' value='deconnexion'>";
					echo "</form>";
				}
?>
		</div><br>
		<div class=below_header>
<?php
	if (file_exists("bdd/user") === TRUE)
	{
		$data = file_get_contents("bdd/commande");
		$tab = unserialize($data);
		echo "<table>"."\n";
		foreach ($tab as $key => $value)
		{
			echo "<tr>"."\n";
			echo "<td>"."\n";
			echo "ID= "."\n";
			echo $key."\n";
			echo "		"."\n";
			echo "Login acheteur= "."\n";
			echo $value[IDuser]."\n";
			echo "		"."\n";
			echo "Article commandé= "."\n";
			foreach($value[IDarticles] as $display)
			{
				echo $display."\n";
				echo " ";
			}
			echo "		"."\n";
			echo "Montant= "."\n";
			echo $value[montant]."\n";
			echo "		"."\n";
			echo "Etat= "."\n";
			echo $value[etat]."\n";
			echo "		"."\n";
			echo "Existe= "."\n";
			echo $value[exist]."\n";
			echo "</td>"."\n";
			echo "</tr>"."\n";
		}
		echo "</table>"."\n";
	}
?>
		<a href="form_add_commande.php">Ajouter une commande</a>
		<a href="form_modif_commande.php">Modifier une commande</a>
		<a href="form_del_commande.php">Supprimer une commande</a>
		</div>
	</body>
</html>
