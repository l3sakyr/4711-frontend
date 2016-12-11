<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Administrator page should provide for editing all of the data tables. This could
 * be presenting each as an HTML table, with "edit" & "delete" buttons beside each row, 
 * and with an additional "add" button somewhere. You could provide a tabbed interface, 
 * with a different tab for each table. You could provide a drill-down interface, where
 * the main administrator page had links to further pages for each table. The recipe table
 * will be the most complicated!
 *
 * You do not need to implement any CRUD, just build & display the HTML forms that
 * will be used for that.
 */
class Administration extends Application {

    /**
     * Default Constructor
     */
    function __construct() {
        parent::__construct();
    }

    /**
     * Homepage for our app
     */
    public function index() {
        $userrole = $this->session->userdata('userrole');
        if ($userrole != 'admin') {
            $message = 'You are not authorized to access this page. Go away';
            $this->data['content'] = $message;
            $this->render();
            return;
        }
        // this is the view we want shown
        $this->data['pagebody'] = 'administration';

        $this->render();
    }

    /**
     * Show all supplies
     */
    public function supplies() {
        $this->load->model('supplies');
        $this->data['pagebody'] = 'supplies';

        $source = $this->supplies->all();
        $supplies = array();
        foreach ($source as $record) {
            $supplies[] = array(
                'code' => $record['code'],
                'name' => $record['name'],
                'description' => $record['description']
            );
        }
        $this->data['supplies'] = $supplies;

        $this->render();
    }

    /**
     * Edit a supply
     * When code is null, a new supply is being added
     * @param type $code
     */
    public function editsupply($code) {
        $this->load->model('supplies');
        $this->data['pagebody'] = 'editsupply';

        // get the supply
        $source = $this->supplies->get($code);
        print_r($source->fetch_object()['code']);
        $supplies = array();
        foreach ($source as $record) {
            $supplies[] = array(
                'code' => $record['code'],
                'name' => $record['name'],
                'description' => $record['description'],
                'measuring_units' => $record['measuring_units'],
                'receiving_cost' => $record['receiving_cost'],
                'receiving_amount' => $record['receiving_amount'],
                'quantity' => $record['quantity']
            );
        }
        
        $this->data = array_merge($this->data, $supplies);
        $this->data['supplies'] = $supplies;
        $this->render();
    }

    /**
     * Show all recipes
     */
    public function recipes() {
        $this->load->model('recipes');
        $this->data['pagebody'] = 'recipes';

        // create a list of recipes
        $source = $this->recipes->all();
        $supplies = array();
        foreach ($source as $record) {
            $recipes[] = array(
                'code' => $record['code'],
                'name' => $record['name'],
                'description' => $record['description']
            );
        }
        $this->data['recipes'] = $recipes;

        $this->render();
    }

    /**
     * Edit a recipe
     * When code is null, new recipe is being added
     * @param type $code
     */
    public function editrecipe($code) {
        $this->load->model('supplies');
        $this->load->model('recipes');
        // get the ingredients for the recipe
        $source = $this->recipes->getIngre($code);
        
        $ingredients = array();
        foreach($source as $record){
            $supplyCode = $record['supplyCode'];
            $supply = $this->supplies->get($supplyCode);
            $supplyName = $this->supplies->getName($supplyCode);
            $ingredients[] = array(
                'code' => $record['code'],
                'supplyCode' => $record['supplyCode'],
                'recipeCode' => $record['recipeCode'],
                'supplyName' => $supplyName,
                'measuring_units' => $record['measuring_units'],
                'amount' => $record['amount']
            );
        }
        $this->data['ingredients'] = $ingredients;
        $this->data['pagebody'] = 'editrecipe';

        // get the recipe
        $source = $this->recipes->get($code);
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
     * Show all stock
     */
    public function stock() {
        $this->load->model('stock');
        $this->data['pagebody'] = 'stock';

        // create list of stock
        $source = $this->stock->all();
        $supplies = array();
        foreach ($source as $record) {
            $stock[] = array(
                'code' => $record['code'],
                'name' => $record['name'],
                'description' => $record['description'],
                'price' => $record['price'],
                'quantity' => $record['quantity']
            );
        }
        $this->data['stock'] = $stock;

        $this->render();
    }

    /**
     * Edit a stock
     * When code is null, stock is being added
     * @param type $code
     */
    public function editstock($code = null) {
        $this->load->model('stock');
        $this->data['pagebody'] = 'editstock';

        // get the supply
        $source = $this->stock->get($code);
        $stock = array();
        foreach ($source as $record) {
            $stock[] = array(
                'code' => $record['code'],
                'name' => $record['name'],
                'description' => $record['description'],
                'price' => $record['price'],
                'quantity' => $record['quantity']
            );
        }
        
        $this->data = array_merge($this->data, $stock);
        $this->data['stock'] = $stock;
        $this->render();
    }

}
