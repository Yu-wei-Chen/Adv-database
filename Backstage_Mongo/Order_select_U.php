<?php

session_start();
                //  echo $_SESSION['mStoreid'];
                //  echo $_SESSION['job'];
                //  echo $_SESSION['mstate'];
                    $Mid = $_SESSION['Mid'];

            //if ($Mid != 5){
            //    echo "<script>alert('You do not have permission'); location.href = 'home.php';</script>";
            //}            

            

            //echo $cid."<BR>";
            //echo $ctype;

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
            //echo "<p><font color=\"red\">Connected successfully</font></p>";

            
            $sql2 = "SELECT * FROM Manager where ID_Manager = $Mid "; 
                //echo "<BR>"."<BR>".$sql."<BR>"."<BR>"."<BR>"."<BR>";
                $result2 = $conn->query($sql2);

                while($row2 = $result2->fetch_assoc()) {
                    //$i++; 
                    $job = $row2["job_title"];
                    $Sid = $row2["ID_Store"];
                    $state = $row2["state"];
                }

            if ($job == "super"){

                $sql = "SELECT * FROM Transaction where status = 'uncheck' "; 

            }elseif ($job == "manager") {
                
                $sql = "SELECT * FROM Transaction where status = 'uncheck' and ID_Store = $Sid "; 

            }else{

                $sql = "SELECT * FROM Transaction where status = 'uncheck' and ID_Store = $Sid and change_state = '$state' "; 

            }

            $result = $conn->query($sql);
            
            //echo $sql;
            
            
            // output data of each row
            while($row = $result->fetch_assoc()) {
                //$i++; 
                $ID_Product = $row["ID_Product"];
                $purchase_date = $row["purchase_date"];
                $quantity = $row["quantity"];
                $price = $row["price"];
                $Tid = $row["ID_Transaction"];
            

                $sql3 = "SELECT * FROM Product where ID_Product = $ID_Product "; 
                //echo "<BR>"."<BR>".$sql."<BR>"."<BR>"."<BR>"."<BR>";
                $result3 = $conn->query($sql3);

                while($row3 = $result3->fetch_assoc()) {
                    //$i++; 
                    $product_name = $row3["product_name"];
                }

                $totalp = $quantity * $price;
                
                echo "<tr>";
                echo "<td>".$product_name."</td>";
                echo "<td>".$purchase_date."</td>";
                echo "<td>".$price."</td>";
                echo "<td>".$quantity."</td>";
                echo "<td>".$totalp."</td>";
                echo "<td>";
                echo "<a href="."Order_update.php?Tid=".$Tid."&check=A"."><button type="."button"." class="."btn btn-xs btn-default btn-primary".">Approve</button></a>";
                echo "  ";
                echo "<a href="."Order_update.php?Tid=".$Tid."&check=R"."><button type="."button"." class="."btn btn-xs btn-default btn-danger".">Reject</button></a>";
                echo "</td>";
                echo "</tr>";

            }
            
           
            


            // Close connection
            mysqli_close($conn);
        //}
?>

        






