<?php
echo "<HTML><BODY>"."\n";
if (strcmp($_GET[resp],"OK") === 0)
{
	echo "Mot de passe modifie"."\n";
	echo "	<BR />"."\n";
}
else if (strcmp($_GET[resp],"fail") === 0)
{
	echo "Erreur modification mot de passe"."\n";
	echo "	<BR />"."\n";
}
echo "<FORM action=\"mod_user_passwd.php\" method=\"post\">"."\n";
echo "	Identifiant: <INPUT type=\"text\" name=\"login\" value=\"\" />"."\n";
echo "	<BR />"."\n";
echo "	Ancien mot de passe: <INPUT type=\"text\" name=\"oldpw\" value=\"\" />"."\n";
echo "	<BR />"."\n";
echo "	Nouveau mot de passe: <INPUT type=\"text\" name=\"newpw\" value=\"\" />"."\n";
echo "<INPUT type=\"submit\" name=\"submit\" value=\"OK\">"."\n";
echo "</FORM>"."\n";
echo "</BODY></HTML>"."\n";
?>
