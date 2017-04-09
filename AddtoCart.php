<?php
	session_start();

	//echo $_GET['pid']."<BR>"."<BR>";

		// quantity
	//echo $_POST['qty']."<BR>".$_POST['pid']."<BR>";
            if ($_SESSION['id']==null){
        echo "<script>alert('Please login First');location.href = 'login.php';</script>";
    }
			
        

            $sid = $_SESSION['id'];
            $stype = $_SESSION['type'];


            if ($_GET['pid'] != null) {
            	$ppid = $_GET['pid'];
            	$qty = 1;
            }else{
            	$ppid = $_POST['pid'];
				$qty = $_POST['qty'];            	
            }

            //echo $sid.":1:<BR>".$stype.":2:<BR>".$ppid.":3:<BR>".$qty.":4:<BR>"."<BR>";


            // connect to MySQL
            include_once("config.php");

            

            if ($stype == "Customer") {
            	$sql2 = "SELECT * FROM Transaction where ID_Product = $ppid and ID_Customer = $sid and status = 'cart' "; // find the top 5 popular item  (where kind like '$search'
            }else{
            	$sql2 = "SELECT * FROM Transaction where ID_Product = $ppid and ID_Company = $sid and status = 'cart' "; // find the top 5 popular item  (where kind like '$search
            }
            
            
            $result2 = $conn->query($sql2);
            

            while($row2 = $result2->fetch_assoc()) {
                
                $tid = $row2["ID_Transaction"];
                $ttqty = $row2["quantity"];
            }
            
            $date = date("Y-m-d");

            //select product information
            $sql1 = "SELECT * FROM Product where ID_Product = $ppid ";

            $result1 = $conn->query($sql1);
            

            while($row1 = $result1->fetch_assoc()) {
                
                $pprice = $row1["price"];
                $idstore = $row1["ID_Store"];
                $inventory = $row1["inventory"];
                $product_name = $row1["product_name"];
            }
            
            if ($stype == "Customer" ) {
            	$sql3 = "SELECT * FROM Customer where ID_Customer = $sid ";
            }else{
            	$sql3 = "SELECT * FROM Company where ID_Company = $sid ";
            }
            //echo $sql3."<BR>";
            $result3 = $conn->query($sql3);

            while($row3 = $result3->fetch_assoc()) {
                $cstate = $row3["state"];
                $caddress = $row3["address"];
            }

            $total_qty = $ttqty+$qty; // cart qty + new qty 

            if ($total_qty > $inventory) {
                echo "<script>alert('The inventory of ".$product_name." is not enough for ".$total_qty.", please change quantity.(only remain".$inventory.")');location.href = 'Item.php?pid=".$ppid."';</script>";
                exit;
            }

            if ($tid != null) {
            	$sql = "UPDATE Transaction SET `quantity`= $total_qty WHERE ID_Transaction = $tid ";
            }else{
            	if ($stype == "Customer" ) {
            		$sql = "Insert into Transaction values (NULL,'$date','$qty','$pprice','$ppid','$idstore','$sid',NULL,'$cstate','$caddress','cart') ";
            	}else{
            		$sql = "Insert into Transaction values (NULL,'$date','$qty','$pprice','$ppid','$idstore',NULL,'$sid','$cstate','$caddress','cart') ";
            	}
            }
            
            //echo $sql."<BR>";
            
            if ($conn->query($sql) === TRUE) {
			    //echo "New record created successfully";
			} else {
			    //echo "Error: " . $sql . "<br>" . $conn->error;
			}


			echo "<script>alert('Add successfully'); location.href = 'CheckOut.php'; </script>";


// Close connection
            mysqli_close($conn);

?>