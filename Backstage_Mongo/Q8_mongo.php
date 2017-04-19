<?php

// Create a Mongo conenction
$mongoDB = new MongoClient("mongodb://localhost");

// Choose the database and collection
$db = $mongoDB->test2;
$coll = $db->colltest9; // Fact collection 

// Question 8

$week2 = 45;
$year2 = 2016;

$week_buy2 = $coll->aggregate(
            array('$match'=>  array('week' => $week2, 'year' => $year2)),
            array('$group'=>  array(
                '_id' => array('year' => '$year','week' => '$week','customer_id' => '$customer_dim.customer_id','customer_name' => '$customer_dim.customer_name','product_id' => '$product_dim.product_id','product_name' => '$product_dim.product_name'),
                'count' => array('$sum' => 1)//'transaction_dim.quantity')
                ))
);

//result
$k = 0;

for($i=0;$i<sizeof($week_buy2['result']);$i++){
    if (!isset($week_buy2['result'][$i]['_id']['customer_id'])){$week_buy2['result'][$i]['_id']['customer_id']=0;}
    if($week_buy2['result'][$i]['count']>1 && $week_buy2['result'][$i]['_id']['customer_id']!=null){
        //print_r($week_buy2['result'][$i]);//['_id']['store'] //['total']
        
        $customer_id[$k] = $week_buy2['result'][$i]['_id']['customer_id'];
        $customer_name[$k] = $week_buy2['result'][$i]['_id']['customer_name'];
        $product_id[$k] = $week_buy2['result'][$i]['_id']['product_id'];
        $product_name[$k] = $week_buy2['result'][$i]['_id']['product_name'];
        //echo "Cid:".$customer_id[$k]." ".$customer_name[$k]." buy the Pid:".$product_id[$k]." ".$product_name[$k]." twice a week";
        //echo "<BR>";
        $k++;
    }
}


?>