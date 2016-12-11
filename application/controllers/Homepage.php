<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Homepage should be a dashboard of sorts, showing some summary information:
 * $ spent purchasing inventory, $ received from sales, cost of sales ingredients
 * consumed. These are derived from the transaction logs.
 */
class Homepage extends Application {

    /**
     * Default Constructor
     */
    function __construct() {
        parent::__construct();
        $this->data['pagetitle'] = 'Aromatherapy Store';
    }

    /**
     * Homepage for our app
     */
    public function index() {
        $userrole = $this->session->userdata('userrole');
        if ($userrole != 'admin') {
            $message = 'Welcome to our store!';
            $this->data['content'] = $message;
            $this->render();
            return;
        }
        // this is the view we want shown
        $this->data['pagebody'] = 'homepage';
        // this is the data we want loaded onto the view
        $this->invCal();
        $this->saleCal();
        $this->countRecipe();
        $this->countIngredients();
        //this makes the view rendered
        $this->render();
    }

    /**
     * Function for calculating the amount spent on inventory
     */
    public function invCal() {
        // gets a list of supplies
        $source = $this->supplies->all();
        $supplies = array();

        //Total
        $totalCost = 0;

        //Calculates
        foreach ($source as $record) {
            $rUniut = intval(preg_replace('/[^0-9]+/', '', $record['receiving_amount']), 10);
            $rCost = intval(preg_replace('/[^0-9]+/', '', $record['receiving_cost']), 10);
            $inv = intval(preg_replace('/[^0-9]+/', '', $record['quantity']), 10);
            $totalCost += (($inv / $rUniut) * $rCost) / 100;
        }
        //Makes a data field
        $this->data['totalCost'] = (real) $totalCost;
    }

    /**
     * Function for calculating the received from sales
     */
    public function saleCal() {

        //Total
        $totalInc = 0;
        
        $this->load->helper('directory');
        $candidates = directory_map('../data/');
        $parms = array();
        foreach ($candidates as $filename) {
            if (substr($filename, 0, 5) == 'order') {
                // restore that order object
                $order = new Order('../data/' . $filename);
                // add the order total to our total made from sales
                $totalInc += $order->total();
            }
        }

        //Makes a data field
        $this->data['totalInc'] = $totalInc;
    }

    public function countRecipe() {
        // gets a list of supplies
        $source = $this->recipes->all();
        $recipeCount = 0;
        foreach ($source as $record) {
            $recipeCount++;
        }
        $this->data['recipeCount'] = $recipeCount;
    }

    public function countIngredients() {
        // gets a list of supplies
        $source = $this->supplies->all();
        $supplyCount = 0;
        foreach ($source as $record) {
            $supplyCount++;
        }
        $this->data['supplyCount'] = $supplyCount;
    }

}
