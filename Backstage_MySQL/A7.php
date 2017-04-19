<?php
            
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
            $time = "select product_name from query where id =7";
            $result = $conn->query($time);

            while($row = $result->fetch_assoc()) {
                $product_name = $row["product_name"];
            }

			$sql="CREATE VIEW q7 as
				SELECT productdim.kind,transactiondim.price,SUM(transactiondim.quantity) as sale FROM fact,productdim,transactiondim
                WHERE fact.transaction_id=transactiondim.transaction_id AND fact.product_id=productdim.product_id AND productdim.product_name='$product_name'
                GROUP BY transactiondim.price";
				
			$result = $conn->query($sql);
			
			$sql1="select * from q7";
			$result = $conn->query($sql1);

            // output data of each row
            while($row = $result->fetch_assoc()) {
                $pic = $row["price"];
				$pic1= $row["sale"];
                //echo $pic."<br/>";
				//echo $pic1."<br/>";
               echo"{ x:".$pic.", y:".$pic1."},";

            }
			$sql3="drop view q7";
			$result = $conn->query($sql3);

?>