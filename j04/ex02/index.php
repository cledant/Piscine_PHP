<?php
echo "<HTML><BODY>"."\n";
echo "<FORM action=\"modif.php\" method=\"post\">"."\n";
echo "	Identifiant: <INPUT type=\"text\" name=\"login\" value=\"\" />"."\n";
echo "	<BR />"."\n";
echo "	Ancien mot de passe: <INPUT type=\"text\" name=\"oldpw\" value=\"\" />"."\n";
echo "	<BR />"."\n";
echo "	Nouveau mot de passe: <INPUT type=\"text\" name=\"newpw\" value=\"\" />"."\n";
echo "<INPUT type=\"submit\" name=\"submit\" value=\"OK\">"."\n";
echo "</FORM>"."\n";
echo "</BODY></HTML>"."\n";
?>
