<?php
session_start();
include("super.php");
if (isset($_SESSION["ID"]) !== TRUE)
	header("Location: index.php");
if (super() !== TRUE)
	header("Location: index.php");

echo "<HTML><BODY>"."\n";
if (strcmp($_GET[resp],"OK") === 0)
{
	echo "Categorie modifié"."\n";
	echo "	<BR />"."\n";
}
else if (strcmp($_GET[resp],"fail") === 0)
{
	echo "Erreur modification categorie"."\n";
	echo "	<BR />"."\n";
}
echo "<FORM action=\"modif_categorie.php\" method=\"post\">"."\n";
echo "	ID: <INPUT type=\"text\" name=\"ID\" value=\"\" />"."\n";
echo "	<BR />"."\n";
echo "	Nom: <INPUT type=\"text\" name=\"nom\" value=\"\" />"."\n";
echo "<INPUT type=\"submit\" name=\"submit\" value=\"OK\">"."\n";
echo "</FORM>"."\n";
echo "</BODY></HTML>"."\n";
?>
