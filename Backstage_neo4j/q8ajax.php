<?php
if(!session_id()) session_start();
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
//q4
     
     if(isset($_GET['a_q8_from'])) {$a_q8_from=$_GET['a_q8_from'];} else{$a_q8_from="";}
     if($a_q8_from != ""){
         $sql="select fromyear,frommonth,fromweek,toyear,tomonth,toweek from query where id =8";
         $result=mysqli_query($conn,$sql);
         $total_records=mysqli_num_rows($result);
         for($i=1;$i<=$total_records;$i++){
         $row=$result->fetch_row();
          //use this filter variables
          $fromyear=$row[0];
          $frommonth=$row[1];
          $fromweek=$row[2];     
          $toyear=$row[3];
          $tomonth=$row[4];
          $toweek=$row[5];
         }


            $sql="CREATE VIEW q8 as
                            Select fact.year,fact.week,customerdim.customer_name,productdim.product_name,count(productdim.product_name) as count FROM transactiondim,fact,productdim,customerdim WHERE fact.customer_id=customerdim.customer_id AND fact.product_id=productdim.product_id AND fact.transaction_id=transactiondim.transaction_id group by fact.year,fact.week,customerdim.customer_name,productdim.product_id having count(productdim.product_name)>=2";

            $result = $conn->query($sql);

            $sql1="select product_name,customer_name,count from q8 where year = $fromyear and week = $fromweek";
            $result = $conn->query($sql1);

            // output data of each row
            while($row = $result->fetch_assoc()) {
                $pic = $row["customer_name"];
                $pic1 = $row["product_name"];
                $pic2 = $row["count"];

                echo "
                           <div >
                            <table>
                              <tr>
                                <th>Customer Name</th>
                                <th>Product Name</th>
                                <th>times</th>
                              </tr>
                              <tr>
                                <td>$pic</td>
                                <td>$pic1</td>
                                <td>$pic2</td>
                              </tr>
                            
                            </table>
                            </div>
                            
                           
         ";
            }
         
    }$sql3="drop view q8";
$result = $conn->query($sql3);
?>
