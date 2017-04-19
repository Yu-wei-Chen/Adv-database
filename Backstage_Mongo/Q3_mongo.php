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
$coll_daily = $db->daily1;//daily1 => Q3


// Question 3
$sql="select fromyear,frommonth,fromday from query where id=3";
 $result=mysqli_query($conn,$sql);
 $total_records=mysqli_num_rows($result);
 for($a=1;$a<=$total_records;$a++){
 $row=$result->fetch_row();
    
 }

$day1 = (int)$row[2];
$month1 = (int)$row{1};
$year1 = (int)$row{0};

// group by
$top5 = $coll->aggregate(
            array('$match'=>  array('month' => $month1, 'day' => $day1, 'year' => $year1)),
            array('$group'=>  array(
                '_id' => array('month' => '$month','day' => '$day','year' => '$year','product_id' => '$product_dim.product_id','product_name' => '$product_dim.product_name'),
                'total' => array('$sum' => '$transaction_dim.sales')//'transaction_dim.quantity')
                )),
            array('$sort' => (array('total'=>-1))),
            array('$limit'=>5)
);

$bot5 = $coll->aggregate(
            array('$match'=>  array('month' => $month1, 'day' => $day1, 'year' => $year1)),
            array('$group'=>  array(
                '_id' => array('month' => '$month','day' => '$day','year' => '$year','product_id' => '$product_dim.product_id','product_name' => '$product_dim.product_name'),
                'total' => array('$sum' => '$transaction_dim.sales')//'transaction_dim.quantity')
                )),
            array('$sort' => (array('total'=>1))),
            array('$limit'=>5)
);

// get group by value
//echo "TOP 5 <BR>";
for($i=0;$i<sizeof($top5['result']);$i++){
    //print_r($top5['result'][$i]);//['_id']['store'] //['total']
    $top[$i] = "product id: ".$top5['result'][$i]['_id']['product_id'];
    //echo $top[$i];
    //echo "  product name: ".$top5['result'][$i]['_id']['product_name'];
    //echo "  total: ".$top5['result'][$i]['total'];
    //echo "<BR>";
}

//echo "<BR>BOT 5 <BR>";
for($i=0;$i<sizeof($bot5['result']);$i++){
    //print_r($top5['result'][$i]);//['_id']['store'] //['total']
    $bot[$i] = "product id: ".$bot5['result'][$i]['_id']['product_id'];
    //echo $bot[$i];
    //echo "  product name: ".$bot5['result'][$i]['_id']['product_name'];
    //echo "  total: ".$bot5['result'][$i]['total'];
    //echo "<BR>";
}
if(!isset($top[1])){$top[1]="";}
if(!isset($top[2])){$top[2]="";}
if(!isset($top[3])){$top[3]="";}
if(!isset($top[4])){$top[4]="";}
if(!isset($bot[1])){$bot[1]="";}
if(!isset($bot[2])){$bot[2]="";}
if(!isset($bot[3])){$bot[3]="";}
if(!isset($bot[4])){$bot[4]="";}

// set daily top & bot 5 structure
$Daily_top_bot5 = array( 
    "year" => (int)$year1, 
    "month" => (int)$month1, 
    "day" => (int)$day1,
    "top1" => $top[0],
    "top2" => $top[1],
    "top3" => $top[2],
    "top4" => $top[3],
    "top5" => $top[4],
    "bot1" => $bot[0],
    "bot2" => $bot[1],
    "bot3" => $bot[2],
    "bot4" => $bot[3],
    "bot5" => $bot[4]
);

//insert in to new collection
//$coll_daily->insert($Daily_top_bot5);


// test for insert results
$daily = $coll_daily->find();

$array = array();
while($daily->hasNext()) {
    $array[] = $daily->getNext();
}
    
//echo "<pre>";
//print_r($array);


?>