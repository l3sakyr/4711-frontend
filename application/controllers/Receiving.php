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
		
		$file = fopen("log.txt","w");
		fwrite($file,$log."<br/>");
		fclose($file);
		
		$myfile = fopen("log.txt", "r") or die("Unable to open file!");
		echo fread($myfile,filesize("log.txt"));
		fclose($myfile);
	}
	
	//Read information from the receipt log file
	public function readReceipt() {
		$myfile = fopen("log.txt", "r") or die("Unable to open file!");
		echo fread($myfile,filesize("log.txt"));
		fclose($myfile);
	}
	
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
}
