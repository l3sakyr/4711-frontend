<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * The production page should show recipes, and for the selected one, show the ingredients
 * that go into it, flagging any that are not on hand. Log any items made, without updating inventory.
 */
class Production extends Application 
{
    /**
     * constructor
     */
    function __construct()
    {
        parent::__construct();
        
    }
        
	public function index()
	{
            $this->load->model('recipes');
            $this->data['pagebody'] = 'production';
            
            // build the list of authors, to pass on to our view
            $source = $this->recipes->all();
            $recipes = array ();
            foreach ($source as $record)
            {
                $recipes[] = array ('code' => $record['code'],
                                    'name' => $record['name']
                                   );
                // ~Not sure about this part!!!!
                $recipIngre[] = array ('ingredients' => $record['ingredients']);
            }
            
            $this->data['recipes'] = $recipes;
            
            $this->render();
	}
        
        public function gimme($id)
        {
            $this->data['pagebody'] = 'ingredients';	//views/ingridents	
            $source = $this->recipes->get($id);
            $this->data = array_merge($this->data, $source);
            $this->render();
        }
}
