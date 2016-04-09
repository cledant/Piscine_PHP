<?php
echo "<HTML><BODY>"."\n";
if (strcmp($_GET[resp],"OK") === 0)
{
	echo "Article ajoute"."\n";
	echo "	<BR />"."\n";
}
else if (strcmp($_GET[resp],"fail") === 0)
{
	echo "Erreur ajout article"."\n";
	echo "	<BR />"."\n";
}
echo "<FORM action=\"add_article.php\" method=\"post\">"."\n";
echo "	Nom : <INPUT type=\"text\" name=\"nom\" value=\"\" />"."\n";
echo "	<BR />"."\n";
echo "	Image : <INPUT type=\"text\" name=\"image\" value=\"\" />"."\n";
echo "	<BR />"."\n";
echo "	Description : <INPUT type=\"text\" name=\"description\" value=\"\" />"."\n";
echo "	<BR />"."\n";
echo "	Categories: <INPUT type=\"text\" name=\"categorie\" value=\"\" />"."\n";
echo "	<BR />"."\n";
echo "	Stock : <INPUT type=\"text\" name=\"stock\" value=\"\" />"."\n";
echo "	<BR />"."\n";
echo "	Existe : <INPUT type=\"text\" name=\"exist\" value=\"\" />"."\n";
echo "<INPUT type=\"submit\" name=\"submit\" value=\"OK\">"."\n";
echo "</FORM>"."\n";
echo "</BODY></HTML>"."\n";
?>
