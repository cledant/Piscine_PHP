#!/usr/bin/php
<?php
$my_val = $argv[1];

function checkoddeven($p1)
{
	if ($p1 % 2 == 0)
		echo "Le chiffre ".$p1." est Pair\n";
	else
		echo "Le chiffre ".$p1." est Impair\n";
}

echo "Entrez un nombre: ";
$read = fgets(STDIN);
$read = rtrim($read);
if (is_numeric($read) == "TRUE")
	checkoddeven($read);
else
	echo $read." n'est pas un chiffre\n";
?>
