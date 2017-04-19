<?php
include_once("Q8_mongo.php");
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
         
        echo "
                           
                            <table>
                              <tr>
                                <th>Customer Name</th>
                                <th>Product name</th>
                                
                              </tr>";
         $k = 0;
         for($i=0;$i<sizeof($week_buy2['result']);$i++){
            if (!isset($week_buy2['result'][$i]['_id']['customer_id'])){$week_buy2['result'][$i]['_id']['customer_id']=0;}
            if($week_buy2['result'][$i]['count']>1 && $week_buy2['result'][$i]['_id']['customer_id']!=null){     
                    echo "<tr>
                            <td>$customer_name[$k]</td>
                            <td>$product_name[$k]</td>
                            <td></td>
                          </tr>";
                    $k++;
            }
         }
         echo "</table>";
         
    }else {echo "null";}
?>
