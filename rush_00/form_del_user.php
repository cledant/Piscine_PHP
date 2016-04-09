<?php
echo "<HTML><BODY>"."\n";
if (strcmp($_GET[resp],"OK") === 0)
{
	echo "Utilisateur supprime"."\n";
	echo "	<BR />"."\n";
}
else if (strcmp($_GET[resp],"fail") === 0)
{
	echo "Erreur suppression"."\n";
	echo "	<BR />"."\n";
}
else if (strcmp($_GET[resp],"already") === 0)
{
	echo "Utilisateur deja supprime"."\n";
	echo "	<BR />"."\n";
}
else if (strcmp($_GET[resp],"NO") === 0)
{
	echo "On ne delete pas les admins"."\n";
	echo "	<BR />"."\n";
}
echo "<FORM action=\"del_user.php\" method=\"post\">"."\n";
echo "	ID : <INPUT type=\"text\" name=\"ID\" value=\"\" />"."\n";
echo "<INPUT type=\"submit\" name=\"submit\" value=\"OK\">"."\n";
echo "</FORM>"."\n";
echo "</BODY></HTML>"."\n";
?>
