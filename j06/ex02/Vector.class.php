<?php
require_once "Vertex.class.php";

Class Vector
{
	private $_x;
	private $_y;
	private	$_z;
	private $_norm_vec;
	private $_norm_rhs;
	private $_cos;
	private $_clone_norm_vec;
	private $_dest;
	private $_orig;
	private $_dot_product;
	private $_pr;
	private $_pg;
	private	$_pb;
	private $_px;
	private $_py;
	private	$_pz;
	private	$_pw;
	private $_w = 0.0;
	private $_vertex;
	private $_data_doc;
	private $_mag;

	public static $verbose = FALSE;
	public static function	doc()
	{
		$_data_doc = file_get_contents("Vector.doc.txt");
		return $_data_doc ;
	}
 
	public function __construct(array $kwargs)
	{
		$this->_dest = $kwargs["dest"];
		if (array_key_exists("orig", $kwargs))
			$this->_orig = $kwargs["orig"];
		else
			$this->_orig = new Vertex( array( 'x' => 0, 'y' => 0,
				'z' => 0, 'w' => 1) );
		$this->_x = $this->_dest->getx() - $this->_orig->getx();
		$this->_y = $this->_dest->gety() - $this->_orig->gety();
		$this->_z = $this->_dest->getz() - $this->_orig->getz();
		settype($this->_x, "float");
		settype($this->_y, "float");
		settype($this->_z, "float");
		settype($this->_w, "float");
		if (self::$verbose === TRUE)
		{
			echo "Vector( x: ";
			printf("%.2f", $this->_x);
			echo ", y: ";
			printf("%.2f", $this->_y);
			echo ", z: ";
			printf("%.2f", $this->_z);
			echo ", w: ";
			printf("%.2f", $this->_w);
			echo " ) constructed\n";
		}
	}

	public function magnitude()
	{
		$this->_mag = sqrt($this->_x * $this->_x + $this->_y * $this->_y + $this->_z * $this->_z);
		settype($this->_mag, "float");
		return ($this->_mag);
	}

	public function normalize()
	{
		$this->_norm_vec = new Vector (array("dest" => $this->_dest, "orig" => $this->_orig));
		$this->_clone_norm_vec = clone $this->_norm_vec;
		$this->_clone_norm_vec->_x /= magnitude();
		$this->_clone_norm_vec->_y /= magnitude();
		$this->_clone_norm_vec->_z /= magnitude();
	}

/*	public function add(Vector $rhs)
	{
		$this->_norm_vec = new Vector (array("dest" => $this->_dest, "orig" => $this->_orig));
		$this->_clone_norm_vec = clone $this->_norm_vec;
		$this->_clone_norm_vec->_x += $rhs->getx();
		$this->_clone_norm_vec->_y += $rhs->gety();
		$this->_clone_norm_vec->_z += $rhs->getz();
		return ($this->_clone_norm_vec);
	}

	public function sub(Vector $rhs)
	{
		$this->_norm_vec = new Vector (array("dest" => $this->_dest, "orig" => $this->_orig));
		$this->_clone_norm_vec = clone $this->_norm_vec;
		$this->_clone_norm_vec->_x -= $rhs->getx();
		$this->_clone_norm_vec->_y -= $rhs->gety();
		$this->_clone_norm_vec->_z -= $rhs->getz();
		return ($this->_clone_norm_vec);
	}

	public function opposite()
	{
		$this->_norm_vec = new Vector (array("dest" => $this->_dest, "orig" => $this->_orig));
		$this->_clone_norm_vec = clone $this->_norm_vec;
		$this->_clone_norm_vec->_x = -$this->_clone_norm_vec->getx();
		$this->_clone_norm_vec->_y = -$this->_clone_norm_vec->gety();
		$this->_clone_norm_vec->_z = -$this->_clone_norm_vec->getz();
		return ($this->_clone_norm_vec);
	}

	public function scalarProduct($k)
	{
		$this->_norm_vec = new Vector (array("dest" => $this->_dest, "orig" => $this->_orig));
		$this->_clone_norm_vec = clone $this->_norm_vec;
		$this->_clone_norm_vec->_x = $this->_clone_norm_vec->getx() * $k;
		$this->_clone_norm_vec->_y = $this->_clone_norm_vec->gety() * $k;
		$this->_clone_norm_vec->_z = $this->_clone_norm_vec->getz() * $k;
		return ($this->_clone_norm_vec);
	}

	public function dotProduct$(Vector $rhs)
	{
		$this->_dot_product = $this->_x * $rhs->getx() + $this->_y * $rhs->gety() + 
			$this->_z * $rhs->getz();
		settype($this->_dot_product);
		return ($this->_dot_product);
	}

	public function cos$(Vector $rhs)
	{
		$this->_dot_product = $this->_x * $rhs->getx() + $this->_y * $rhs->gety() + 
			$this->_z * $rhs->getz();
		$_cos = acos($this->_dot_product / (self->normalize() * $rhs->normalize()));
		settype($this->_dot_product);
		return ($this->_dot_product);
	}

	public function crossProduct$(Vector $rhs)
	{
		$this->_norm_vec = new Vector (array("dest" => $this->_dest, "orig" => $this->_orig));
		$this->_clone_norm_vec = clone $this->_norm_vec;
		$this->_clone_norm_vec->_x = $this->_y * $rhs->getz() - $this->_z * $rhs->gety();
		$this->_clone_norm_vec->_y = $this->_z * $rhs->getx() - $this->_x * $rhs->getz();
		$this->_clone_norm_vec->_z = $this->_x * $rhs->gety() - $this->_y * $rhs->getx();
		return ($this->_dot_product);
	}*/

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

	private function __clone()
	{
		return;
	}

	public function __toString()
	{
		$this->_px = number_format($this->_x, 2, ".", " ");
		$this->_py = number_format($this->_y, 2, ".", " ");
		$this->_pz = number_format($this->_z, 2, ".", " ");
		$this->_pw = number_format($this->_w, 2, ".", " ");
		if (self::$verbose === TRUE)
		{
			return "Vector( x: ".$this->_px.", y: ".$this->_py.", z: "
					.$this->_pz.", w: ".$this->_pw." )";
		}
	}

	public function __destruct()
	{
		if (self::$verbose === True)
		{
			echo "Vector( x: ";
			printf("%.2f", $this->_x);
			echo ", y: ";
			printf("%.2f", $this->_y);
			echo ", z: ";
			printf("%.2f", $this->_z);
			echo ", w: ";
			printf("%.2f", $this->_w);
			echo ") destructed\n";
		}
	}
 }
?>
