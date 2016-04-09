<?php
echo "<HTML><BODY>"."\n";
echo "<FORM action=\"add_categorie.php\"method=\"post\">"."\n";
if (strcmp($_GET[resp],"OK") === 0)
{
	echo "Categorie ajoute"."\n";
	echo "	<BR />"."\n";
}
else if (strcmp($_GET[resp],"fail") === 0)
{
	echo "Erreur ajout categorie"."\n";
	echo "	<BR />"."\n";
}
echo "	Categorie: <INPUT type=\"text\" name=\"categorie\" value=\"\" />"."\n";
echo "	<BR />"."\n";
echo "<INPUT type=\"submit\" name=\"submit\"value=\"OK\">"."\n";
echo "</FORM>"."\n";
echo "</BODY></HTML>"."\n";
?>
