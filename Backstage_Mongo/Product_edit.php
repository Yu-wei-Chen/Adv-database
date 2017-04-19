<?php

session_start();
                //  echo $_SESSION['mStoreid'];
                //  echo $_SESSION['job'];
                //  echo $_SESSION['mstate'];
                    $Mid = $_SESSION['Mid'];

                    $Pid = $_GET['Pid'];

            

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

            //$search = $_POST["search"];
            
            // Run a sql
            
            $sql = "SELECT * FROM Product where ID_Product = $Pid "; 
            //echo "<BR>"."<BR>".$sql."<BR>"."<BR>"."<BR>"."<BR>";
            $result = $conn->query($sql);
            

            while($row = $result->fetch_assoc()) {
                //$i++; 
                $product_name = $row["product_name"];
                $price = $row["price"];
                $inventory = $row["inventory"];
                $description = $row["description"];
                $image = $row["image"];
            }

            

            // Close connection
            mysqli_close($conn);
        //}
?>

        






