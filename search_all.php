<?php

		echo $_POST["search"]."  <- input<BR/>";
        
        if ($_POST["search"]!=null) {
            
            
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

            $search = "%".$_POST["search"]."%";
            
            // Run a sql
            $sql = "SELECT * FROM Product where product_name like '$search'"; // find the top 5 popular item
            $result = $conn->query($sql);
            $i = 1;
            echo $sql."<br/>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $pic[$i] = $row["ID_Product"];
                echo $pic[$i]."<br/>";
                $i++;  
            }
            $i = 0;    
            // Close connection
            mysqli_close($conn);
        }
?>
