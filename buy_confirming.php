<?php
session_start();

$sid = $_SESSION['id'];
$stype = $_SESSION['type'];

//$qty = $_POST[0];


$str = $_POST['tid_buy'];
$tid = explode("/",$str);

            if ($str == null) {
                echo "<script>alert('Please select item.');location.href = 'Product.php?gender=male';</script>";//
                    exit;
            }



            // connect to MySQL
            include_once("config.php");

            if ($stype == "Customer" ) {
            	$sql3 = "SELECT * FROM Customer where ID_Customer = $sid ";
            	$result3 = $conn->query($sql3);

	            while($row3 = $result3->fetch_assoc()) {
	            	$cname = $row3["customer_name"];
	                $cstate = $row3["state"];
	                $caddress = $row3["address"];
	            }

            }else{
            	$sql3 = "SELECT * FROM Company where ID_Company = $sid ";

            	 $result3 = $conn->query($sql3);

	            while($row3 = $result3->fetch_assoc()) {
	            	$cname = $row3["company_name"];
	                $cstate = $row3["state"];
	                $caddress = $row3["address"];
	            }
            }
            

                for ($tt=1; $tt < count($tid); $tt++) {
                    $oo = $tt-1; 
                    $qty[$oo] = $_POST[$oo];
                    //echo $qty[$oo];
                    
                    $sql5 = "UPDATE Transaction SET `quantity` = $qty[$oo] WHERE ID_Transaction = $tid[$tt] ";

                    if ($conn->query($sql5) === TRUE) {
                        //echo "New record created successfully";
                    } else {
                        //echo "Error: " . $sql5 . "<br>" . $conn->error;
                    }
                    

                }





            	$z = 0;

	            for ($jj=1; $jj < count($tid); $jj++) { 
 					
 					$sql4 = "SELECT * FROM Transaction where ID_Transaction = $tid[$jj] ";
					//echo $sql4."<BR>";
	            	$result4 = $conn->query($sql4);

		            while($row4 = $result4->fetch_assoc()) {
                              $z++;
		                      $price = $row4["price"];
                              $ppid[$z] = $row4["ID_Product"];
                              $total_qty[$z] =  $row4["quantity"];

		            }
 				
	            	$total_price = $total_price+($price*$total_qty[$z]); 
 				}	 

           
 				//echo $total_price;

                  for ($aa=1; $aa <= $z; $aa++) { 

                        $sql1 = "SELECT * FROM Product where ID_Product = $ppid[$aa] ";
                        $result1 = $conn->query($sql1);
                        while($row1 = $result1->fetch_assoc()) {
                            
                            $inventory = $row1["inventory"];
                            $product_name = $row1["product_name"];
                        }
                        //echo "11111"."<BR>";
                        if ($total_qty[$aa] > $inventory) {
                            echo "<script>alert('The inventory of ".$product_name." is not enough for ".$total_qty[$aa].", please change quantity.(only remain".$inventory.")');location.href = 'CheckOut.php';</script>";//
                            exit;
                        }


                  }

                  






                  


			// Close connection
            mysqli_close($conn);

?>