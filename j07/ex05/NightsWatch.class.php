<?php

Class NightsWatch
{
	private $_list;

	public function __construct()
	{
		settype($this->_list, "array");
		return;
	}

	public function recruit($v)
	{
		$this->_list[] = $v;
	}

	public function fight()
	{
		foreach ($this->_list as $warrior)
		{
			if ($warrior instanceof IFighter)
				$warrior->fight();
		}
	}
}

?>
