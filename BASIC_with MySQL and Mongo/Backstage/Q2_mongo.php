<?php

// Create a Mongo conenction
$mongoDB = new MongoClient("mongodb://localhost");

// Choose the database and collection
$db = $mongoDB->test2;
$coll = $db->colltest9;


$start_time = microtime(true);

// Question 2 
$month1 = 1;
$year1 = 2017;

$month2 = 2;
$year2 = 2017;

// group by
$cursor = $coll->aggregate(
            array('$match'=>  array('month' => $month1, 'year' => $year1)),
            array('$group'=>  array(
                '_id' => array('month' => '$month','year' => '$year','store' => '$store_dim.store_id','region'=>'$region_dim.region_id'),
                'total' => array('$sum' => '$transaction_dim.sales')//'transaction_dim.quantity')
                )),
            array('$sort' => (array('total'=>1)))
);

$cursor1 = $coll->aggregate(
            array('$match'=>  array('month' => $month2, 'year' => $year2)),
            array('$group'=>  array(
                '_id' => array('month' => '$month','year' => '$year','store' => '$store_dim.store_id','region'=>'$region_dim.region_id'),
                'total' => array('$sum' => '$transaction_dim.sales')//'transaction_dim.quantity')
                )),
            array('$sort' => (array('total'=>1)))
);

// get group by value
for($i=0;$i<sizeof($cursor['result']);$i++){
    $index_store[$i] = $cursor['result'][$i]['_id']['store']; // store_id
    $index_region[$i] = $cursor['result'][$i]['_id']['region']; // region_id
    $array1[$index_store[$i]][$index_region[$i]] = $cursor['result'][$i]['total'];// use store_id and region_id as index for array to save the total sales
    print_r($cursor['result'][$i]);//['_id']['store'] //['total']
    echo "<BR>";
}


for($i=0;$i<sizeof($cursor1['result']);$i++){
    $index_store[$i] = $cursor1['result'][$i]['_id']['store']; // store_id
    $index_region[$i] = $cursor1['result'][$i]['_id']['region']; // region_id
    $array2[$index_store[$i]][$index_region[$i]] = $cursor1['result'][$i]['total'];// use store_id and region_id as index for array to save the total sales
    print_r($cursor1['result'][$i]);//['_id']['store'] //['total']
    echo "<BR>";
}


// calculate the sales is increasing or not 
for($j=0;$j<sizeof($index_store);$j++){
    $tem = $array2[$index_store[$j]][$index_region[$j]]-$array1[$index_store[$j]][$index_region[$j]];
    if($tem>0){
        echo "store:".$index_store[$j]."  region:".$index_region[$j];
    }
    echo "<BR>";
}


$end_time = microtime(true);

$time_total = $end_time - $start_time;
echo "Q2. Run time: ".$time_total."second<br />";

?>