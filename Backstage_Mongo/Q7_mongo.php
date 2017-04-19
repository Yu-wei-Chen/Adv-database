<?php
           $servername = "localhost";
			$username = "root";
			$password = "root";
			$dbname = "final";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}
// Create a Mongo conenction
$mongoDB = new MongoClient("mongodb://localhost");

// Choose the database and collection
$db = $mongoDB->test2;
$coll = $db->colltest9; // Fact collection 

// Question 7
$sql="select product_name from query where id=7";
 $result=mysqli_query($conn,$sql);
 $total_records=mysqli_num_rows($result);
 for($a=1;$a<=$total_records;$a++){
 $row=$result->fetch_row();  
 }

$product_given = '1';
$product_name1 = $row[0];
//$product_name1 = 'Man shoes3';

// company_category
$curve = $coll->aggregate(
            array('$match'=>  array('product_dim.product_name' => $product_name1)),//'product_dim.product_name' => $product_name1,
            array('$group'=>  array(
                '_id' => array('price' => '$transaction_dim.price'),
                'quantity' => array('$sum' => '$transaction_dim.quantity')//'transaction_dim.quantity')
                )),
            array('$sort' => (array('quantity'=> 1)))
);

//result
//echo $product_given."<BR><BR>";
for($i=0;$i<sizeof($curve['result']);$i++){
    //print_r($curve['result'][$i]);//['_id']['store'] //['total']
    $price[$i] = $curve['result'][$i]['_id']['price'];
    $quantity[$i] = $curve['result'][$i]['quantity'];
    //echo "price=".$price[$i]." => quantity=".$quantity[$i];
    //echo "<BR>";
}


?>