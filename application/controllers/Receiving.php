<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Receiving Controller
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
			$this->supplies->viewSupplies();
			
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
		
		//END NEW
		
		$transaction = "";
		
		$file = fopen("log.txt","w");
		fwrite($file,$log."<br/>");
		fclose($file);
		
		$myfile = fopen("log.txt", "r") or die("Unable to open file!");
		echo fread($myfile,filesize("log.txt"));
		fclose($myfile);

		$this->supplies->receiving_update_db();
		$this->render();
	}
	
	//Read information from the receipt log file
	public function readReceipt() {
		$myfile = fopen("log.txt", "r") or die("Unable to open file!");
		echo fread($myfile,filesize("log.txt"));
		fclose($myfile);
	}
}
