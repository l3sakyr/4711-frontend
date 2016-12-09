<?php

/*
 * The raw materials that you might keep in a pantry . With sample values in brackets ... 
 * these will have a code of some sort (0), a description (Lavendar oil), a receiving unit 
 * (case of 12 bottles), a receiving cost ($ per unit), a stocking unit (5mL bottles), and 
 * quantities on hand. You will need to deal with partial units (eg an open jar).
 */
class Supplies extends CI_Model{
    
    // Initialize the array of supplies
    var $data = array(
		array(
                    'code' => '0', 
                    'name' => 'Lavendar', 
                    'description' => 'Lavendar oil', 
                    'receiving_unit' => 'case of 12 bottles', 
                    'receiving_cost' => '$30',
                    'stocking_unit' => '5mL bottles', 
                    'quantity' => '6'),
                array(
                    'code' => '1', 
                    'name' => 'Eucalyptus', 
                    'description' => 'Eucalyptus oil', 
                    'receiving_unit' => 'case of 10 bottles', 
                    'receiving_cost' => '$35',
                    'stocking_unit' => '5mL bottles', 
                    'quantity' => '6'),
                array(
                    'code' => '2', 
                    'name' => 'Lemon', 
                    'description' => 'Lemon oil', 
                    'receiving_unit' => 'case of 12 bottles', 
                    'receiving_cost' => '$30',
                    'stocking_unit' => '5mL bottles', 
                    'quantity' => '6'),
                array(
                    'code' => '3', 
                    'name' => 'Orange', 
                    'description' => 'Orange oil', 
                    'receiving_unit' => 'case of 8 bottles', 
                    'receiving_cost' => '$40',
                    'stocking_unit' => '5mL bottles', 
                    'quantity' => '6'),
                array(
                    'code' => '4', 
                    'name' => 'Grapefruit', 
                    'description' => 'Grapefruit oil', 
                    'receiving_unit' => 'case of 10 bottles', 
                    'receiving_cost' => '$25',
                    'stocking_unit' => '5mL bottles', 
                    'quantity' => '6'),
                array(
                    'code' => '5', 
                    'name' => 'Ylang ylang', 
                    'description' => 'Ylang ylang oil', 
                    'receiving_unit' => 'case of 12 bottles', 
                    'receiving_cost' => '$30',
                    'stocking_unit' => '5mL bottles', 
                    'quantity' => '6'),
                array(
                    'code' => '6', 
                    'name' => 'Geranium', 
                    'description' => 'Geranium oil', 
                    'receiving_unit' => 'case of 10 bottles', 
                    'receiving_cost' => '$30',
                    'stocking_unit' => '5mL bottles', 
                    'quantity' => '6'),
                array(
                    'code' => '7', 
                    'name' => 'Rosemary', 
                    'description' => 'Rosemary oil', 
                    'receiving_unit' => 'case of 14 bottles', 
                    'receiving_cost' => '$50',
                    'stocking_unit' => '5mL bottles', 
                    'quantity' => '6'),
                array(
                    'code' => '8', 
                    'name' => 'Peppermint', 
                    'description' => 'Peppermint oil', 
                    'receiving_unit' => 'case of 12 bottles', 
                    'receiving_cost' => '$28',
                    'stocking_unit' => '5mL bottles', 
                    'quantity' => '6'),
                array(
                    'code' => '9', 
                    'name' => 'Sandalwood', 
                    'description' => 'Sandalwood oil', 
                    'receiving_unit' => 'case of 10 bottles', 
                    'receiving_cost' => '$50',
                    'stocking_unit' => '5mL bottles', 
                    'quantity' => '6'),
                array(
                    'code' => '10', 
                    'name' => 'Neroli', 
                    'description' => 'Neroli oil', 
                    'receiving_unit' => 'case of 12 bottles', 
                    'receiving_cost' => '$42',
                    'stocking_unit' => '5mL bottles', 
                    'quantity' => '6'),
                array(
                    'code' => '11', 
                    'name' => 'Spearmint', 
                    'description' => 'Spearmint oil', 
                    'receiving_unit' => 'case of 8 bottles', 
                    'receiving_cost' => '$50',
                    'stocking_unit' => '5mL bottles', 
                    'quantity' => '6'),
                array(
                    'code' => '12', 
                    'name' => 'Bergamot', 
                    'description' => 'Bergamot oil', 
                    'receiving_unit' => 'case of 12 bottles', 
                    'receiving_cost' => '$50',
                    'stocking_unit' => '5mL bottles', 
                    'quantity' => '6'),
                array(
                    'code' => '13', 
                    'name' => 'Cedarwood', 
                    'description' => 'Cedarwood oil', 
                    'receiving_unit' => 
                    'case of 8 bottles', 
                    'receiving_cost' => '$38',
                    'stocking_unit' => '5mL bottles', 
                    'quantity' => '6'),
                array(
                    'code' => '14', 
                    'name' => 'Chamomile', 
                    'description' => 'Chamomile oil', 
                    'receiving_unit' => 'case of 8 bottles', 
                    'receiving_cost' => '$26',
                    'stocking_unit' => '5mL bottles', 
                    'quantity' => '6'),
                array(
                    'code' => '15', 
                    'name' => 'Rosewood', 
                    'description' => 'Rosewood oil', 
                    'receiving_unit' => 'case of 8 bottles', 
                    'receiving_cost' => '$52',
                    'stocking_unit' => '5mL bottles',
                    'quantity' => '6'),
                array(
                    'code' => '16',
                    'name' => 'Ginger',
                    'description' => 'Ginger oil',
                    'receiving_unit' => 'case of 12 bottles',
                    'receiving_cost' => '$32',
                    'stocking_unit' => '5mL bottles', 
                    'quantity' => '6'),
                array(
                    'code' => '17', 
                    'name' => 'Marjoram', 
                    'description' => 'Marjoram oil', 
                    'receiving_unit' => 'case of 12 bottles', 
                    'receiving_cost' => '$30',
                    'stocking_unit' => '5mL bottles', 
                    'quantity' => '6'),
                array(
                    'code' => '18', 
                    'name' => 'Basil', 
                    'description' => 'Basil oil', 
                    'receiving_unit' => 'case of 10 bottles', 
                    'receiving_cost' => '$42',
                    'stocking_unit' => '5mL bottles', 
                    'quantity' => '6',)
        );

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
		// iterate over the data until we find the one we want
		foreach ($this->data as $record)
			if ($record['code'] == $id)
				return $record;
		return null;
	}
	
	    /**
         * Retrieve a single name by code
         * @param $code
         * @return $record['name']
         */
	public function getName($id)
	{
		// iterate over the data until we find the one we want
		foreach ($this->data as $record)
			if ($record['code'] == $id)
				return $record['name'];
		return null;
	}

        /**
         * Adjust the quantity of a supply item
         * @param type $code
         * @param type $amount
         */
        /*
		 * for next Assignment
		public function adjustQuantity($code, $amount){
            get($code)->quantity += $amount;
        }
        */
        
        public function getSupplyWithName($name){
            // iterate over the data until we find the one we want
		foreach ($this->data as $record)
			if ($record['name'] == $name)
				return $record;
		return null;
        }
        
	/**
         * Returns the array
         * @return type array
         */
	public function all()
	{
		return $this->data;
	}
	
	// Retrieves and displays everything from the supplies table
	public function viewSupplies() {
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

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo "<br>code: " . $row["code"]. "<br> name: " . $row["name"]. "<br> description: " . $row["description"] . "<br> receiving_cost: " . $row["receiving_cost"] . "<br> receiving_unit: " . $row["receiving_unit"] . "<br> stocking_unit: " . $row["stocking_unit"] . "<br> quantity: " . $row["quantity"] ."<br>";
			}
		} else {
			echo "0 results";
		}
		$conn->close();
		//SQL//
	}
	
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
				//echo "<br>RU: " . $row["receiving_unit"]. "<br>  ";
				$pattern = '/\d+/';
				preg_match($pattern, $row["receiving_amount"], $matches);
				//echo "<br>RU VAL post regex: " . $matches[0] ."<br>";
			}
		} else {
			echo "0 results";
		}
		
		// Calculates the quantity in terms of stock
		$quantity = $_GET['receiving_amount/'.$_GET['id']] * $matches[0];
		//echo "<br>Receiving Quantity: " . $quantity;
		
		// Modifies the database value of quantity
		$sql = "UPDATE supplies SET quantity = quantity + " . $quantity . " WHERE code <=>" . $_GET['id'] . ";";
		$result = $conn->query($sql);
		
		// Displays the Quantity after the modification
		$sql = "SELECT quantity from supplies where code <=> " . $_GET['id'] . ";";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				//echo "<br>New Quantity: " . $row["quantity"]. "<br>  ";
				$pattern = '/\d+/';
				preg_match($pattern, $row["quantity"], $matches);
				//echo "<br>" . $matches[0] ."<br>";
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
}
