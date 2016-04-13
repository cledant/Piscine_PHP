<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Lannister {
	public function __construct() {
		print("A Lannister is born !" . PHP_EOL); 
	}
	public function getSize() {
		return "Average";
	}
	public function houseMotto() {
		return "Hear me roar!";
	}
}

include('Tyrion.class.php');

$tyrion = new Tyrion();

print($tyrion->getSize() . PHP_EOL);
print($tyrion->houseMotto() . PHP_EOL);
?>
