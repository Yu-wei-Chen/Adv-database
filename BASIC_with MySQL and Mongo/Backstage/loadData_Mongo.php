<?php

// connect to MySQL
//include_once("config.php");

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

// ## Mongo ##
// Create a Mongo conenction
$mongoDB = new MongoClient("mongodb://localhost");

// Choose the database and collection
$db = $mongoDB->test2;
$coll = $db->colltest9;//4=0411


// Select from Transaction with Store to get Fact table  // Unannotation Current time when maintain
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

	// Insert into Fact table
	//echo "Fact<BR>".$year[$i]." ".$month[$i]." ".$day[$i]." ".$week[$i]." ".$ID_Customer_f[$i]." ".$ID_Company_f[$i]." ".$ID_Transaction_f[$i]." ".$ID_Store_f[$i]." ".$ID_Product_f[$i]." ".$ID_Region_f[$i]."<BR><BR>";
    

	// ID_Customer
    // prevent Null value of Customer ID
	if ($ID_Customer_f[$i]<=0){
		$ID_Customer_f[$i]=0;
		$CustomerDim = null;
	}else{
		// Select Customer table
		$sql_customer = "SELECT ID_Customer, customer_name, state, age, gender, income FROM Customer WHERE ID_Customer =".$ID_Customer_f[$i];
		$result_customer = $conn->query($sql_customer);

		while($row_customer = $result_customer->fetch_assoc()) {
			$ID_Customer = $row_customer["ID_Customer"];
			$customer_name = $row_customer["customer_name"];
			$state = $row_customer["state"];
			$age = $row_customer["age"];
			$gender = $row_customer["gender"];
			$income = $row_customer["income"];

			// Replace into Customer table
			//echo "Customer-D<BR>".$ID_Customer." ".$customer_name." ".$state." ".$age." ".$gender." ".$income."<BR><BR>";


			// Mongo - set Customer Dim
			$CustomerDim = array( 
	        "customer_id" => $ID_Customer, 
	        "customer_name" => $customer_name, 
	        "region" => $state,
	        "age" => $age,
	        "gender" => $gender,
	        "income" => $income
	    	);
		}
	}	


	// ID_Company
    // prevent Null value of Company ID
	if ($ID_Company_f[$i]<=0){
		$ID_Company_f[$i]=0;
		$CompanyDim = null;
	}else{

		// Select Customer table
		$sql_company = "SELECT ID_Company, company_name, state, category, income FROM Company WHERE ID_Company =".$ID_Company_f[$i];
		$result_company = $conn->query($sql_company);

		while($row_company = $result_company->fetch_assoc()) {
			$ID_Company = $row_company["ID_Company"];
			$company_name = $row_company["company_name"];
			$state = $row_company["state"];
			$category = $row_company["category"];
			$income = $row_company["income"];

			// Replace into Customer table
			//echo "Company-D<BR>".$ID_Company." ".$company_name." ".$state." ".$category." ".$income."<BR><BR>";

			// Mongo - set Company Dim
			$CompanyDim = array( 
	        "company_id" => $ID_Company, 
	        "company_name" => $company_name, 
	        "region" => $state,
	        "category" => $category,
	        "income" => $income
	    	);
		}
	}	

	// ID_Product
	// Select Product table
	$sql_product = "SELECT ID_Product, product_name, kind, price FROM Product WHERE ID_Product =".$ID_Product_f[$i];
	$result_product = $conn->query($sql_product);
	while($row_product = $result_product->fetch_assoc()) {
		$ID_Product = $row_product["ID_Product"];
		$product_name = $row_product["product_name"];
		$kind = $row_product["kind"];
		$price = $row_product["price"];

		// Replace into Product table
		//echo "Product-D<BR>".$ID_Product." ".$product_name." ".$kind." ".$price."<BR><BR>";

		// Mongo - set Product Dim
		$ProductDim = array( 
        "product_id" => $ID_Product, 
        "product_name" => $product_name, 
        "kind" => $kind,
        "price" => $price
    	);
	}


	// ID_Store
	// Select Store table
	$sql_store = "SELECT ID_Store,store_name,ID_Region FROM Store WHERE ID_Store =".$ID_Store_f[$i];
	$result_store = $conn->query($sql_store);
	while($row_store = $result_store->fetch_assoc()) {
		$ID_Store = $row_store["ID_Store"];
		$store_name = $row_store["store_name"];
		$ID_Region = $row_store["ID_Region"];

		// Replace into Store table
		//echo "Store-D<BR>".$ID_Store." ".$store_name." ".$ID_Region."<BR><BR>";

		// Mongo - set Store Dim
		$StoreDim = array( 
        "store_id" => $ID_Store, 
        "store_name" => $store_name, 
        "region" => $ID_Region
    	);
	}

	
	// ID_Region
	// Select Region table
	$sql_region = "SELECT ID_Region,state FROM Region WHERE ID_Region =".$ID_Region_f[$i];
	$result_region = $conn->query($sql_region);
	while($row_region = $result_region->fetch_assoc()) {
		$ID_Region = $row_region["ID_Region"];
		$state = $row_region["state"];

		// Replace into Region table
		//echo "Region-D<BR>".$ID_Region." ".$state."<BR><BR>";

		// Mongo - set Region Dim
		$RegionDim = array( 
        "region_id" => $ID_Region, 
        "region" => $state
    	);
	}


	// ID_Transaction
	// Select Transaction table
	$sql_trans = "SELECT ID_Transaction,quantity,price FROM Transaction WHERE ID_Transaction =".$ID_Transaction_f[$i];
	$result_trans = $conn->query($sql_trans);
	while($row_trans = $result_trans->fetch_assoc()) {
		$ID_Transaction = $row_trans["ID_Transaction"];
		$quantity = $row_trans["quantity"];
		$price = $row_trans["price"];

		$sales = $price*$quantity;
		// Replace into Transaction table
		//echo "Transaction-D<BR>".$ID_Transaction." ".$quantity." ".$price."<BR><BR>";

		// Mongo - set Transaction Dim
		$TransactionDim = array( 
        "transaction_id" => $ID_Transaction, 
        "quantity" => (int)$quantity, 
        "price" => (int)$price,
        "sales" => (int)$sales
    	);
	}


	// Mongo - set document array for Fact
		$Fact = array( 
        "year" => (int)$year[$i], 
        "month" => (int)$month[$i], 
        "day" => (int)$day[$i],
        "week" => (int)$week[$i],
        "customer_dim" => $CustomerDim,
        "company_dim" => $CompanyDim,
        "transaction_dim" => $TransactionDim,
        "store_dim" => $StoreDim,
        "region_dim" => $RegionDim,
        "product_dim" => $ProductDim
    	);


	// Mongo - insert document
	// Insert the document in to collection
	//$coll->insert($Fact);
	print_r($Fact);
    echo "数据插入成功<BR>";

	// array index
	$i++;
	echo "<BR><BR>";
}

// echo $i;

// Close connection
mysqli_close($conn);

?>
