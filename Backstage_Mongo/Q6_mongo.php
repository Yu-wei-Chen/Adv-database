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

// Question 6
$sql="select product_name from query where id=6";
 $result=mysqli_query($conn,$sql);
 $total_records=mysqli_num_rows($result);
 for($a=1;$a<=$total_records;$a++){
 $row=$result->fetch_row();
    
 }

//$product_given = '4';

$product_name1 = $row[0];
//$product_name1 = 'Man shoes3'; // can use both name ot if to set as the given product

// company_category

$product_compare = $coll->aggregate(
            array('$match'=>  array('product_dim.product_name' => $product_name1)),//'product_dim.product_id' => $product_given,
            array('$group'=>  array(
                '_id' => array('company_category' => '$company_dim.category'),
                'total' => array('$sum' => '$transaction_dim.sales')//'transaction_dim.quantity')
                )),
            array('$sort' => (array('total'=> -1))),
            array('$limit'=> 5)
);

//result
//echo $product_name1."<BR><BR>";
for($i=0;$i<sizeof($product_compare['result']);$i++){
    //print_r($region_compare['result'][$i]);//['_id']['store'] //['total']
    if(!isset($product_compare['result'][$i]['_id']['company_category'])){$product_compare['result'][$i]['_id']['company_category']="";}
    if(!isset($product_compare['result'][$i]['total'])){$product_compare['result'][$i]['total']=0;}
    $pop_category = $product_compare['result'][$i]['_id']['company_category'];
    $total_sales = $product_compare['result'][$i]['total'];
    if($pop_category!=null){ // prevent the company = null (customer buy)
        break;
    }
}
if(!isset($pop_category)){$pop_category="";}
if(!isset($total_sales)){$total_sales="";}
//echo "Category: ".$pop_category."<BR>";
//echo "total slaes: ".$total_sales;
//echo "<BR><BR>";


?>