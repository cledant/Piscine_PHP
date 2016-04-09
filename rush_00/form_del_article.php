<?php
echo "<HTML><BODY>"."\n";
if (strcmp($_GET[resp],"OK") === 0)
{
	echo "Article supprime"."\n";
	echo "	<BR />"."\n";
}
else if (strcmp($_GET[resp],"fail") === 0)
{
	echo "Erreur suppression"."\n";
	echo "	<BR />"."\n";
}
else if (strcmp($_GET[resp],"already") === 0)
{
	echo "Article deja supprime"."\n";
	echo "	<BR />"."\n";
}
echo "<FORM action=\"del_article.php\" method=\"post\">"."\n";
echo "	ID : <INPUT type=\"text\" name=\"ID\" value=\"\" />"."\n";
echo "<INPUT type=\"submit\" name=\"submit\" value=\"OK\">"."\n";
echo "</FORM>"."\n";
echo "</BODY></HTML>"."\n";
?>
