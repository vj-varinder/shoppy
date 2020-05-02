<?php
class Database{
	// public means the attribute can be accessed from outside the class
	//VALUES of following vaiables are set with constants defined in config.php file
	//values can be directly used here but it is not a good suggestion

	public $host=DB_HOST;
	public $username=DB_USER;
	public $password=DB_PASS;
	public $db_name=DB_NAME;

	public $link;	// $link represents the mysql object
	public $error;	//error property for giving errors

	//__construct is a constructot in php.  it will assign the above defined variablees
	// to this class using 'this'  operator
	//we are using this technique so that all becomes the properties of class and not just of function
	//because class properties can be accessed outside of the class due to public
	/*
	  *	class constuctor
	*/
	public function __construct()
	{

		///calll connect function
		// using 'this' function can be called from other function
		$this->connect();
	}
	/*
	* connector-------connect function
	*/
	private function connect()
	{
		//to display error while conneccting the particular database
		$this->link=new mysqli($this->host,$this->username,$this->password,$this->db_name);
		if(!$this->link)
		{
			//$this->link->connect_error; will give actual sql error
			$this->error="connection failed".$this->link->connect_error;
		}
	}
	/*
	*	select
	*/
	public function select($query)
	{
		$result=$this->link->query($query) or die($this->link->error.__LINE__);
		if($result->num_rows >0)	// to find number of rows in query
			{ return $result;}
		else
			{ return false; }
	}

	/* insert*/
	public function insert($query)
	{
		$insert_row= $this->link->query($query) or die($this->link->error.__LINE__);

		//validate insert
		if($insert_row)
		{
			//header("Location: index.php?msg=".urlencode('Record Added'));
			// exit();
			return true;
		}
		else
		{
			die('error: ('. $this->link->error .')'.$this->link->error);
		}
	}
	/* update*/
	public function update($query)
	{
		$update_row= $this->link->query($query) or die($this->link->error.__LINE__);

		//validate insert
		if($update_row)
		{
			// header("Location: index.php?msg=".urlencode('Record updates'));
			// exit();
			return true;
		}
		else
		{
			die('error: ('. $this->link->error .')'.$this->link->error);
		}
	}
	/* delete*/
	public function delete($query)
	{
		$delete_row= $this->link->query($query) or die($this->link->error.__LINE__);

		//validate insert
		if($delete_row)
		{
			// header("Location: index.php?msg=".urlencode('Record deleted'));
			return true;
		}
		else
		{
			die('error: ('. $this->link->error .')'.$this->link->error);
		}
	}
}

$db= new Database;	// instantiating the object of class Database
