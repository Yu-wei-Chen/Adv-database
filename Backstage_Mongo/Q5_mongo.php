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

// Question 5
$sql="select fromyear,frommonth from query where id=5";
 $result=mysqli_query($conn,$sql);
 $total_records=mysqli_num_rows($result);
 for($a=1;$a<=$total_records;$a++){
 $row=$result->fetch_row();
    
 }


$month1 = (int)$row{1};
$year1 = (int)$row{0};
//$month1 = 3;
//$year1 = 2017;

// region compare
$region_compare = $coll->aggregate(
            array('$match'=>  array('month' => $month1, 'year' => $year1)),
            array('$group'=>  array(
                '_id' => array('month' => '$month','year' => '$year','region' => '$region_dim.region'),
                'total' => array('$sum' => '$transaction_dim.sales')//'transaction_dim.quantity')
                )),
            array('$sort' => (array('total'=>1)))
);

//echo $month1."/".$year1."<BR>";
for($i=0;$i<sizeof($region_compare['result']);$i++){
    //print_r($region_compare['result'][$i]);//['_id']['store'] //['total']
    $region[]=$region_compare['result'][$i]['_id']['region'];
    $total_sales[]=$region_compare['result'][$i]['total'];
    //echo "region: ".$region_compare['result'][$i]['_id']['region'];
    //echo "  total slaes: ".$region_compare['result'][$i]['total'];
    
}
//echo "haha".$total_sales[0];

?>