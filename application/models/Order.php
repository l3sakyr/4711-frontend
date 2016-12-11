<?php

class Order extends CI_Model {

    // constructor
    function __construct($state = null) {
        parent::__construct();
        if (is_array($state)) {
            foreach ($state as $key => $value)
                $this->$key = $value;
        } elseif ($state != null) {
            $xml = simplexml_load_file($state);
            $this->number = (int) $xml->number;
            $this->datetime = (string) $xml->datetime;
            $this->items = array();
            foreach ($xml->item as $item) {
                $key = (string) $item->code;
                $quantity = (int) $item->quantity;
                $this->items[$key] = $quantity;
            }
        } else {
            $this->number = 0;
            $this->datetime = null;
            $this->items = array();
        }
    }

    public function addItem($which = null) {
        // ignore empty requests
        if ($which == null)
            return;

        // add the menu item code to our order if not already there
        if (!isset($this->items[$which]))
            $this->items[$which] = 1;
        else {
            // increment the order quantity
            $this->items[$which] ++;
        }
    }

    public function receipt() {
        $total = 0.00;
        $result = $this->data['pagetitle'] . '  ' . PHP_EOL;
        $result .= date(DATE_ATOM) . PHP_EOL;
        $result .= PHP_EOL . 'Your Order:' . PHP_EOL . PHP_EOL;
        $result .= '##' . $this->number . PHP_EOL;
        foreach ($this->items as $key => $value) {
            $result .= '- ' . $value . ' ' . $this->stock->getName($key) . PHP_EOL;
            $total += $value * $this->stock->getPrice($key);
        }
        $result .= PHP_EOL . 'Total: $' . number_format($total, 2) . PHP_EOL;
        return $result;
    }

    public function total() {
        $total = 0;
        foreach ($this->items as $key => $value) {
            $total += $value * $this->stock->getPrice($key);
        }
        return $total;
    }
    
    
    public function validate(){
        foreach($this->items as $key => $value){
            // get the quantity available
            $quantity = $this->stock->getQuantity($key);
            if($quantity - $value < 0){
                return false;
            }
        }
        return true;
    }

    public function save() {
        $validate = $this->validate();
        if(!$validate){
            //print_r("validate failed");
            return;
        }
        //print_r("validate passed");
        // figure out the order to use
        while ($this->number == 0) {
            // pick random 3 digit #
            $test = rand(100, 999);
            // use this if the file doesn't exist
            if (!file_exists('../data/order' . $test . '.xml'))
                $this->number = $test;
        }
        // and establish the checkout time
        $this->datetime = date(DATE_ATOM);

        // start empty
        $xml = new SimpleXMLElement('<order/>');
        // add the main properties
        $xml->addChild('number', $this->number);
        $xml->addChild('datetime', $this->datetime);
        $i = 0;
        foreach ($this->items as $key => $value) {
            $lineitem = $xml->addChild('item');
            $lineitem->addChild('code', $key);
            $lineitem->addChild('quantity', $value);
            for($i = 0; $i < $value; $i++){
                $this->stock->takeOne($key);
            }
            $i++;
        }
        if($i==0){
            return;
        }

        // save it
        $xml->asXML('../data/order' . $this->number . '.xml');
    }

}
