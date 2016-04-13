<?php

Class Targaryen
{
	public function resistsFire()
	{
		return False;
	}

	public function getBurned()
	{
		if ($this->resistsFire() == False)
			return "bruns alive";
		else
			return "emerges naked but unharmed";
	}
}

?>
