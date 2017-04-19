<?php

		//echo $_POST["search"]."  <- input<BR/>";
        
        if ($_POST["search"]!=null) {
            
            
            // connect to MySQL
            include_once("config.php");

            $search = $_POST["search"];
            
            // Run a sql
            $sql = "SELECT * FROM Product where kind like '$search'"; // find the top 5 popular item  (where kind like '$search'
            $result = $conn->query($sql);
            $i = 0;
            
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $i++; 
                $pid[$i] = $row["ID_Product"];
                $pna[$i] = $row["product_name"];
                $ppr[$i] = $row["price"];
                $pim[$i] = $row["image"];
                //echo "<tr><td>".$pid[$i]."</td><td>".$pna[$i]."</td><td>".$ppr[$i]."</td><td>".$ppr[$i]."</td><td>".$pim[$i]."</td><td><button type="."button"." class="."btn btn-danger btn-xs".">cancle</button></td></tr><br>";
                 
            }
            echo $search."<br>";
            echo $i;

            $out_num = ceil($i / 3);
            echo $out_num;
            $in_num = $i % 3;
            if ($in_num == 0) {
                $in_num = 3;
            }

            echo "<br><br><br>";

            if ($i > 3) {
                for ($k=0; $k < ($out_num-1); $k++) { 
                    echo "out1<br>";
                    echo "in1<br>";
                    echo "in-1<br>";
                    echo "in2<br>";
                    echo "in-2<br>";
                    echo "in3<br>";
                    echo "in-3<br>";
                    echo "out-1<br>";
                }
            }    

            echo "<br><br><br>";

            echo "out2<br>";

            for ($l=0; $l < $in_num; $l++) { 
                echo "in1>>>>".($i-$in_num+$l+1)."<<<<<br>";
                echo "in-1<br>";
            }



            echo "out-2<br>";



            //$i = 0;    
            // Close connection
            mysqli_close($conn);
        }
?>








