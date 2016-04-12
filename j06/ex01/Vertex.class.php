<?php
require_once "Color.class.php";

Class Vertex
{
	private $_x;
	private $_y;
	private	$_z;
	private $_pr;
	private $_pg;
	private	$_pb;
	private $_px;
	private $_py;
	private	$_pz;
	private	$_pw;
	private $_w = 1.0;
	private $_color;
	private $_data_doc;

	public static $verbose = FALSE;
	public static function	doc()
	{
		$_data_doc = file_get_contents("Vertex.doc.txt");
		return $_data_doc ;
	}
 
	public function __construct(array $kwargs)
	{
		$this->_x = $kwargs["x"];
		$this->_y = $kwargs["y"];
		$this->_z = $kwargs["z"];
		if (array_key_exists("w", $kwargs))
			$this->_w = $kwargs["w"];
		if (array_key_exists("color", $kwargs))
			$this->_color = $kwargs["color"];
		else
			$this->_color = new Color( array( 'red' => 255, 'green' => 255,
				'blue' => 255) );
		settype($this->_x, "float");
		settype($this->_y, "float");
		settype($this->_z, "float");
		settype($this->_w, "float");
		if (self::$verbose === TRUE)
		{
			$this->_pr = str_pad($this->_color->red, 3 , " ", STR_PAD_LEFT);
			$this->_pg = str_pad($this->_color->green, 3 , " ", STR_PAD_LEFT);
			$this->_pb = str_pad($this->_color->blue, 3 , " ", STR_PAD_LEFT);
			echo "Vertex( x: ";
			printf("%.2f", $this->_x);
			echo ", y: ";
			printf("%.2f", $this->_y);
			echo ", z: ";
			printf("%.2f", $this->_z);
			echo ", w: ";
			printf("%.2f", $this->_w);
			echo ", Color( red: ".$this->_pr.", green: ".$this->_pg.
				", blue: ".$this->_pb." ) ) constructed\n";
		}
	}

	public function getx()
	{
		return ($this->_x);
	}

	public function gety()
	{
		return ($this->_y);
	}

	public function getz()
	{
		return ($this->_z);
	}

	public function getw()
	{
		return ($this->_w);
	}

	public function getcolor()
	{
		return ($this->_color);
	}

	public function setx($v)
	{
		$this->_x = $v;
	}

	public function sety($v)
	{
		$this->_y = $v;
	}

	public function setz($v)
	{
		$this->_z = $v;
	}

	public function setw($v)
	{
		$this->_w = $v;
	}

	public function setcolor($v)
	{
		$this->_color = $v;
	}

	public function __toString()
	{
		$this->_px = number_format($this->_x, 2, ".", " ");
		$this->_py = number_format($this->_y, 2, ".", " ");
		$this->_pz = number_format($this->_z, 2, ".", " ");
		$this->_pw = number_format($this->_w, 2, ".", " ");
		if (self::$verbose === TRUE)
		{
			$this->_pr = str_pad($this->_color->red, 3 , " ", STR_PAD_LEFT);
			$this->_pg = str_pad($this->_color->green, 3 , " ", STR_PAD_LEFT);
			$this->_pb = str_pad($this->_color->blue, 3 , " ", STR_PAD_LEFT);
			return "Vertex( x: ".$this->_px.", y: ".$this->_py.", z: "
					.$this->_pz.", w: ".$this->_pw.", Color( red: ".$this->_pr.
					", green: ".$this->_pg.", blue: ".$this->_pb.
					" ) )";
		}
		else if (self::$verbose === FALSE)
		{
			return "Vertex( x: ".$this->_px.", y: ".$this->_py.", z: "
					.$this->_pz.", w: ".$this->_pw." )";
		}
	}

	public function __destruct()
	{
		if (self::$verbose == TRUE)
		{
			$this->_pr = str_pad($this->_color->red, 3 , " ", STR_PAD_LEFT);
			$this->_pg = str_pad($this->_color->green, 3 , " ", STR_PAD_LEFT);
			$this->_pb = str_pad($this->_color->blue, 3 , " ", STR_PAD_LEFT);
			echo "Vertex( x: ";
			printf("%.2f", $this->_x);
			echo ", y: ";
			printf("%.2f", $this->_y);
			echo ", z: ";
			printf("%.2f", $this->_z);
			echo ", w: ";
			printf("%.2f", $this->_w);
			echo ", Color( red: ".$this->_pr.", green: ".$this->_pg.
				", blue: ".$this->_pb." ) ) destructed\n";
		}
	}
 }
?>
