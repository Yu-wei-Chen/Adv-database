<?php

// Create a Mongo conenction
$mongoDB = new MongoClient("mongodb://localhost");

// Choose the database and collection
$db = $mongoDB->test2;
$coll = $db->colltest8; //4 = 0411


//$qty = $coll->find();

/*command(array("aggregate" => "colltest1","pipeline" => array(
                array('$group'=>  array(
                   '_id' => array('month' => '$month','day' => '$day','year' => '$year'),
                   'count' => array('$sum' => 1))))
                ));*/

echo "<BR><BR><BR>";

$day1 = 11;
$month1 = 3;
$year1 = 2017;

$product_given = '1';
$product_name1 = 'Man shoes3';

// company_category
$week_buy2 = $coll->aggregate(
            array('$group'=>  array(
                '_id' => array('year' => '$year','week' => '$week','customer_id' => '$customer_dim.customer_id','customer_name' => '$customer_dim.customer_name','product_id' => '$product_dim.product_id','product_name' => '$product_dim.product_name'),
                'count' => array('$sum' => 1)//'transaction_dim.quantity')
                ))
);

/*
$cursor = $coll->find($query2);
foreach ($cursor as $doc) {
    var_dump($doc);
}*/
//$cursor = $cursor->sort(array('count' => 1));

//print_r($cursor);

//echo "<pre>";
$k = 0;
for($i=0;$i<sizeof($week_buy2['result']);$i++){
    if($week_buy2['result'][$i]['count']>1 && $week_buy2['result'][$i]['_id']['customer_id']!=null){
        //print_r($week_buy2['result'][$i]);//['_id']['store'] //['total']
        $customer_id[$k] = $week_buy2['result'][$i]['_id']['customer_id'];
        $customer_name[$k] = $week_buy2['result'][$i]['_id']['customer_name'];
        $product_id[$k] = $week_buy2['result'][$i]['_id']['product_id'];
        $product_name[$k] = $week_buy2['result'][$i]['_id']['product_name'];
        echo "Cid:".$customer_id[$k]." ".$customer_name[$k]." buy the Pid:".$product_id[$k]." ".$product_name[$k]." twice a week";
        echo "<BR>";
        $k++;
    }
}
/*
echo "Category: ".$pop_category."<BR>";
echo "total slaes: ".$total_sales;
echo "<BR><BR>";


echo "<BR>BOT 5 <BR>";
for($i=0;$i<sizeof($bot5['result']);$i++){
    //print_r($top5['result'][$i]);//['_id']['store'] //['total']
    echo "product id: ".$bot5['result'][$i]['_id']['product_id'];
    echo "  product name: ".$bot5['result'][$i]['_id']['product_name'];
    echo "<BR>";
}
*/



/*
for($i=0;$i<sizeof($cursor1['result']);$i++){
    $index_store[$i] = $cursor1['result'][$i]['_id']['store']; // store_id
    $index_region[$i] = $cursor1['result'][$i]['_id']['region']; // region_id
    $array2[$index_store[$i]][$index_region[$i]] = $cursor1['result'][$i]['total'];// use store_id and region_id as index for array to save the total sales
    print_r($cursor1['result'][$i]);//['_id']['store'] //['total']
    echo "<BR>";
}

for($j=0;$j<sizeof($index_store);$j++){
    $tem = $array2[$index_store[$j]][$index_region[$j]]-$array1[$index_store[$j]][$index_region[$j]];
    if($tem>0){
        echo "store:".$index_store[$j]."  region:".$index_region[$j];
    }
    echo "<BR>";
}

*/

/*	// select all #####################
    $cursor = $coll->find();
    //->distinct("company_dim.company_id");
    //->sort(array('transaction_id' => 1));

    $array = array();
    while($cursor->hasNext()) {
         $array[] = $cursor->getNext();
    }
    
    echo "<pre>";
    print_r($array);
*/

//*********

    // count 直接印出
    //$cursor = $coll->find()->count();
    //echo $cursor;


//=====================================
    /*   
    // Question 1 answer 
    $company_qty = $db->command(array("distinct" => "colltest1", "key" => "company_dim.company_id"));
    $customer_qty = $db->command(array("distinct" => "colltest1", "key" => "customer_dim.customer_id"));

    //company
    echo "count of company: ".sizeof($company_qty['values'])."<BR>"; // count answer

    print_r($company_qty['values']);

    echo "<BR><BR>";

    foreach ($company_qty['values'] as $company_qty1) {
        print_r($company_qty1);
        echo "<BR>";
    }

    //customer
    echo "<BR>count of customer: ".sizeof($customer_qty['values'])."<BR>"; // count answer

    print_r($customer_qty['values']);

    echo "<BR><BR>";

    foreach ($customer_qty['values'] as $customer_qty1) {
        print_r($customer_qty1);
        echo "<BR>";
    }
    */


?>