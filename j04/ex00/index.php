<?php
session_start();
if (strcmp($_GET[submit],"OK") === 0)
{
	$_SESSION[l_val] = $_GET[login];
	$_SESSION[p_val] = $_GET[passwd];
}
if ($_SESSION[l_val] !== NULL)
	$s_l_val = $_SESSION[l_val];
if ($_SESSION[p_val] !== NULL)
	$s_p_val = $_SESSION[p_val];
echo "<HTML><BODY>"."\n";
echo "<FORM method=\"get\">"."\n";
echo "	Identifiant: <INPUT type=\"text\" name=\"login\" value=\"$s_l_val\" />"."\n";
echo "	<BR />"."\n";
echo "	Mot de passe: <INPUT type=\"text\" name=\"passwd\" value=\"$s_p_val\" />"."\n";
echo "<INPUT type=\"submit\" name=\"submit\" value=\"OK\">"."\n";
echo "</FORM>"."\n";
echo "</BODY></HTML>"."\n";
?>
