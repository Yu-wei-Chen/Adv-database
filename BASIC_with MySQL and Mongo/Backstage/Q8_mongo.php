<?php

// Create a Mongo conenction
$mongoDB = new MongoClient("mongodb://localhost");

// Choose the database and collection
$db = $mongoDB->test2;
$coll = $db->colltest9; // Fact collection 


$start_time = microtime(true);



// Question 8

$week2 = 45;
$year2 = 2016;

$week_buy2 = $coll->aggregate(
            array('$match'=>  array('week' => $week2, 'year' => $year2)),
            array('$group'=>  array(
                '_id' => array('year' => '$year','week' => '$week','customer_name' => '$customer_dim.customer_name','product_name' => '$product_dim.product_name'),
                'count' => array('$sum' => 1)//'transaction_dim.quantity') 'product_id' => '$product_dim.product_id',,'customer_id' => '$customer_dim.customer_id'
                ))
);

/*Select fact.year,fact.week,companydim.company_name,productdim.product_name,count(productdim.product_name) FROM transactiondim,fact,productdim,companydim WHERE fact.company_id=companydim.company_id AND fact.product_id=productdim.product_id AND fact.transaction_id=transactiondim.transaction_id group by fact.year,fact.week,companydim.company_name,productdim.product_id having count(productdim.product_name)>=2*/

print_r($week_buy2);
echo "<BR>";echo "<BR>";echo "<BR>";

//result
$k = 0;
for($i=0;$i<sizeof($week_buy2['result']);$i++){
    if($week_buy2['result'][$i]['count']>1 && $week_buy2['result'][$i]['_id']['customer_name']!=null){ //
        //print_r($week_buy2['result'][$i]);//['_id']['store'] //['total']
        //$customer_id[$k] = $week_buy2['result'][$i]['_id']['customer_id'];
        $customer_name[$k] = $week_buy2['result'][$i]['_id']['customer_name'];
        //$product_id[$k] = $week_buy2['result'][$i]['_id']['product_id'];
        $product_name[$k] = $week_buy2['result'][$i]['_id']['product_name'];
        echo "Cid:"/*.$customer_id[$k]." "*/.$customer_name[$k]." buy the Pid:"/*.$product_id[$k]." "*/.$product_name[$k]." twice a week";
        echo "<BR>";
        $k++;
    }
}



$end_time = microtime(true);

$time_total = $end_time - $start_time;
echo "Q8. Run time: ".$time_total."second<br />";

?>