<?php

Class UnholyFactory
{
	private $_abs_soldier = FALSE;
	private $_abs_assasin = FALSE;
	private $_abs_archer = FALSE;
	private $_nb_soldier = 0;
	private $_nb_archer = 0;
	private $_nb_assasin = 0;
	private $_nb_llama = 0;
	private $_list_soldier;
	private $_list_archer;
	private $_list_assasin;

	public function __construct()
	{
		return ;
	}

	public function absorb($v)
	{
		if ($v instanceof Fighter)
		{
			if ($this->_abs_soldier === FALSE && strcmp(get_class($v), "Footsoldier") === 0)
			{
				$this->_abs_soldier = TRUE;
				$this->_list_soldier[$this->_nb_soldier] = $v;
				$this->_nb_soldier = $this->_nb_soldier + 1;
				echo "(Factory absorbed a fighter of type foot soldier)\n";
			}
			else if ($this->_abs_soldier === TRUE && strcmp(get_class($v), "Footsoldier") === 0)
			{
				$this->_list_soldier[$this->_nb_soldier] = $v;
				$this->_nb_soldier = $this->_nb_soldier + 1;
				echo "(Factory already absorbed a fighter of type foot soldier)\n";		
			}
			else if ($this->_abs_archer === FALSE && strcmp(get_class($v), "Archer") === 0)
			{
				$this->_abs_archer = TRUE;
				$this->_list_archer[$this->_nb_archer] = $v;
				$this->_nb_archer = $this->_nb_archer + 1;
				echo "(Factory absorbed a fighter of type archer)\n";
			}
			else if ($this->_abs_archer === TRUE && strcmp(get_class($v), "Archer") === 0)
			{
				$this->_list_archer[$this->_nb_archer] = $v;
				$this->_nb_archer = $this->_nb_archer + 1;
				echo "(Factory already absorbed a fighter of type archer)\n";		
			}
			else if ($this->_abs_assasin === FALSE && strcmp(get_class($v), "Assassin") === 0)
			{
				$this->_abs_assasin = TRUE;
				$this->_list_assasin[$this->_nb_assasin] = $v;
				$this->_nb_assasin = $this->_nb_assasin + 1;
				echo "(Factory absorbed a fighter of type assassin)\n";
			}
			else if ($this->_abs_assasin === TRUE && strcmp(get_class($v), "Assassin") === 0)
			{
				$this->_list_assasin[$this->_nb_assasin] = $v;
				$this->_nb_assasin = $this->_nb_assasin + 1;
				echo "(Factory already absorbed a fighter of type foot assassin)\n";		
			}
		}
		else
			echo "(Factory can't absorb this, it's not a fighter)\n";
	}

	public function fabricate($v)
	{
		if(strcmp($v, "foot soldier") === 0)
		{
			if ($this->_nb_soldier !== 0)
			{
				echo "(Factory fabricates a fighter of type foot soldier)\n";
				foreach ($this->_list_soldier as $key => $value)
				{
					$tmp = $value;
					return $tmp;
				}
			}
			else
			{
				echo "(Factory hasn't absorbed any fighter of type foot soldier)\n";
				return NULL;
			}
		}
		else if(strcmp($v, "archer") === 0)
		{
			if ($this->_nb_archer !== 0)
			{
				echo "(Factory fabricates a fighter of type archer)\n";
				foreach ($this->_list_archer as $key => $value)
				{
					$tmp = $value;
					return $tmp;
				}
			}
			else
			{
				echo "(Factory hasn't absorbed any fighter of type archer)\n";
				return NULL;
			}
		}
		else if(strcmp($v, "assassin") === 0)
		{
			if ($this->_nb_assasin !== 0)
			{
				echo "(Factory fabricates a fighter of type assassin)\n";
				foreach ($this->_list_assasin as $key => $value)
				{
					$tmp = $value;
					return $tmp;
				}
			}
			else
			{
				echo "(Factory hasn't absorbed any fighter of type assassin)\n";
				return NULL;
			}
		}
		else if(strcmp($v, "llama") === 0)
		{
			echo "(Factory hasn't absorbed any fighter of type llama)\n";
			return NULL;
		}
	}
}

?>
