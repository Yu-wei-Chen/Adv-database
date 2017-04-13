<?php

// Create a Mongo conenction
$mongoDB = new MongoClient("mongodb://localhost");

// Choose the database and collection
$db = $mongoDB->test2;
$coll = $db->colltest1;


// Question 1 answer 
$company_qty = $db->command(array("distinct" => "colltest1", "key" => "company_dim.company_id"));
$customer_qty = $db->command(array("distinct" => "colltest1", "key" => "customer_dim.customer_id"));


//company
$com_qty = sizeof($company_qty['values']);
echo "count of company: ".$com_qty."<BR>"; // count answer

print_r($company_qty['values']);

echo "<BR>";

foreach ($company_qty['values'] as $company_qty1) {
    print_r($company_qty1);
    echo "<BR>";
}

//customer
$cust_qty = sizeof($customer_qty['values']);
echo "<BR>count of customer: ".$cust_qty."<BR>"; // count answer

print_r($customer_qty['values']);

echo "<BR><BR>";

foreach ($customer_qty['values'] as $customer_qty1) {
    print_r($customer_qty1);
    echo "<BR>";
}

// %%
echo "customer % : ".$cust_qty/($cust_qty+$com_qty)."<BR>";
echo "company % : ".$com_qty/($cust_qty+$com_qty)."<BR>";  

?>