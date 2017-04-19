<?php

if(!session_id()) session_start();
                //  echo $_SESSION['mStoreid'];
                //  echo $_SESSION['job'];
                //  echo $_SESSION['mstate'];
                   if(!isset($_SESSION['Mid'])) {$Mid = "";}else $Mid = $_SESSION['Mid'];

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
                $job = $row2["job_title"];
                $store = $row2["ID_Store"];
            }
            
            

            if ($job == "clerk" ){
                echo "<script>alert('You do not have permission'); location.href = 'home.php';</script>";
                exit;
            }    


            if ($job == "super"){
                $sql1 = "SELECT * FROM Product ";
            }else{
                $sql1 = "SELECT * FROM Product where ID_Store = $store ";
            }
             
                //echo "<BR>"."<BR>".$sql."<BR>"."<BR>"."<BR>"."<BR>";
            $result1 = $conn->query($sql1);


            //echo $sql1;

            while($row1 = $result1->fetch_assoc()) {
                $name = $row1["product_name"];
                $inventory = $row1["inventory"];
                $price = $row1["price"];
                $kind = $row1["kind"];
                $gender = $row1["gender"];
                $Pid = $row1["ID_Product"];

                
                echo "<tr>";
                echo "<td>".$name."</td>";
                echo "<td>".$kind."</td>";
                echo "<td>".$gender."</td>";
                echo "<td>".$price."</td>";
                echo "<td>".$inventory."</td>";
                echo "<td>";
                echo "<button type="."button"." class="."btn btn-default btn-link".">";
                echo "<a href="."editProduct.php?Pid=".$Pid."".">";         
                echo "edit";
                echo "</a>";
                echo "</button>";
                echo "</td>";
                echo "</tr>";

            }
            
          /*   
                "."quantity".[$qq+1].""."
            
                
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

        






