<?php
include_once("Q6_mongo.php");
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
         echo "
                           <div >
                            <table>
                              <tr>
                                <th>$product_name</th>
                              </tr>
                              <tr>
                                <td>"."Category: ".$pop_category."</td>
                              </tr>
                              <tr>
                                <td>"."total slaes: ".$total_sales."</td>
                              </tr>
                            </table>
                            </div>
         ";
         
    }else {echo "null";}
?>