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

// every day maintain collection 
$coll_daily1 = $db->daily2; //daily2 => Q4


// Question 4
$sql="select fromyear,frommonth,fromday from query where id=4";
 $result=mysqli_query($conn,$sql);
 $total_records=mysqli_num_rows($result);
 for($a=1;$a<=$total_records;$a++){
 $row=$result->fetch_row();
    
 }

$day1 = (int)$row[2];
$month1 = (int)$row{1};
$year1 = (int)$row{0};
//$day1 = 11;
//$month1 = 11;
//$year1 = 2016;

// company_category
$top2c = $coll->aggregate(
            array('$match'=>  array('month' => $month1, 'day' => $day1, 'year' => $year1)),
            array('$group'=>  array(
                '_id' => array('month' => '$month','day' => '$day','year' => '$year','company_category' => '$company_dim.category'),
                'total' => array('$sum' => '$transaction_dim.sales')//'transaction_dim.quantity')
                )),
            array('$sort' => (array('total'=>-1))),
            array('$limit' => 3) // the first one will be null category(customer)
);

// product kind
$top1pk = $coll->aggregate(
            array('$match'=>  array('month' => $month1, 'day' => $day1, 'year' => $year1)),
            array('$group'=>  array(
                '_id' => array('month' => '$month','day' => '$day','year' => '$year','product_kind' => '$product_dim.kind'),
                'total' => array('$sum' => '$transaction_dim.sales')//'transaction_dim.quantity')
                )),
            array('$sort' => (array('total'=>-1))),
            array('$limit' => 1) // the first one will be null category(customer)
);

// get group by value
//echo "TOP 2 company type <BR>";
for($i=1;$i<sizeof($top2c['result']);$i++){
    //print_r($top2c['result'][$i]);//['_id']['store'] //['total']
    if(!isset($top2c['result'][$i]['_id']['company_category'])){$top2c['result'][$i]['_id']['company_category']="";}
    $topcc[$i] = $top2c['result'][$i]['_id']['company_category'];
    //echo "company category: ".$topcc[$i];
    //echo "<BR>";
}


//echo "<BR> TOP Product kind <BR>";
for($i=0;$i<sizeof($top1pk['result']);$i++){
    //print_r($top1pk['result'][$i]);//['_id']['store'] //['total']
    $toppk = $top1pk['result'][$i]['_id']['product_kind'];
    //echo "company category: ".$toppk;
    //echo "<BR>";
}
if(!isset($topcc[1])){$topcc[1]="";}
if(!isset($topcc[2])){$topcc[2]="";}
// set daily top & bot 5 structure
$Daily_top_cc_pk = array( 
    "year" => (int)$year1, 
    "month" => (int)$month1, 
    "day" => (int)$day1,
    "top1_com_category" => $topcc[1],
    "top2_com_category" => $topcc[2],
    "top_product_kind" => $toppk
);

//insert in to new collection
//$coll_daily1->insert($Daily_top_cc_pk);


// test for insert results
$daily1 = $coll_daily1->find();

$array = array();
while($daily1->hasNext()) {
    $array[] = $daily1->getNext();
}
    
//echo "<pre>";
//print_r($array);


?>