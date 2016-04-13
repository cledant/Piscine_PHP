<?php

abstract Class Fighter
{
	public $name_type;

	abstract public function fight($v);

	public function __construct($v)
	{
		$this->name_type = $v;
		return;
	}
}

?>
