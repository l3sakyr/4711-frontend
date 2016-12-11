<?php

/*
 * Assembled goods or services ready to sell. Again with sample values ... a recipe code
 * (Refresh), a description (Sharpen concentration, increase stamina, and revitalize your
 * senses), a selling price ($14.95), quantity on hand if pre-made (4).
 */

class Stock extends CI_Model {
    //Initialize the array of stock
//    var $data = array(
//        array(
//            'code' => '0',
//            'name' => 'Refresh',
//            'description' => 'Sharpen concentration, increase stamina, and revitalize your senses',
//            'quantity' => '4',
//            'price' => '$14.95'),
//        array(
//            'code' => '1',
//            'name' => 'Cloud Nine',
//            'description' => 'Lift your spirits',
//            'quantity' => '7',
//            'price' => '$16.45'),
//        array(
//            'code' => '2',
//            'name' => 'Energy',
//            'description' => 'Invigorate and refresh your mind and body',
//            'quantity' => '5',
//            'price' => '$18.45'),
//        array(
//            'code' => '3',
//            'name' => 'Exhale',
//            'description' => 'An exhilarating essential oil blend that renews and strengthens',
//            'quantity' => '4',
//            'price' => '$12.95'),
//        array(
//            'code' => '4',
//            'name' => 'Citrus Dream',
//            'description' => 'For promoting a sense of calmness and positivity',
//            'quantity' => '9',
//            'price' => '$16.95'),
//        array(
//            'code' => '5',
//            'name' => 'Tranquility',
//            'description' => 'For a deeper, more restful sleep',
//            'quantity' => '5',
//            'price' => '$12.45'),
//        array(
//            'code' => '6',
//            'name' => 'Unwind',
//            'description' => 'Melt away stress and ease tension with this uplifting blend',
//            'quantity' => '7',
//            'price' => '$19.45')
//    );

    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Retrieve a single supply by code
     * @param $code
     * @return $record
     */
    public function get($id) {
        //SQL
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "a2Database";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM stock WHERE code <=> " . $id . ";";
        $record = $conn->query($sql);
        $conn->close();
        //SQL//
        return $record;
    }
    
    public function getPrice($id) {
        //SQL
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "a2Database";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT price FROM stock WHERE code <=> " . $id . ";";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                //echo "<br> name: " . $row["name"] ."<br>";
                $price = $row["price"];
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        //SQL//
        return $price;
    }
    
    public function getQuantity($id) {
        //SQL
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "a2Database";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT quantity FROM stock WHERE code <=> " . $id . ";";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                //echo "<br> name: " . $row["name"] ."<br>";
                $quantity = $row["quantity"];
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        //SQL//
        return $quantity;
    }
    
    public function getName($id) {
        //SQL
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "a2Database";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT name FROM stock WHERE code <=> " . $id . ";";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                //echo "<br> name: " . $row["name"] ."<br>";
                $name = $row["name"];
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        //SQL//
        return $name;
    }

    public function all() {
        //SQL
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "a2Database";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM stock";
        $result = $conn->query($sql);
        $conn->close();
        //SQL//
        return $result;
    }
    
    public function takeOne($which){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "a2Database";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "UPDATE Stock SET quantity = quantity - 1 WHERE code = " . $which;
        
        $result = $conn->query($sql);
        $conn->close();
        
    }

    public function produce_update_db() {
        //SQL
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "a2Database";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Template for adding product
        $quantity = $_GET['production_quantity/' . $_GET['id']];
        $sql = "UPDATE Stock SET quantity = quantity + " . $quantity . " WHERE code <=>" . $_GET['id'] . ";";
        $result = $conn->query($sql);
        $conn->close();
        //SQL//
    }
    
    public function update($array){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "a2Database";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Template for adding product
        $sql = "UPDATE Stock SET quantity = " . $array['quantity'] . ", name = ". $array['name'] ." , description = ". $array['description'] .", price = ". $array['price'] ." WHERE code <=> " . $array['code'] . ";";
        $result = $conn->query($sql);
        $conn->close();
    }

}
