<?php
session_start();
echo "<HTML><BODY>"."\n";
if (strcmp($_GET[resp],"OK") === 0)
{
	echo "Utilisateur modifie"."\n";
	echo "	<BR />"."\n";
}
else if (strcmp($_GET[resp],"fail") === 0)
{
	echo "Erreur modification utilisateur"."\n";
	echo "	<BR />"."\n";
}
echo "<FORM action=\"mod_user.php\" method=\"post\">"."\n";
echo "	Identifiant: <INPUT type=\"text\" name=\"login\" value=\"\" />"."\n";
echo "	<BR />"."\n";
echo "	E-mail: <INPUT type=\"text\" name=\"email\" value=\"\" />"."\n";
echo "	<BR />"."\n";
echo "	Telephone: <INPUT type=\"text\" name=\"phone\" value=\"\" />"."\n";
echo "	<BR />"."\n";
echo "	Adresse: <INPUT type=\"text\" name=\"adress\" value=\"\" />"."\n";
echo "	<BR />"."\n";
echo "	Existe: <INPUT type=\"text\" name=\"exist\" value=\"\" />"."\n";
echo "<INPUT type=\"submit\" name=\"submit\" value=\"OK\">"."\n";
echo "</FORM>"."\n";
echo "</BODY></HTML>"."\n";
?>
