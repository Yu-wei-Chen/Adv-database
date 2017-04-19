<?php
session_start();
		//echo $_POST["search"]."  <- input<BR/>";
        //if ($_POST["search"]!=null) {
            

            $cid = $_SESSION['id'];
            $ctype = $_SESSION['type'];

            //echo $cid."<BR>";
            //echo $ctype;

            // connect to MySQL
            include_once("config.php");

            //$search = $_POST["search"];
            
            // Run a sql
            if ($ctype == "Customer") {
                
                $sql = "SELECT * FROM Transaction where ID_Customer = $cid and status <> 'cart'"; // find the top 5 popular item  (where kind like '$search'
            }else{
                
                $sql = "SELECT * FROM Transaction where ID_Company = $cid and status <> 'cart'"; // find the top 5 popular item  (where kind like '$search'
            }

            //echo "<BR>"."<BR>".$sql."<BR>"."<BR>"."<BR>"."<BR>";
            $result = $conn->query($sql);
            
            //echo $sql;
            
            $i = 0;
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $i++; 
                $tpid[$i] = $row["ID_Product"];
                $tqty[$i] = $row["quantity"];
                $tpr[$i] = $row["price"];
                $tdate[$i] = $row["purchase_date"];
                $tstatu[$i] = $row["status"];
                $value[$i] = $tqty[$i] * $tpr[$i];   
                $sql1[$i] = "SELECT * FROM Product where ID_Product = $tpid[$i] "; 
                //echo $sql1[$i]."<BR>".$tpid[$i]."<BR>".$tqty[$i]."<BR>".$tpr[$i]."<BR>".$tdate[$i]."<BR>".$value[$i]."<BR>".$i."<BR>"."<BR>";
            }
        
            for ($qq=0; $qq < $i; $qq++) { 
                //echo $sql1[$qq+1]."<BR>";
                $result1 = $conn->query($sql1[$qq+1]);
                while($row1 = $result1->fetch_assoc()) {
                    $tpimage[$qq+1] = $row1["image"];
                    $tpname[$qq+1] = $row1["product_name"];
                    $tpdesc[$qq+1] = $row1["description"];
                }

                //echo $tpimage[$qq+1]."<BR>".$tpname[$qq+1]."<BR>".$tpdesc[$qq+1]."<BR>"."<BR>";
                //echo $sql1[$qq+1]."<BR>".$tpid[$qq+1]."<BR>".$tqty[$qq+1]."<BR>".$tpr[$qq+1]."<BR>".$tdate[$qq+1]."<BR>".$value[$qq+1]."<BR>"."<BR>";

                echo "<tr>";
                echo "<td class="."ring-in".">";
                echo "<a class="."at-in".">";
                echo "<img src=".$tpimage[$qq+1]." class="."img-responsive".">";
                echo "</a>";         
                echo "<div class="."sed".">";
                echo "<h5>".$tpname[$qq+1]."</h5>";
                echo "<p>".$tpdesc[$qq+1]."</p>";
                echo "</div>";
                echo "<div class="."clearfix"."></div> ";
                echo "</td>";        
                echo "<td>".$tqty[$qq+1]."</td>";
                echo "<td>$".$value[$qq+1]."</td>";
                echo "<td>".$tdate[$qq+1]."</td>";
                echo "<td>".$tstatu[$qq+1]."</td>";
                echo "</tr>";

            }
            
          /*   
                
            
                
            */
            //for ($pp=0; $pp < $i; $pp++) { 
            /*    
                echo "<tr>";
                echo "<td class="."ring-in".">";
                echo "<a class="."at-in".">";
                echo "<img src=".$tpimage." class="."img-responsive".">";
                echo "</a>";         
                echo "<div class="."sed".">";
                echo "<h5>".$tpname."</h5>";
                echo "<p>".$tpdesc."</p>";
                echo "</div>";
                echo "<div class="."clearfix"."></div> ";
                echo "</td>";        
                echo "<td>".$tqty."</td>";
                echo "<td>$".$value."</td>";
                echo "<td>".$tdate."</td>";
                echo "<td><a href="."#".">x</a></td>";
                echo "</tr>";
            */
            //}

            // Close connection
            mysqli_close($conn);
        //}
?>

        






