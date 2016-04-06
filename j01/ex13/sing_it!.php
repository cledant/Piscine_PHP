#!/usr/bin/php
<?php
if (strcmp($argv[1], "mais pourquoi cette demo ?") == 0)
{
	echo "Tout simplement pour qu'en feuilletant le sujet"."\n";
	echo "on ne s'apercoive pas de la nature de l'exo"."\n";
}
else if (strcmp($argv[1], "mais pourquoi cette chanson ?") == 0)
	echo "Parce que Kwame a des enfants"."\n";
else if (strcmp($argv[1], "vraiment ?") == 0)
{
	$nb = rand(1, 2);
	if ($nb == 1)
		echo "Nan c'est parce que c'est le premier avril"."\n";
	else
		echo "Oui il a vraiment des enfants"."\n";
}
?>
