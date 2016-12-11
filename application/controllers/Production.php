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

    /**
     * Index
     * @return type
     */
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

    /**
     * Get info for one recipe
     * @param type $id
     */
    public function gimme($id) {
        $this->data['pagebody'] = 'ingredients';
        $this->load->model('supplies');
        $this->load->model('recipes');
        // get the ingredients for the recipe
        $source = $this->recipes->getIngre($id);
        $ingredients = array();
        foreach ($source as $record) {
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

    /**
     * Make product
     */
    public function makeProduct() {
        $this->data['pagebody'] = 'produce';

        $quantity = $_GET['production_quantity/' . $_GET['id']];
        $name = $this->recipes->getRecipeName($_GET['id']);

        $log = $quantity . " of " . $name . " is produced.";


        $transaction = "";

        $this->recipes->transaction($log);

        $logger[] = array('transaction_msg' => $log);
        $this->data['transaction'] = $logger;

        $this->stock->produce_update_db();
        $this->render();
    }

}
