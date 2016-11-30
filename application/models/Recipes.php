<?php

/*
 * The list of raw materials that go into the creation of one product for sale or one service offered. 
 * With sample values in brackets ... a recipe code (Refresh), a description (Sharpen concentration, 
 * increase stamina, and revitalize your senses), and the recipe ingredients (1 Spearmint, 1 Lavendar,
 * 1 Eucalyptus, 1 Lemon, 0.5 Rosewood, 0.5 Cedarwood).
 */
class Recipes extends CI_Model{
    //Initialize the array of recipes
    var $data = array(
                array(
                    'code' => '0',
                    'name' => 'Refresh',
                    'description' => 'Sharpen concentration, increase stamina, and revitalize your senses',
                    'ingredients' => array(
                        'item1' => array(
                            'name' => 'Spearmint',
                            'amount' => '1'
                        ),
                        'item2' => array(
                            'name' => 'Lavendar',
                            'amount' => '1'
                        ), 
                        'item3' => array(
                            'name' => 'Eucalyptus',
                            'amount' => '1'
                        ),
                        'item4' => array(
                            'name' => 'Lemon',
                            'amount' => '1'
                        ),
                        'item5' => array(
                            'name' => 'Rosewood',
                            'amount' => '.5'
                        ),
                        'item6' => array(
                            'name' => 'Cedarwood',
                            'amount' => '.5'
                        )
                    )
                ),
                array(
                    'code' => '1', 
                    'name' => 'Cloud Nine', 
                    'description' => 'Lift your spirits',
                    'ingredients' => array(
                        'item1' => array(
                            'name' => 'Lavendar',
                            'amount' => '2'
                        ),
                        'item2' => array(
                            'name' => 'Ylang ylang',
                            'amount' => '1'
                        ), 
                        'item3' => array(
                            'name' => 'Neroli',
                            'amount' => '1'
                        ),
                        'item4' => array(
                            'name' => 'Sandalwood',
                            'amount' => '1'
                        )
                    )
                ),
                array(
                    'code' => '2',
                    'name' => 'Energy',
                    'description' => 'Invigorate and refresh your mind and body', 
                    'ingredients' => array(
                        'item1' => array(
                            'name' => 'Peppermint',
                            'amount' => '1.5'
                        ),
                        'item2' => array(
                            'name' => 'Rosemary',
                            'amount' => '1'
                        ), 
                        'item3' => array(
                            'name' => 'Lemon',
                            'amount' => '1'
                        ),
                        'item4' => array(
                            'name' => 'Bergamot',
                            'amount' => '1'
                        ),
                        'item5' => array(
                            'name' => 'Basil',
                            'amount' => '.5'
                        )
                    )
                ),           
                array(
                    'code' => '3', 
                    'name' => 'Exhale', 
                    'description' => 'An exhilarating essential oil blend that renews and strengthens', 
                    'ingredients' => array(
                        'item1' => array(
                            'name' => 'Eucalyptus',
                            'amount' => '2'
                        ),
                        'item2' => array(
                            'name' => 'Peppermint',
                            'amount' => '1.5'
                        ), 
                        'item3' => array(
                            'name' => 'Rosemary',
                            'amount' => '1'
                        ),
                        'item4' => array(
                            'name' => 'Ginger',
                            'amount' => '.5'
                        )
                    )
                ),
                array(
                    'code' => '4',
                    'name' => 'Citrus Dream',
                    'description' => 'For promoting a sense of calmness and positivity',
                    'ingredients' => array(
                        'item1' => array(
                            'name' => 'Orange',
                            'amount' => '2.5'
                        ),
                        'item2' => array(
                            'name' => 'Grapefruit',
                            'amount' => '1'
                        ), 
                        'item3' => array(
                            'name' => 'Lemon',
                            'amount' => '1'
                        ),
                        'item4' => array(
                            'name' => 'Neroli',
                            'amount' => '.5'
                        )
                    )
                ),
                array(
                    'code' => '5',
                    'name' => 'Tranquility',
                    'description' => 'For a deeper, more restful sleep',
                    'ingredients' => array(
                        'item1' => array(
                            'name' => 'Orange',
                            'amount' => '1.5'
                        ),
                        'item2' => array(
                            'name' => 'Lavendar',
                            'amount' => '1.5'
                        ), 
                        'item3' => array(
                            'name' => 'Marjoram',
                            'amount' => '1'
                        ),
                        'item4' => array(
                            'name' => 'Chamomile',
                            'amount' => '1'
                        )
                    )
                ),
                array(
                    'code' => '6',
                    'name' => 'Unwind',
                    'description' => 'Melt away stress and ease tension with this uplifting blend',
                    'ingredients' => array(
                        'item1' => array(
                            'name' => 'Orange',
                            'amount' => '2'
                        ),
                        'item2' => array(
                            'name' => 'Lavendar',
                            'amount' => '1.5'
                        ), 
                        'item3' => array(
                            'name' => 'Bergamot',
                            'amount' => '1'
                        ),
                        'item4' => array(
                            'name' => 'Geranium',
                            'amount' => '.5'
                        )
                    )
                )
    );
        
    /**
    * Constructor
    */
    public function __construct()
    {
        parent::__construct();
    }
        
    /**
    * Retrieve a single recipe by code
    * @param $code
    * @return $record
    */
    public function get($code)
    {
        // iterate over the data until we find the one we want
        foreach ($this->data as $record)
            if ($record['code'] == $code)
                return $record;
        return null;
    }
       
    /**
    * Retrieve all of the recipes
    * @return $this->data
    */
    public function all()
    {
        return $this->data;
    }
}
