<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Sales page should show a menu of purchaseable items, with description 
 * & price for each. The goal of this page is to build an order with 
 * multiple items, and to log the transaction that would result if 
 * the sale proceeded for real.
 */
class Sales extends Application
{
    
        /**
         * Default Constructor
         */
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Homepage for our app
	 */
	public function index()
	{
            $this->load->model('stock');
            $this->data['pagebody'] = 'sales';

            // build the list of authors, to pass on to our view
            $source = $this->stock->all(); 
            $stock = array ();
            foreach ($source as $record)
            {
                    $stock[] = array (
                        'code' => $record['code'], 
                        'name' => $record['name'], 
                        'description' => $record['description'], 
                        'quantity' => $record['quantity'], 
                        'price' => $record['price']);
            }
            $this->data['stock'] = $stock;

            $this->render();
	}
        
        public function gimme($id)
        {
            $this->data['pagebody'] = 'justone';		
            $source = $this->stock->get($id);
            $this->data = array_merge($this->data, $source);
            $this->render();
        }
        
}