<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Receiving Controller
 */
class Receiving extends Application {

    /**
     * Default Constructor
     */
    function __construct() {
        parent::__construct();
    }

    /**
     * loads receiving page
     */
    public function index() {
        $userrole = $this->session->userdata('userrole');
        if ($userrole == 'guest') {
            $message = 'You are not authorized to access this page. Go away';
            $this->data['content'] = $message;
            $this->render();
            return;
        }
        $this->load->model('supplies');
        $this->data['pagebody'] = 'receiving';

        // gets a list of supplies
        $source = $this->supplies->all();
        $supplies = array();
        foreach ($source as $record) {
            $supplies[] = array('code' => $record['code'],
                'name' => $record['name'],
                'description' => $record['description'], 'receiving_amount' => $record['receiving_amount'],
                'receiving_cost' => $record['receiving_cost'], 'measuring_units' => $record['measuring_units'],
                'quantity' => $record['quantity']);
        }
        $this->data['supplies'] = $supplies;

        $this->render();
    }

    // loads a page with information about one supply
    public function gimme($id) {
        $this->data['pagebody'] = 'justoneR';
        $source = $this->supplies->get($id);

        $supplies = array();
        foreach ($source as $record) {
            $supplies[] = array('code' => $record['code'],
                'name' => $record['name'],
                'description' => $record['description'], 'receiving_amount' => $record['receiving_amount'],
                'receiving_cost' => $record['receiving_cost'], 'measuring_units' => $record['measuring_units'],
                'quantity' => $record['quantity']);
        }
        $this->data['supplies'] = $supplies;

        $this->render();
    }

    // gets the cost of the supply
    public function getCost() {
        $receiving_cost = (string) $this->supplies->getRc();
        $price = floatval(preg_replace('/[^0-9.]+/', '', $receiving_cost));

        return $price;
    }

    // logs the transaction to a db and display it
    // calls a function to updates the data in the database afterwards
    public function receipt() {
        $this->data['pagebody'] = 'order';
        $quantity = $_GET['receiving_amount/' . $_GET['id']];
        $name = $this->supplies->getName($_GET['id']);
        $totalCost = $this->getCost() * $_GET['receiving_amount/' . $_GET['id']];

        $log = $quantity . " " . $name . "(s) was received at the cost of $" . $totalCost . ".";

        //NEW
        $log .= "<br/> Extra: " . $_GET['id'];
        //END NEW

        $transaction = "";

        $this->supplies->transaction($log);

        $logger[] = array('transaction_msg' => $log);
        $this->data['transaction'] = $logger;

        $this->supplies->receiving_update_db();
        $this->render();
    }

}
