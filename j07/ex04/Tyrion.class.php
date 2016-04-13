<?php

Class Tyrion extends Lannister
{
	public function sleepWith($v)
	{
		$name = get_class($v);
		if (strcmp($name, "Jaime") === 0)
			echo "Not even if I'm drunk !\n";
		else if (strcmp($name, "Cersei") === 0)
			echo "Not even if I'm drunk !\n";
		else
			echo "Lets's do this.\n";
	}
}
?>
