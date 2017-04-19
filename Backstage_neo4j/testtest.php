<?php

// connect to MySQL
//include_once("config.php");

include_once("config.php");
use Everyman\Neo4j\Client,
    Everyman\Neo4j\Transport,
    Everyman\Neo4j\Node,
    Everyman\Neo4j\Relationship;
use Everyman\Neo4j\Cypher;
// ## Mongo ##
// Create a neo4j conenction

require('vendor/autoload.php');
$client = new Everyman\Neo4j\Client(
        (new Everyman\Neo4j\Transport\Curl('localhost',7474))
            ->setAuth('neo4j','phptest')
            //new
);
echo "start<BR>";

/*
$user = new Node($client);
$user->setProperty('test', 'women')
	->setProperty('name','Mary')
	->setProperty('age', 12);

$userLabel = $client->makeLabel('Users');
$user->save()->addLabels(array($userLabel));
echo "...<BR>";

//execute cyper in php!!!!!!!!
$queryString = 'CREATE (user:User {name:"Kenneth", age:"23"}) RETURN user';
$query = new Everyman\Neo4j\Cypher\Query($client, $queryString);
$result = $query->getResultSet();
foreach ($result as $row) {
    echo $row['user']->getProperty('name');
    echo $row['user']->getProperty('age') . "\n";
}
*/



$sql = "SELECT YEAR(purchase_date) AS 'year', MONTH(purchase_date) AS 'month', DAY(purchase_date) AS 'day', WEEK(purchase_date, 0) AS 'week', ID_Customer, ID_Company, ID_Transaction, TRANSACTION.ID_Store, ID_Product, ID_Region FROM TRANSACTION, Store WHERE TRANSACTION.ID_Store = Store.ID_Store AND TRANSACTION.status = 'success' /*AND DATE(TRANSACTION.purchase_date) = CURRENT_DATE*/"; 
$result = $conn->query($sql);
$i = 0; // array index
while($row = $result->fetch_assoc()) {
	$year[$i] = $row["year"];
	$month[$i] = $row["month"];
	$day[$i] = $row["day"];
	$week[$i] = $row["week"];
	$ID_Customer_f[$i] = $row["ID_Customer"];
	$ID_Company_f[$i] = $row["ID_Company"];
	$ID_Transaction_f[$i] = $row["ID_Transaction"];
	$ID_Store_f[$i] = $row["ID_Store"];
	$ID_Product_f[$i] = $row["ID_Product"];
	$ID_Region_f[$i] = $row["ID_Region"];
	
	if (!isset($ID_Customer_f[$i])) {
		$ID_Customer_f[$i] = "0";
	}
	if (!isset($ID_Company_f[$i])) {
		$ID_Company_f[$i] = "0";
	}
	echo "insert data to neo4j called Fact<BR>".$year[$i]." ".$month[$i]." ".$day[$i]." ".$week[$i]." ".$ID_Customer_f[$i]." ".$ID_Company_f[$i]." ".$ID_Transaction_f[$i]." ".$ID_Store_f[$i]." ".$ID_Product_f[$i]." ".$ID_Region_f[$i]."<BR>";

	//MERGE (node:Node {id: {id}})
	//ON CREATE SET ode.name = {name}, node.address = {address}
	//RETURN node;
	//$q = 'CREATE (n:Facable {year:'.$year[$i].',month:'.$month[$i].',day:'.$day[$i].',week:'.$week[$i].'}) RETURN n';

	$setfact = $client->makeNode();
    $setfact->setProperty('year', $year[$i])
            ->setProperty('month', $month[$i])
            ->setProperty('day', $day[$i])
            ->setProperty('week', $week[$i])
            ->setProperty('customer_id', $ID_Customer_f[$i])
            ->setProperty('company_id', $ID_Company_f[$i])
            ->setProperty('transaction_id', $ID_Transaction_f[$i])
            ->setProperty('store_id', $ID_Store_f[$i])
            ->setProperty('product_id', $ID_Product_f[$i])
            ->setProperty('region_id', $ID_Region_f[$i])
            ->save();
    $userLabel = $client->makeLabel('Fact');
    $setfact->save()->addLabels(array($userLabel));

	

	if ($ID_Customer_f[$i]<=0){
        $ID_Customer_f[$i]=0;
        echo "id = 0   skip! <BR>";
    }
    else {
        $sql_customer = "SELECT ID_Customer, customer_name, state, age, gender, income FROM Customer WHERE ID_Customer =".$ID_Customer_f[$i];
        $result_customer = $conn->query($sql_customer);
        //print_r ($result_customer);
        while($row_customer = $result_customer->fetch_assoc()) {
        $ID_Customer = $row_customer["ID_Customer"];
		    $customer_name = $row_customer["customer_name"];
		    $state = $row_customer["state"];
		    $age = $row_customer["age"];
		    $gender = $row_customer["gender"];
		    $income = $row_customer["income"];

		    // output the data dragged from customer table
		    echo "lalala";
		    echo "insert data to neo4j called CustomerDim<BR>".$ID_Customer." ".$customer_name." ".$state." ".$age." ".$gender." ".$income."<BR>";

		    
		    $setCustomer = $client->makeNode();
		    $setCustomer ->setProperty('customer_id', $ID_Customer)
		                ->setProperty('customer_name', $customer_name)
		                ->setProperty('state', $state)
		                ->setProperty('age', $age)
		                ->setProperty('gender', $gender)
		                ->setProperty('income', $income)
		                ->save();
		    $customerlabel = $client->makeLabel('CustomerDim');
		    $setCustomer->save()->addLabels(array($customerlabel));
		    $setCustomer -> relateTo($setfact, 'customerIN')->save();
		    echo "??????????????????????????????";
        }
        
        
    }
    // Select data from Customer table

    
    echo "load data to CustomerDim completed.<BR>";
    if ($ID_Company_f[$i]<=0){
       $ID_Company_f[$i]=0;
       echo "companyid =============0 <BR>";
    }
    else {
        // Select data from company table
	    $sql_company = "SELECT ID_Company, company_name, state, category, income FROM Company WHERE ID_Company =".$ID_Company_f[$i];
	    $result_company = $conn->query($sql_company);
	    print_r ($result_company);
	    while($row_company = $result_company->fetch_assoc()) {
	        $ID_Company = $row_company["ID_Company"];
	        $company_name = $row_company["company_name"];
	        $state = $row_company["state"];
	        $category = $row_company["category"];
	        $income = $row_company["income"];
	        echo "============";
	        // output the data dragged from company table
	        echo "insert data to neo4j called CompanyDim  ".$ID_Company." ".$company_name." ".$state." ".$category." ".$income."<BR>";

	        $setCompany = $client ->makeNode();
	        $setCompany -> setProperty('company_id', $ID_Company)
	                    -> setProperty('company_name', $company_name)
	                    -> setProperty('state', $state)
	                    -> setProperty('category', $category)
	                    -> setProperty('income', $income)
	                    -> save();
	        $companylabel = $client->makeLabel('CompanyDim');
	        $setCompany->save()->addLabels(array($companylabel));
	        $setCompany -> relateTo($setfact, 'companyIN')->save();

    	}
    }
    echo "load data to CompanyDim completed.<BR>";


    // ID_Product
    // Select data from Product table
    $sql_product = "SELECT ID_Product, product_name, kind, price FROM Product WHERE ID_Product =".$ID_Product_f[$i];
    $result_product = $conn->query($sql_product);
    while($row_product = $result_product->fetch_assoc()) {
        $ID_Product = $row_product["ID_Product"];
        $product_name = $row_product["product_name"];
        $kind = $row_product["kind"];
        $price = $row_product["price"];

        // output the data dragged from Product table
        //echo "Insert data to neo4j called ProductDim<BR>".$ID_Product." ".$product_name." ".$kind." ".$price."<BR>";

        $setProduct = $client->makeNode();
        $setProduct -> setProperty('product_id', $ID_Product)
                    -> setProperty('product_name', $product_name)
                    -> setProperty('kind', $kind)
                    -> setProperty('price', $price)
                    -> save();
        $productlabel = $client -> makeLabel('ProductDim');
        $setProduct -> save() -> addLabels(array($productlabel));
        $setProduct -> relateTo($setfact, 'productIN') -> save();
    }
    echo "load data to ProductDim completed.<BR>";


    $sql_store = "SELECT ID_Store,store_name,ID_Region FROM Store WHERE ID_Store =".$ID_Store_f[$i];
    $result_store = $conn->query($sql_store);
    while($row_store = $result_store->fetch_assoc()) {
        $ID_Store = $row_store["ID_Store"];
        $store_name = $row_store["store_name"];
        $ID_Region = $row_store["ID_Region"];

        // output the data dragged from Store table
        //echo "Insert data to neo4j called StoreDim<BR>".$ID_Store." ".$store_name." ".$ID_Region."<BR>";

        $setStore = $client -> makeNode();
        $setStore ->setProperty('store_id', $ID_Store)
                -> setProperty('store_name', $store_name)
                -> setProperty('region_id', $ID_Region)
                -> save();
        $storelabel = $client -> makeLabel('StoreDim');
        $setStore -> save() -> addLabels(array($storelabel));
        $setStore -> relateTo($setfact, 'StoreIN') -> save();
    }
    echo "load data to StoreDim completed.<BR>";



    $sql_region = "SELECT ID_Region,state FROM Region WHERE ID_Region =".$ID_Region_f[$i];
    $result_region = $conn->query($sql_region);
    while($row_region = $result_region->fetch_assoc()) {
        $ID_Region = $row_region["ID_Region"];
        $state = $row_region["state"];

        // output data dragged from Region table
        //echo "Insert data to neo4j called RegionDim<BR>".$ID_Region." ".$state."<BR>";

        $setRegion = $client -> makeNode();
        $setRegion -> setProperty('region_id', $ID_Region)
                -> setProperty('state', $state)
                -> save();
        $regionlabel = $client -> makeLabel('regionDim');
        $setRegion -> save() -> addLabels(array($regionlabel));
        $setRegion -> relateTo($setfact, 'RegionIN') -> save();
    }
    echo "load data to RegionDim completed.<BR>";



    $sql_trans = "SELECT ID_Transaction,quantity,price FROM Transaction WHERE ID_Transaction =".$ID_Transaction_f[$i];
    $result_trans = $conn->query($sql_trans);
    while($row_trans = $result_trans->fetch_assoc()) {
        $ID_Transaction = $row_trans["ID_Transaction"];
        $quantity = $row_trans["quantity"];
        $price = $row_trans["price"];

        // output data dragged from Transaction table
        //echo "Transaction-D<BR>".$ID_Transaction." ".$quantity." ".$price."<BR>";

        $setTransaction = $client -> makeNode();
        $setTransaction -> setProperty('transaction_id', $ID_Transaction)
                        -> setProperty('quantity', $quantity)
                        -> setProperty('price', $price)
                        -> save();
        $transactionlabel = $client -> makeLabel('transactionDim');
        $setTransaction -> save() -> addLabels(array($transactionlabel));
        $setTransaction -> relateTo($setfact, 'TransactionIN') -> save();
    }
    echo "load data to TransactionDim completed.<BR>";
    $i++;
}
    echo "all data loaded!!!!!!!";

echo "end";
?>