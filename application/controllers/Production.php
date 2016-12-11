<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * The production page should show recipes, and for the selected one, show the ingredients
 * that go into it, flagging any that are not on hand. Log any items made, without updating inventory.
 */
class Production extends Application {

    /**
     * constructor
     */
    function __construct() {
        parent::__construct();
    }

    public function index() {
        $userrole = $this->session->userdata('userrole');
        if ($userrole == 'guest') {
            $message = 'You are not authorized to access this page. Go away';
            $this->data['content'] = $message;
            $this->render();
            return;
        }
        $this->load->model('recipes');
        $this->data['pagebody'] = 'production';

        // build the list of authors, to pass on to our view
        $source = $this->recipes->all();
        $recipes = array();
        //$recipIngre = array ();
        foreach ($source as $record) {
            $recipes[] = array('code' => $record['code'],
                'name' => $record['name'],
                'description' => $record['description']
            );
        }

        $this->data['recipes'] = $recipes;


        $this->render();
    }

//    public function gimme($id) {
//        $this->data['pagebody'] = 'ingredients';
//
//
//        $recipe = $this->recipes->get($id);
//        $source = $this->recipes->getIngre($id);
//        $template = array(
//            'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="mytable">'
//        );
//
//        $this->load->library('table');
//        $this->table->set_template($template);
//        $this->table->set_heading('Ingredient', 'Amount', 'Measuring Unit');
//
//
//        $result = array();
//        foreach ($source as $item) {
//            array_push($result, $item);
//        }
//
//        $res = $this->table->generate($result);
//
//        $this->data['result'] = $res;
//        $this->data = array_merge($this->data, $result, $recipe);
//        $this->render();
//    }
    
    public function gimme($id){
        $this->data['pagebody'] = 'ingredients';
        $this->load->model('supplies');
        $this->load->model('recipes');
        // get the ingredients for the recipe
        $source = $this->recipes->getIngre($id);
        $ingredients = array();
        foreach ($source as $record){
            $ingredients[] = array(
                'code' => $record['code'],
                'supplyCode' => $record['supplyCode'],
                'recipeCode' => $record['recipeCode'],
                'supplyName' => $this->supplies->getName($record['supplyCode']),
                'measuring_units' => $record['measuring_units'],
                'amount' => $record['amount']
            );
        }
        $this->data['ingredients'] = $ingredients;
        
        // get the recipe
        $source = $this->recipes->get($id);
        $recipes = array();
        foreach ($source as $record) {
            $recipes[] = array(
                'code' => $record['code'],
                'name' => $record['name'],
                'description' => $record['description']
            );
        }
        
        $this->data = array_merge($this->data, $recipes);
        $this->data['recipes'] = $recipes;

        $this->render();
    }

    public function makeProduct() {
        $this->data['pagebody'] = 'produce';
        
        $quantity = $_GET['production_quantity/'.$_GET['id']];
        $name = $this->recipes->getRecipeName($_GET['id']);
        
        $log = $quantity . " of " . $name . " is produced";
        
        $this->data['production'] = $log;

        $this->stock->produce_update_db();
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
