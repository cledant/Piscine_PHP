<?php

function send_fail()
{
	echo "Site deja installe\n";
	exit;
}

function send_ok()
{
	echo "Site installe\n";
	exit;
}

if (strcmp($_GET["install"], "moi") === 0)
{
	if (file_exists("./bdd") === TRUE)
	{
		if (file_exists("./bdd/user") === TRUE)
			send_fail();
		if (file_exists("./bdd/article") === TRUE)
			send_fail();
		if (file_exists("./bdd/categorie") === TRUE)
			send_fail();
		if (file_exists("./bdd/commande") === TRUE)
			send_fail();
	}
	else
	{
		if (mkdir("./bdd", 0700, TRUE) !== TRUE)
		{
			send_fail();
		}
	}
	//BDD user
	$hash = hash("whirlpool", superadmin);
	$account = array("login"=>admin, "passwd"=>$hash, "user_type"=> 0,
		"email"=> "n/a", "phone" =>"n/a", "adress" =>"n/a", "exist" => 1);
	$tab_data = array(0 => $account);
	$new_data = serialize($tab_data);
	if (!(file_put_contents("./bdd/user", $new_data)))
	{
		send_fail();
	}
	//BDD article
	$article = array(
		"nom" => "Hotline Miami",
		"image" => "ressources/hotline-miami.jpg",
		"description"=> "Jeu d'action mettant en scène un tueur masqué ultra-violent dans un jeu au look néon très influencé par les 80s, et rythmé par une bande sonore electro.",
		"categories" => array(0 => 0, 1=> 1),
		"stock" => 1,
		"price" => "18.99",
		"exist" => 1);
	
	$article2 = array(
		"nom" => "Super Meat Boy",
		"image" => "ressources/superboy.jpg",
		"description" => "Vous incarnez dans ce jeu plateformes un cube de viande animé tentant de sauver sa petite amie d'un fœtus maléfique portant un smoking dans un bocal.",
		"categories" => array(0 => 2, 1=> 3),
		"stock" => 1,
		"price" => "24.99",
		"exist" => 1);

	$tab[0] = $article;
	$tab[1] = $article2;
	if (!(file_put_contents("bdd/article", serialize($tab))))
		send_fail();
	unset($tab[1]);
	//BDD categorie
	$tab[0] = array("nom" => "2010", "exist" => 1);
	$tab[1] = array("nom" => "Dennaton Games", "exist" => 1);
	$tab[2]	= array("nom" => "2012","exist" => 1);
	$tab[3] = array("nom" => "Team Meat","exist" => 1);
	if (!(file_put_contents("bdd/categorie", serialize($tab))))
	{
		send_fail();
	}
	unset($tab[1]);
	unset($tab[2]);
	unset($tab[3]);
	//BDD commande
	$article = array(
		"IDuser" => "0",
		"IDarticles" => array(0 => 0, 1 => 1),//TAB
		"montant"=> "0",
		"etat" => "Example",
		"exist" => 0);
	$tab[0] = $article;
	if (!(file_put_contents("bdd/commande", serialize($tab))))
	{
		send_fail();
	}
	send_ok();
}
