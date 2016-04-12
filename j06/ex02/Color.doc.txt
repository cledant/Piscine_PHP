<?php

Class Color
{
	private	$_rgb = 0;
	private $_hexa_rgb = 0;
	private $_dec_rgb = 0;
	private $_array_split;
	private	$_data_doc;
	private	$_tmp_red;
	private	$_tmp_green;
	private	$_tmp_blue;
	public static $verbose = FALSE;
	public	$red = 0;
	public	$greem = 0;
	public	$blue = 0;

	public static function	doc()
	{
		$_data_doc = file_get_contents("Color.doc.txt");
		return $_data_doc ;
	}

	public function __construct(array $kwargs)
	{
		if (array_key_exists("rgb", $kwargs))
		{
			$this->_dec_rgb = $kwargs["rgb"];
			$this->_hexa_rgb = dechex($this->_dec_rgb);
			if (strlen($this->_hexa_rgb) < 6)
			{
				$this->_hexa_rgb = str_pad($this->_hexa_rgb, 6 , "0", STR_PAD_LEFT);
			}
			$this->_array_split = str_split($this->_hexa_rgb, 2);
			$this->red = hexdec($this->_array_split[0]);
			$this->green = hexdec($this->_array_split[1]);
			$this->blue = hexdec($this->_array_split[2]); 
		}
		else
		{
			if (array_key_exists("red", $kwargs))
				$this->red = $kwargs["red"];
			if (array_key_exists("green", $kwargs))
				$this->green = $kwargs["green"];
			if (array_key_exists("blue", $kwargs))
				$this->blue = $kwargs["blue"];
		}
		settype($this->red, "integer");
		settype($this->green, "integer");
		settype($this->blue, "integer");
		if (self::$verbose === TRUE)
		{
			$this->red = str_pad($this->red, 3 , " ", STR_PAD_LEFT);
			$this->green = str_pad($this->green, 3 , " ", STR_PAD_LEFT);
			$this->blue = str_pad($this->blue, 3 , " ", STR_PAD_LEFT);
			echo "COLOR( red: ".$this->red.", green: ".$this->green.", blue: "
				.$this->blue." ) constructed.\n";
		}
	}

	public function	add(Color $rhs)
	{
		$this->_tmp_red = $this->red + $rhs->red;
		$this->_tmp_green = $this->green + $rhs->green;
		$this->_tmp_blue = $this->blue + $rhs->blue;
		return (new Color ( array( "red" => $this->_tmp_red, "green" => $this->_tmp_green,
			"blue" => $this->_tmp_blue)));
	}

	public function	sub(Color $rhs)
	{
		$this->_tmp_red = $this->red - $rhs->red;
		$this->_tmp_green = $this->green - $rhs->green;
		$this->_tmp_blue = $this->blue - $rhs->blue;
		return (new Color ( array( "red" => $this->_tmp_red, "green" => $this->_tmp_green,
			"blue" => $this->_tmp_blue)));
	}

	public function	mult($f)
	{
		$this->_tmp_red = $this->red * $f;
		$this->_tmp_green = $this->green * $f;
		$this->_tmp_blue = $this->blue * $f;
		return (new Color ( array( "red" => $this->_tmp_red, "green" => $this->_tmp_green,
			"blue" => $this->_tmp_blue)));
	}

	public function __toString()
	{
		$this->red = str_pad($this->red, 3 , " ", STR_PAD_LEFT);
		$this->green = str_pad($this->green, 3 , " ", STR_PAD_LEFT);
		$this->blue = str_pad($this->blue, 3 , " ", STR_PAD_LEFT);
		return "COLOR( red: ".$this->red.", green: ".$this->green.", blue: "
			.$this->blue." )";
	}

	public function __destruct()
	{
		if (self::$verbose == TRUE)
		{
			$this->red = str_pad($this->red, 3 , " ", STR_PAD_LEFT);
			$this->green = str_pad($this->green, 3 , " ", STR_PAD_LEFT);
			$this->blue = str_pad($this->blue, 3 , " ", STR_PAD_LEFT);
			echo "COLOR( red: ".$this->red.", green: ".$this->green.", blue: "
				.$this->blue." ) destructed.\n";
		}
	}
 }
?>
