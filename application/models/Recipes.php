<?php

/*
 * The list of raw materials that go into the creation of one product for sale or one service offered. 
 * With sample values in brackets ... a recipe code (Refresh), a description (Sharpen concentration, 
 * increase stamina, and revitalize your senses), and the recipe ingredients (1 Spearmint, 1 Lavendar,
 * 1 Eucalyptus, 1 Lemon, 0.5 Rosewood, 0.5 Cedarwood).
 */

class Recipes extends CI_Model {

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

        $sql = "SELECT * FROM recipes WHERE code <=> " . $id . ";";
        $record = $conn->query($sql);
        $conn->close();
        //SQL//
        return $record;
    }

    /**
     * Get recipe name
     * @param type $id
     * @return type
     */
    public function getRecipeName($id) {
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

        $sql = "SELECT name FROM recipes WHERE code <=> " . $id . ";";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $name = $row["name"];
            }
        }
        $conn->close();
        return $name;
    }

    /**
     * Get ingredients of a recipe
     * @param type $code
     * @return type
     */
    public function getIngre($code) {
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

        $sql = "select * from recipes
            join recipe_supply
            on recipe_supply.recipeCode = recipes.code
            and recipe_supply.recipeCode = " . $code . PHP_EOL .
                "join supplies on supplies.code = recipe_supply.supplyCode;";
        $result = $conn->query($sql);

        $conn->close();
        return $result;
    }

    /**
     * Get all
     * @return type
     */
    public function all() {

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

        $sql = "SELECT * FROM recipes";
        $result = $conn->query($sql);

        $conn->close();
        //SQL//
        return $result;
    }

    /**
     * Update recipe
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
        $sql = "UPDATE Recipes SET name = " . $array['name'] . " , description = " . $array['description'] . " WHERE code <=> " . $array['code'] . ";";
        $result = $conn->query($sql);
        $conn->close();
    }

    /**
     * Records transaction
     * @param type $log
     */
    public function transaction($log) {
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

        $sql = "INSERT INTO transaction (production_transaction) VALUES('" . $log . "');";

        if ($conn->query($sql) === TRUE) {
            //echo "New record created successfully";
        } else {
            //echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
        //SQL//
    }

    /**
     * Update recipe quantity
     */
    public function update_recipe_quantity() {
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

		// sql for getting all the ingredients of a single recipe
		$sc_sql = "SELECT s.supplyCode FROM recipes r
					JOIN recipe_supply s ON s.recipeCode <=> r.code
					JOIN supplies e ON e.code <=> s.supplyCode
					WHERE r.code <=> " . $_GET['id'];
					
		$result = $conn->query($sc_sql);
		
		$sc = array();
		
		if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                array_push($sc, $row["supplyCode"]);
				//print_r($sc);
				//echo ($row["supplyCode"]);

            }
        } else {
            echo "0 results";
        }
		
		// goes through 
		
		// iterate over the supplyCodes to update the ingreidients
		
        // Below doesn't operate correctly
        $quantity = $_GET['production_quantity/' . $_GET['id']];
        $sql = "UPDATE recipes_supply SET quantity = quantity + " . $quantity . " WHERE code <=>" . $_GET['id'] . ";";
        $result = $conn->query($sql);
		//echo $_GET['id'] . " " . $quantity;
        $conn->close();
        //SQL//
    }

}
