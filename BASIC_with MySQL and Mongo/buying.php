<?php
session_start();

$sid = $_SESSION['id'];
$stype = $_SESSION['type'];


$state = $_POST['state'];
$address = $_POST['address'];
$str = $_POST['tid'];
$tid = explode("/",$str);



//echo $sid."<BR>".$stype."<BR>".$state."<BR>".$address."<BR>".$str."<BR>"."<BR>";




// connect to MySQL
            include_once("config.php");

            	

	            for ($jj=1; $jj < count($tid); $jj++) { 
 					
 					//$sql4 = "SELECT * FROM Transaction where ID_Transaction = $tid[$jj] ";
					$sql = "UPDATE Transaction SET `change_state`='$state', `change_address`='$address', `status`='uncheck' WHERE ID_Transaction = $tid[$jj]";

					if ($conn->query($sql) === TRUE) {
					    //echo "New record created successfully".$jj. "<br>" ;
					} else {
					    //echo "Error: " . $sql . "<br>" . $conn->error;
					}

                    $sql3 = "SELECT * FROM Transaction where ID_Transaction = $tid[$jj] ";

                    $result3 = $conn->query($sql3);

                    while($row3 = $result3->fetch_assoc()) {
                        $ppid = $row3["ID_Product"];
                        $qty_change = $row3["quantity"];
                    }

                    //echo $ppid."---".$qty_change. "<br>". "<br>";


                    $sql5 = "SELECT * FROM Product where ID_Product = $ppid ";

                    $result5 = $conn->query($sql5);

                    while($row5 = $result5->fetch_assoc()) {
                        
                        $qty_product = $row5["inventory"];
                    }

                    $new_qty = $qty_product-$qty_change;

                    //echo $sql5. "<br>";
                    //echo $qty_product."-".$qty_change."=".$new_qty. "<br>". "<br>";

                    
                    $sql4 = "UPDATE Product SET `inventory` = $new_qty WHERE ID_Product = $ppid";

                    if ($conn->query($sql4) === TRUE) {
                        //echo "New record created successfully".$jj. "<br>" ;
                    } else {
                        //echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                    

 				}	 

           		echo "<script>alert('Buy successfully'); location.href = 'index.php'; </script>";
 				//echo $total_price;




			// Close connection
            mysqli_close($conn);

?>