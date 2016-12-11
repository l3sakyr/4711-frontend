<?php

/*
 * The list of raw materials that go into the creation of one product for sale or one service offered. 
 * With sample values in brackets ... a recipe code (Refresh), a description (Sharpen concentration, 
 * increase stamina, and revitalize your senses), and the recipe ingredients (1 Spearmint, 1 Lavendar,
 * 1 Eucalyptus, 1 Lemon, 0.5 Rosewood, 0.5 Cedarwood).
 */

class Recipes extends CI_Model {
    //Initialize the array of recipes
//    var $data = array(
//        array(
//            'code' => '0',
//            'name' => 'Refresh',
//            'description' => 'Sharpen concentration, increase stamina, and revitalize your senses',
//            'ingredients' => array(
//                'item1' => array(
//                    'ingredName' => 'Spearmint',
//                    'amount' => '1'
//                ),
//                'item2' => array(
//                    'ingredName' => 'Lavendar',
//                    'amount' => '1'
//                ),
//                'item3' => array(
//                    'ingredName' => 'Eucalyptus',
//                    'amount' => '1'
//                ),
//                'item4' => array(
//                    'ingredName' => 'Lemon',
//                    'amount' => '1'
//                ),
//                'item5' => array(
//                    'ingredName' => 'Rosewood',
//                    'amount' => '.5'
//                ),
//                'item6' => array(
//                    'ingredName' => 'Cedarwood',
//                    'amount' => '.5'
//                )
//            )
//        ),
//        array(
//            'code' => '1',
//            'name' => 'Cloud Nine',
//            'description' => 'Lift your spirits',
//            'ingredients' => array(
//                'item1' => array(
//                    'ingredName' => 'Lavendar',
//                    'amount' => '2'
//                ),
//                'item2' => array(
//                    'ingredName' => 'Ylang ylang',
//                    'amount' => '1'
//                ),
//                'item3' => array(
//                    'ingredName' => 'Neroli',
//                    'amount' => '1'
//                ),
//                'item4' => array(
//                    'ingredName' => 'Sandalwood',
//                    'amount' => '1'
//                )
//            )
//        ),
//        array(
//            'code' => '2',
//            'name' => 'Energy',
//            'description' => 'Invigorate and refresh your mind and body',
//            'ingredients' => array(
//                'item1' => array(
//                    'ingredName' => 'Peppermint',
//                    'amount' => '1.5'
//                ),
//                'item2' => array(
//                    'ingredName' => 'Rosemary',
//                    'amount' => '1'
//                ),
//                'item3' => array(
//                    'ingredName' => 'Lemon',
//                    'amount' => '1'
//                ),
//                'item4' => array(
//                    'ingredName' => 'Bergamot',
//                    'amount' => '1'
//                ),
//                'item5' => array(
//                    'ingredName' => 'Basil',
//                    'amount' => '.5'
//                )
//            )
//        ),
//        array(
//            'code' => '3',
//            'name' => 'Exhale',
//            'description' => 'An exhilarating essential oil blend that renews and strengthens',
//            'ingredients' => array(
//                'item1' => array(
//                    'ingredName' => 'Eucalyptus',
//                    'amount' => '2'
//                ),
//                'item2' => array(
//                    'ingredName' => 'Peppermint',
//                    'amount' => '1.5'
//                ),
//                'item3' => array(
//                    'ingredName' => 'Rosemary',
//                    'amount' => '1'
//                ),
//                'item4' => array(
//                    'ingredName' => 'Ginger',
//                    'amount' => '.5'
//                )
//            )
//        ),
//        array(
//            'code' => '4',
//            'name' => 'Citrus Dream',
//            'description' => 'For promoting a sense of calmness and positivity',
//            'ingredients' => array(
//                'item1' => array(
//                    'ingredName' => 'Orange',
//                    'amount' => '2.5'
//                ),
//                'item2' => array(
//                    'ingredName' => 'Grapefruit',
//                    'amount' => '1'
//                ),
//                'item3' => array(
//                    'ingredName' => 'Lemon',
//                    'amount' => '1'
//                ),
//                'item4' => array(
//                    'ingredName' => 'Neroli',
//                    'amount' => '.5'
//                )
//            )
//        ),
//        array(
//            'code' => '5',
//            'name' => 'Tranquility',
//            'description' => 'For a deeper, more restful sleep',
//            'ingredients' => array(
//                'item1' => array(
//                    'ingredName' => 'Orange',
//                    'amount' => '1.5'
//                ),
//                'item2' => array(
//                    'ingredName' => 'Lavendar',
//                    'amount' => '1.5'
//                ),
//                'item3' => array(
//                    'ingredName' => 'Marjoram',
//                    'amount' => '1'
//                ),
//                'item4' => array(
//                    'ingredName' => 'Chamomile',
//                    'amount' => '1'
//                )
//            )
//        ),
//        array(
//            'code' => '6',
//            'name' => 'Unwind',
//            'description' => 'Melt away stress and ease tension with this uplifting blend',
//            'ingredients' => array(
//                'item1' => array(
//                    'ingredName' => 'Orange',
//                    'amount' => '2'
//                ),
//                'item2' => array(
//                    'ingredName' => 'Lavendar',
//                    'amount' => '1.5'
//                ),
//                'item3' => array(
//                    'ingredName' => 'Bergamot',
//                    'amount' => '1'
//                ),
//                'item4' => array(
//                    'ingredName' => 'Geranium',
//                    'amount' => '.5'
//                )
//            )
//        )
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

        $sql = "SELECT * FROM recipes WHERE code <=> " . $id . ";";
        $record = $conn->query($sql);
        $conn->close();
        //SQL//
        return $record;
    }

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
        $sql = "UPDATE Recipes SET name = ". $array['name'] ." , description = ". $array['description'] . " WHERE code <=> " . $array['code'] . ";";
        $result = $conn->query($sql);
        $conn->close();
    }

    function rules() {
        $config = [
            ['field' => 'code', 'label' => 'Menu code', 'rules' => 'required|integer'],
            ['field' => 'name', 'label' => 'Item name', 'rules' => 'required'],
            ['field' => 'description', 'label' => 'Item description', 'rules' => 'required|max_length[256]']
        ];
        return $config;
    }

	// records the transaction into the transaction table
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

        // Template for adding product
        $quantity = $_GET['production_quantity/'.$_GET['id']];
        $sql = "UPDATE recipes_supply SET quantity = quantity + " . $quantity . " WHERE code <=>" . $_GET['id'] . ";";
        $result = $conn->query($sql);
        $conn->close();
        //SQL//
    }

}
