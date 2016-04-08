<?php
session_start();
if ($_SESSION[loggued_on_user] == NULL || strcmp($_SESSION[loggued_on_user], "") === 0)
	echo "ERROR\n";
else
	echo $_SESSION[loggued_on_user]."\n";
?>
