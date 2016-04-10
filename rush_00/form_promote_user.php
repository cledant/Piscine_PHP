<?php
echo "<HTML><BODY>"."\n";
if (strcmp($_GET[resp],"OK") === 0)
{
	echo "Utilisateur promote admin"."\n";
	echo "	<BR />"."\n";
}
else if (strcmp($_GET[resp],"fail") === 0)
{
	echo "Erreur de promote"."\n";
	echo "	<BR />"."\n";
}
else if (strcmp($_GET[resp],"already") === 0)
{
	echo "Utilisateur deja admin"."\n";
	echo "	<BR />"."\n";
}

echo "<FORM action=\"promote_user.php\" method=\"post\">"."\n";
echo "	ID : <INPUT type=\"text\" name=\"ID\" value=\"\" />"."\n";
echo "<INPUT type=\"submit\" name=\"submit\" value=\"OK\">"."\n";
echo "</FORM>"."\n";
echo "</BODY></HTML>"."\n";
?>
