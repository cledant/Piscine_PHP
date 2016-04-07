<?php
if (strcmp($_SERVER[PHP_AUTH_USER], "zaz") === 0 && strcmp($_SERVER[PHP_AUTH_PW], "jaimelespetitsponeys") === 0)
{
	header("Content-Type : image/png");
	$data = file_get_contents("../img/42.png");
	$data = base64_encode($data);
	echo "<html><body>";
	echo "Bonjour Zaz<br />";
	echo "<img src='data:image/png;base64,".$data."'>";
	echo "</body></html>";
}
else
{
	echo "<html><body>Cette zone est accessible uniquement aux membres du site</body></html>";
}
?>

