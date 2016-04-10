<?php
echo "<HTML><BODY>"."\n";
if (strcmp($_GET[resp],"OK") === 0)
{
	echo "Commande modifiée"."\n";
	echo "	<BR />"."\n";
}
else if (strcmp($_GET[resp],"fail") === 0)
{
	echo "Erreur modification commande"."\n";
	echo "	<BR />"."\n";
}
echo "<FORM action=\"modif_commande.php\" method=\"post\">"."\n";
echo "	ID commande: <INPUT type=\"text\" name=\"ID\" value=\"\" />"."\n";
echo "	<BR />"."\n";
echo "	ID user: <INPUT type=\"text\" name=\"IDuser\" value=\"\" />"."\n";
echo "	<BR />"."\n";
echo "	ID article: <INPUT type=\"text\" name=\"IDarticles\" value=\"\" />"."\n";
echo "	<BR />"."\n";
echo "	Montant: <INPUT type=\"text\" name=\"montant\" value=\"\" />"."\n";
echo "	<BR />"."\n";
echo "	Etat: <INPUT type=\"text\" name=\"etat\" value=\"\" />"."\n";
echo "	<BR />"."\n";
echo "	Existe: <INPUT type=\"text\" name=\"exist\" value=\"\" />"."\n";
echo "<INPUT type=\"submit\" name=\"submit\" value=\"OK\">"."\n";
echo "</FORM>"."\n";
echo "</BODY></HTML>"."\n";
?>
