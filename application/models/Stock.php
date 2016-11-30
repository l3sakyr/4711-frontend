<?php

/*
 * Assembled goods or services ready to sell. Again with sample values ... a recipe code
 * (Refresh), a description (Sharpen concentration, increase stamina, and revitalize your
 * senses), a selling price ($14.95), quantity on hand if pre-made (4).
 */
class Stock extends CI_Model{
    //Initialize the array of stock
    var $data = array(
		array(
                    'code' => '0', 
                    'name' => 'Refresh', 
                    'description' => 'Sharpen concentration, increase stamina, and revitalize your senses',  
                    'quantity' => '4', 
                    'price' => '$14.95'),
                array(
                    'code' => '1', 
                    'name' => 'Cloud Nine', 
                    'description' => 'Lift your spirits', 
                    'quantity' => '7', 
                    'price' => '$16.45'),
                array(
                    'code' => '2', 
                    'name' => 'Energy', 
                    'description' => 'Invigorate and refresh your mind and body',  
                    'quantity' => '5', 
                    'price' => '$18.45'),
                array(
                    'code' => '3', 
                    'name' => 'Exhale', 
                    'description' => 'An exhilarating essential oil blend that renews and strengthens',  
                    'quantity' => '4', 
                    'price' => '$12.95'),
                array(
                    'code' => '4', 
                    'name' => 'Citrus Dream', 
                    'description' => 'For promoting a sense of calmness and positivity',  
                    'quantity' => '9', 
                    'price' => '$16.95'),
                array(
                    'code' => '5', 
                    'name' => 'Tranquility', 
                    'description' => 'For a deeper, more restful sleep',  
                    'quantity' => '5', 
                    'price' => '$12.45'),
                array(
                    'code' => '6', 
                    'name' => 'Unwind', 
                    'description' => 'Melt away stress and ease tension with this uplifting blend', 
                    'quantity' => '7', 
                    'price' => '$19.45')
        );

	/**
         * Constructor
         */
	public function __construct()
	{
		parent::__construct();
	}
        
        /**
         * Retrieve a single stock by code
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
         * Retrieve all of the stock
         * @return $this->data
         */
	public function all()
	{
		return $this->data;
	}
}
