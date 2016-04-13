<?php

Class Jaime extends Lannister
{
	public function sleepWith($v)
	{
		$name = get_class($v);
		if (strcmp($name, "Tyrion") === 0)
			echo "Not even if I'm drunk !\n";
		else if (strcmp($name, "Cersei") === 0)
			echo "With pleasure, but only in a tower im Winterfell, then.\n";
		else
			echo "Lets's do this.\n";
	}
}
?>
