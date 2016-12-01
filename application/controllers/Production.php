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
            //$recipIngre = array ();
            foreach ($source as $record)
            {
                $recipes[] = array ('code' => $record['code'],
                                    'name' => $record['name'],
                                    'ingredients' => $record['ingredients']
                                   );
                // ~Not sure about this part!!!!
                //$recipIngre[] = array ('ingredients' => $record['ingredients']);
            }
            
            $this->data['recipes'] = $recipes;
            
            $this->render();
	}
        
        
        public function gimme($id)
        {
            $this->data['pagebody'] = 'ingredients';
            
            
            $recipe = $this->recipes->get($id);
            $source = $this->recipes->getIngre($id);
            $template = array(
                'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="mytable">'
            );

            $this->table->set_template($template);
            $this->table->set_heading('Ingredients','Amount');
            
            $this->load->library('table');
            
            $result = array();
            foreach($source as $item){
                array_push($result,$item);
            }
            
            $res = $this->table->generate($result);
            
            $this->data['result'] = $res;
            $this->data = array_merge($this->data, $result, $recipe);
            $this->render();
        }
        
/**
        public function get($code){
            //the pagebody of the ingredients and amounts to make an item/recipe
            $this->data['pagebody'] = 'ingredients';
            
            //
            $source = $this->recipes->get($code);
            $recipes[] = array('id' => $source['code'],
                                              'name' => $source['name'],
                                              'description' => $source['dscription'],
                                              'ingredients' => $source['ingredients']);  
            $this->data['recipes'] = $recipes;
            $this->render();
        }
 * 
 */
}
