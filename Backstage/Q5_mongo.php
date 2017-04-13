<?php

// Create a Mongo conenction
$mongoDB = new MongoClient("mongodb://localhost");

// Choose the database and collection
$db = $mongoDB->test2;
$coll = $db->colltest7; // Fact collection 

// Question 5
$month1 = 3;
$year1 = 2017;

// region compare
$region_compare = $coll->aggregate(
            array('$match'=>  array('month' => $month1, 'year' => $year1)),
            array('$group'=>  array(
                '_id' => array('month' => '$month','year' => '$year','region' => '$region_dim.region'),
                'total' => array('$sum' => '$transaction_dim.sales')//'transaction_dim.quantity')
                )),
            array('$sort' => (array('total'=>1)))
);

echo $month1."/".$year1."<BR>";
for($i=0;$i<sizeof($region_compare['result']);$i++){
    //print_r($region_compare['result'][$i]);//['_id']['store'] //['total']
    echo "region: ".$region_compare['result'][$i]['_id']['region'];
    echo "  total slaes: ".$region_compare['result'][$i]['total'];
    echo "<BR>";
}


?>