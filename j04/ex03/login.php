<?php
include ("auth.php");
session_start();
$can_log = auth($_GET[login], $_GET[passwd]);
if ($can_log == TRUE)
{
	$_SESSION[loggued_on_user] = $_GET[login];
	echo "OK\n";
}
else
{
	$_SESSION[loggued_on_user] = "";
	echo "ERROR\n";
}
?>
