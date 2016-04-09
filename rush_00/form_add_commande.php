<?php
echo "<HTML><BODY>"."\n";
if (strcmp($_GET[resp],"OK") === 0)
{
	echo "Commande ajoutee"."\n";
	echo "	<BR />"."\n";
}
else if (strcmp($_GET[resp],"fail") === 0)
{
	echo "Erreur ajout commande"."\n";
	echo "	<BR />"."\n";
}
echo "<FORM action=\"add_commande.php\" method=\"post\">"."\n";
echo "	IDuser : <INPUT type=\"text\" name=\"IDuser\" value=\"\" />"."\n";
echo "	<BR />"."\n";
echo "	IDarticles : <INPUT type=\"text\" name=\"IDarticles\" value=\"\" />"."\n";
echo "	<BR />"."\n";
echo "	Montant : <INPUT type=\"text\" name=\"montant\" value=\"\" />"."\n";
echo "	<BR />"."\n";
echo "	Etat : <INPUT type=\"text\" name=\"etat\" value=\"\" />"."\n";
echo "<INPUT type=\"submit\" name=\"submit\" value=\"OK\">"."\n";
echo "</FORM>"."\n";
echo "</BODY></HTML>"."\n";
?>
