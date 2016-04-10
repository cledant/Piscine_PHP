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
	if (file_exists("bdd/article") === TRUE)
	{
		$data = file_get_contents("bdd/article");
		$tab = unserialize($data);
		echo "<table>"."\n";
		foreach ($tab as $key => $value)
		{
			echo "<tr>"."\n";
			echo "<td>"."\n";
			echo "ID= "."\n";
			echo $key."\n";
			echo "		"."\n";
			echo "Nom= "."\n";
			echo $value[nom]."\n";
			echo "		"."\n";
			echo "Path image= "."\n";
			echo $value[image]."\n";
			echo "		"."\n";
			echo "Description= "."\n";
			echo $value[description]."\n";
			echo "		"."\n";
			echo "ID categories= "."\n";
			foreach($value[categories] as $disp)
			{
				echo $disp."\n";
				echo " ";
			}
			echo "		"."\n";
			echo "Prix = "."\n";
			echo $value[price]."\n";
			echo "		"."\n";
			echo "Stock= "."\n";
			echo $value[stock]."\n";
			echo "		"."\n";
			echo "Existe= "."\n";
			echo $value[exist]."\n";
			echo "</td>"."\n";
			echo "</tr>"."\n";
		}
		echo "</table>"."\n";
	}
?>
		<a href="form_add_article.php">Ajouter un article</a>
		<a href="form_modif_article.php">Modifier un article</a>
		<a href="form_del_article.php">Supprimer un article</a>
		</div>
	</body>
</html>
