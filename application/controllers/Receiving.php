<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Receiving Controller
 *
 * @author Theresa
 */
class Receiving extends Application
{
        /**
         * Default Constructor
         */
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * loads receiving page
	 */
	public function index()
	{
            $this->load->model('supplies');
            $this->data['pagebody'] = 'receiving';

            // gets a list of supplies
            $source = $this->supplies->all();
            $supplies = array ();
            foreach ($source as $record)
            {
                    $supplies[] = array ('code' => $record['code'],
                                        'name' => $record['name'],
					'description' => $record['description'], 'receiving_unit' => $record['receiving_unit'],
					'receiving_cost' => $record['receiving_cost'], 'stocking_unit' => $record['stocking_unit'],
					'quantity' => $record['quantity']);
            }
            $this->data['supplies'] = $supplies;
			
			// View DB supplies
			$this->viewSupplies();
			
            $this->render();
            
	}
	
	public function gimme($id)
    {
        $this->data['pagebody'] = 'justoneR';		
        $source = $this->supplies->get($id);
        $this->data = array_merge($this->data, $source);
        $this->render();
    }
	
	
	// gets the cost of the supply
	public function getCost() {
		$this->load->model('supplies');
        // gets a list of supplies
        $source = $this->supplies->all();
        $supplies = array ();
			
		// compares the supply code to the list
        foreach ($source as $record)
        {
			if($_GET['id'] == $record['code']) {
				$price = floatval(preg_replace('/[^0-9.+]/', '', $record['receiving_cost']));
			}
        }

		return $price;
	}

	// logs the transaction to a file and writes to it
	// reads and shows the file output 
	public function receipt() {
		$this->data['pagebody'] = 'order';
		$quantity = $_GET['receiving_unit/'.$_GET['id']];
		$name = $this->supplies->getName($_GET['id']);
		$totalCost = $this->getCost() * $_GET['receiving_unit/'.$_GET['id']];
		
		$log = $quantity . " " . $name . "(s) was received at the cost of $" . $totalCost . ".";
		
		//NEW
		$log .= "<br/> Extra: " . $_GET['id'];
		/*
		foreach($_POST as $name => $content) { // Most people refer to $key => $value
			//echo "The HTML name: $name <br>";
			$log .= $content;
		}
		*/
		
		//END NEW
		
		$transaction = "";
		
		$file = fopen("log.txt","w");
		fwrite($file,$log."<br/>");
		fclose($file);
		
		$myfile = fopen("log.txt", "r") or die("Unable to open file!");
		echo fread($myfile,filesize("log.txt"));
		//$transaction = fread($myfile,filesize("log.txt"));
		fclose($myfile);
		
		//$supplies = array ($transaction);

		//$this->data = array_merge($this->data, $supplies);
		$this->receiving_update_db();
		$this->render();
	}
	
	//Read information from the receipt log file
	public function readReceipt() {
		$myfile = fopen("log.txt", "r") or die("Unable to open file!");
		echo fread($myfile,filesize("log.txt"));
		fclose($myfile);
	}
	
	// Retrieves and displays everything from the supplies table
	public function viewSupplies() {
		//SQL
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "supplies";

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
		$dbname = "supplies";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		
		// quantity = input of order_quantity * select of regex(receiving_unit)
		// Retrieves and temporarily stores the value of Receiving Unit.
		$ru_sql = "SELECT receiving_unit FROM supplies WHERE code <=> " . $_GET['id'] . ";";
		$result = $conn->query($ru_sql);
				
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo "<br>RU: " . $row["receiving_unit"]. "<br>  ";
				$pattern = '/\d+/';
				preg_match($pattern, $row["receiving_unit"], $matches);
				echo "<br>RU VAL post regex: " . $matches[0] ."<br>";
			}
		} else {
			echo "0 results";
		}
		
		// Calculates the quantity in terms of stock
		$quantity = $_GET['receiving_unit/'.$_GET['id']] * $matches[0];
		echo "<br>Quant: " . $quantity;
		
		// Modifies the database value of quantity
		$sql = "UPDATE supplies SET quantity = quantity + " . $quantity . ";";
		$result = $conn->query($sql);
		
		// Displays the Quantity after the modification
		$sql = "SELECT quantity from supplies where code <=> " . $_GET['id'] . ";";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo "<br>QQquantity: " . $row["quantity"]. "<br>  ";
				$pattern = '/\d+/';
				preg_match($pattern, $row["quantity"], $matches);
				echo "<br>" . $matches[0] ."<br>";
			}
		} else {
			echo "0 results";
		}
		
		if (mysqli_query($conn, $sql)) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . mysqli_error($conn);
		}
		$conn->close();
		//SQL//
	}
	
	/*
	// logs the cost for total cost of supplies
	// adds 1000 for testing purposes
	public function totalCost() {
		$cost = $this->getCost();
		$file2 = fopen("log2.txt","w");
		fwrite($file2,$cost+1000);
		fclose($file2);
		
		$myfile2 = fopen("log2.txt", "r") or die("Unable to open file!");
		$total = 0;
		$total = fread($myfile2,filesize("log2.txt"));
		
		echo "Total Price:" . $total;
		fclose($myfile2);
	}
	*/
}
