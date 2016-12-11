<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Sales page should show a menu of purchaseable items, with description 
 * & price for each. The goal of this page is to build an order with 
 * multiple items, and to log the transaction that would result if 
 * the sale proceeded for real.
 * @author Theresa
 */
class Sales extends Application {

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

        $this->load->model('stock');
        $this->data['pagebody'] = 'sales';

        $stuff = '';
        if ($this->session->has_userdata('order')) {
            $order = new Order($this->session->userdata('order'));
            $stuff = $order->receipt();
        } else {
            $this->session->unset_userdata('order');
            $stuff = '';
            if (!$this->session->has_userdata('order')) {
                $order = new Order();
                $this->session->set_userdata('order', (array) $order);
            }
        }
        $this->data['currentOrder'] = $this->parsedown->parse($stuff);

        $source = $this->stock->all();
        $stock = array();
        foreach ($source as $record) {
            $stock[] = array(
                'code' => $record['code'],
                'name' => $record['name'],
                'description' => $record['description'],
                'quantity' => $record['quantity'],
                'price' => $record['price']);
        }
        $this->data['stock'] = $stock;

        $this->render();
    }

    /**
     * Show list of completed orders
     */
    public function summarize() {
        // identify all of the order files
        $this->load->helper('directory');
        $candidates = directory_map('../data/');
        $parms = array();
        foreach ($candidates as $filename) {
            if (substr($filename, 0, 5) == 'order') {
                // restore that order object
                $order = new Order('../data/' . $filename);
                // setup view parameters
                $parms[] = array(
                    'number' => $order->number,
                    'datetime' => $order->datetime,
                    'total' => $order->total()
                );
            }
        }
        $this->data['orders'] = $parms;
        $this->data['pagebody'] = 'summary';
        $this->render('template');  // use the default template
    }

    /**
     * Show info for one completed order
     * @param type $which
     */
    public function examine($which) {
        $this->session->set_userdata('which', $which);
        //$examine = 'true';
        $this->session->set_userdata('examine', 'true');
        $order = new Order('../data/order' . $which . '.xml');
        $stuff = $order->receipt();
        $this->data['content'] = "<div style='width:25%'>" . $this->parsedown->parse($stuff) . "</div>";
        $this->render();
    }

    /**
     * Shows info for one stock
     * @param type $id
     */
    public function gimme($id) {
        $this->data['pagebody'] = 'justone';
        $source = $this->stock->get($id);

        $stock = array();
        foreach ($source as $record) {
            $stock[] = array('code' => $record['code'],
                'name' => $record['name'],
                'description' => $record['description'],
                'price' => $record['price'],
                'quantity' => $record['quantity']);
        }
        $this->data['stock'] = $stock;

        $this->render();
    }

    /**
     * Add an item to the current order
     * @param type $what
     */
    public function add($what) {
        $order = new Order($this->session->userdata('order'));
        $order->additem($what);
        $this->session->set_userdata('order', (array) $order);
        redirect('/sales');
    }

    /**
     * Cancel the current order if there is one
     */
    public function cancel() {
        // Drop any order in progress
        if ($this->session->has_userdata('order')) {
            $this->session->unset_userdata('order');
        }

        redirect('/sales/summarize');
    }

    /**
     * Checkout the current order
     */
    public function checkout() {
        $order = new Order($this->session->userdata('order'));

        $order->save();
        $this->session->unset_userdata('order');

        redirect('/sales/summarize');
    }

}
