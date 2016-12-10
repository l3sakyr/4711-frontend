<?php

/*
 * The raw materials that you might keep in a pantry . With sample values in brackets ... 
 * these will have a code of some sort (0), a description (Lavendar oil), a receiving unit 
 * (case of 12 bottles), a receiving cost ($ per unit), a stocking unit (5mL bottles), and 
 * quantities on hand. You will need to deal with partial units (eg an open jar).
 */
class Supplies extends CI_Model{
	
	/**
         * Constructor
         */
	public function __construct()
	{
		parent::__construct();
	}
        
        /**
         * Retrieve a single supply by code
         * @param $code
         * @return $record
         */
	public function get($id)
	{
		//SQL
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "a2Database";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "SELECT * FROM supplies WHERE code <=> " . $id . ";";
		$result = $conn->query($sql);
		$conn->close();
		//SQL//
		return $result;
	}
	
	    /**
         * Retrieve a single name by code
         * @param $code
         * @return $record['name']
         */
	public function getName($id)
	{
		//SQL
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "a2Database";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "SELECT name FROM supplies WHERE code <=> " . $id . ";";

		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				//echo "<br> name: " . $row["name"] ."<br>";
				$name = $row["name"];
			}
		} else {
			echo "0 results";
		}
		$conn->close();
		//SQL//
		return $name;
	}
	
	// gets the receiving cost from the database
	public function getRc() {
		//SQL
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "a2Database";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "SELECT receiving_cost FROM supplies WHERE code <=> " . $_GET['id'] . ";";

		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$rc = $row["receiving_cost"];
			}
		} else {
			echo "0 results";
		}
		$conn->close();
		//SQL//
		return $rc;
	}
	
	// Retrieves and displays everything from the supplies table
	public function all() {
		//SQL
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "a2Database";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "SELECT * FROM supplies";
		$result = $conn->query($sql);
		$conn->close();
		//SQL//
		return $result;
	}
	
	public function transaction($log)
	{
		//SQL
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "a2Database";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "INSERT INTO transaction (receiving_transaction) VALUES('" . $log. "');";
		
		if ($conn->query($sql) === TRUE) {
			//echo "New record created successfully";
		} else {
			//echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
		//SQL//
	}
	
	/*
	 *	Updates the quantity in the database after calculating how much to add.
	 */
	public function receiving_update_db() {
		//SQL
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "a2Database";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		
		// quantity = input of order_quantity * select of regex(receiving_amount)
		// Retrieves and temporarily stores the value of Receiving Unit.
		$ru_sql = "SELECT receiving_amount FROM supplies WHERE code <=> " . $_GET['id'] . ";";
		$result = $conn->query($ru_sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$pattern = '/\d+/';
				preg_match($pattern, $row["receiving_amount"], $matches);
			}
		} else {
			echo "0 results";
		}
		
		// Calculates the quantity in terms of stock
		$quantity = $_GET['receiving_amount/'.$_GET['id']] * $matches[0];
		
		// Modifies the database value of quantity
		$sql = "UPDATE supplies SET quantity = quantity + " . $quantity . " WHERE code <=>" . $_GET['id'] . ";";
		$result = $conn->query($sql);
		
		// Displays the Quantity after the modification
		$sql = "SELECT quantity from supplies where code <=> " . $_GET['id'] . ";";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$pattern = '/\d+/';
				preg_match($pattern, $row["quantity"], $matches);
			}
		} else {
			echo "0 results";
		}
		
		if (mysqli_query($conn, $sql)) {
			//echo "Record updated successfully";
		} else {
			echo "Error updating record: " . mysqli_error($conn);
		}
		$conn->close();
		//SQL//
	}
        
        function rules() {
            $config = [
                ['field'=>'code', 'label'=>'Menu code', 'rules'=> 'required|integer'],
                ['field'=>'name', 'label'=>'Item name', 'rules'=> 'required'],
                ['field'=>'description', 'label'=>'Item description', 'rules'=> 'required|max_length[256]'],
                ['field'=>'measuring_units', 'label'=>'Measuring units', 'rules'=> 'required|max_length[256]'],
                ['field'=>'receiving_cost', 'label'=>'Receiving cost', 'rules'=> 'required|real'],
                ['field'=>'quantity', 'label'=>'Quantity', 'rules'=> 'required|real']
            ];
            return $config;
        }
}
