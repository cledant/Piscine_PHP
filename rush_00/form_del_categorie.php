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
	echo "Categorie supprime"."\n";
	echo "	<BR />"."\n";
}
else if (strcmp($_GET[resp],"fail") === 0)
{
	echo "Erreur suppression"."\n";
	echo "	<BR />"."\n";
}
else if (strcmp($_GET[resp],"already") === 0)
{
	echo "Categorie deja supprime"."\n";
	echo "	<BR />"."\n";
}
echo "<FORM action=\"del_categorie.php\" method=\"post\">"."\n";
echo "	ID : <INPUT type=\"text\" name=\"ID\" value=\"\" />"."\n";
echo "<INPUT type=\"submit\" name=\"submit\" value=\"OK\">"."\n";
echo "</FORM>"."\n";
echo "</BODY></HTML>"."\n";
?>
