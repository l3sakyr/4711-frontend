<?php

/*
 * Assembled goods or services ready to sell. Again with sample values ... a recipe code
 * (Refresh), a description (Sharpen concentration, increase stamina, and revitalize your
 * senses), a selling price ($14.95), quantity on hand if pre-made (4).
 */

class Stock extends CI_Model {

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

    /**
     * Get price
     * @param type $id
     * @return type
     */
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

    /**
     * Update quantity
     * @param type $id
     * @return type
     */
    public function updateQuantity($id) {
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

    /**
     * Get quantity
     * @param type $id
     * @return type
     */
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

        $source = $conn->query($sql);

        foreach ($source as $record) {
            $quantity = $record['quantity'];
        }

        $conn->close();
        //SQL//
        return $quantity;
    }

    /**
     * Get name
     * @param type $id
     * @return type
     */
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
		
		$name = "";
		
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

    /**
     * Get all
     * @return type
     */
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

    /**
     * Reduces stock by one
     * @param type $which
     */
    public function takeOne($which) {
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

        //$numentries = $this->numentries();
        //if($numentries() == 0){
        //    return -1;
        //}
        $sql = "UPDATE Stock SET quantity = quantity - 1 WHERE code = " . $which;

        $result = $conn->query($sql);
        $conn->close();
    }

    /**
     * Update db
     */
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

    /**
     * Update stock
     * @param type $array
     */
    public function update($array) {
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
        $sql = "UPDATE Stock SET quantity = " . $array['quantity'] . ", name = " . $array['name'] . " , description = " . $array['description'] . ", price = " . $array['price'] . " WHERE code <=> " . $array['code'] . ";";
        $result = $conn->query($sql);
        $conn->close();
    }

}
