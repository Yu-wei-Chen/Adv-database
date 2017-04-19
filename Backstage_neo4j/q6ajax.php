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
     
     if(isset($_GET['a_q6_from'])) {$a_q6_from=$_GET['a_q6_from'];} else{$a_q6_from="";}
     if($a_q6_from != ""){
         $sql="select product_name from query where id =6";
         $result=mysqli_query($conn,$sql);
         $total_records=mysqli_num_rows($result);
         for($i=1;$i<=$total_records;$i++){
         $row=$result->fetch_row();
          //use this filter variables
          $product_name=$row[0];
          
         }

         $sql="CREATE VIEW q6 as
				SELECT fact.year,fact.month,productdim.product_name,companydim.category,SUM(transactiondim.quantity) FROM fact,companydim,productdim,transactiondim WHERE fact.company_id=companydim.company_id AND fact.product_id=productdim.product_id AND fact.transaction_id=transactiondim.transaction_id AND productdim.product_name='$product_name' GROUP BY fact.year,fact.month,companydim.category,productdim.product_name ORDER BY SUM(transactiondim.quantity) DESC LIMIT 1";

         $result = $conn->query($sql);

         $sql1="select * from q6";
         $result = $conn->query($sql1);

         // output data of each row
         while($row = $result->fetch_assoc()) {
             $pic = $row["product_name"];
             $pic1 = $row["category"];
             echo "
                           <div >
                            <table>
                              <tr>
                                <th>Product Name</th>
                                <th>business</th>
                               
                              </tr>
                              <tr>
                                <td>$pic</td>
                                <td>$pic1</td>
                              
                              </tr>
                            
                            </table>
                            </div>
         ";

         }
    }
$sql3="drop view q6";
$result = $conn->query($sql3);
?>