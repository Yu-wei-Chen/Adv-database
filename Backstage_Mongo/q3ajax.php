<?php
include_once("Q3_mongo.php");
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
//q3
     //if(isset($_GET['a_q2_to'])) {$a_q2_to=$_GET['a_q2_to'];} else{$a_q2_to="";}
     if(isset($_GET['a_q3_from'])) {$a_q3_from=$_GET['a_q3_from'];} else{$a_q3_from="";}
     if($a_q3_from != ""){
         $sql="select fromyear,frommonth,fromday,toyear,tomonth,today from query where id =3";
         $result=mysqli_query($conn,$sql);
         $total_records=mysqli_num_rows($result);
         for($i=1;$i<=$total_records;$i++){
         $row=$result->fetch_row();
          //use this filter variables
          $fromyear=$row[0];
          $frommonth=$row[1];
          $fromday=$row[2];     
          $toyear=$row[3];
          $tomonth=$row[4];
          $today=$row[5];
         }
         echo "<table>
                        <tr>
                            <th >Top 5 Product</th>
                            <th >Total Sales</th>
                        </tr>";
                for($i=0;$i<sizeof($top5['result']);$i++){
                    //print_r($top5['result'][$i]);//['_id']['store'] //['total']
                    echo "<tr>
                            <td>".$top5['result'][$i]['_id']['product_name']."</td>".
                            "<td>".$top5['result'][$i]['total']."</td>
                          </tr>";
                    
                }            
         echo "<table>
                        <tr>
                            <th >Bot 5 Product</th>
                            <th >Total Sales</th>
                        </tr>";
                for($i=0;$i<sizeof($bot5['result']);$i++){
                    //print_r($top5['result'][$i]);//['_id']['store'] //['total']
                    echo "<tr>
                            <td>".$bot5['result'][$i]['_id']['product_name']."</td>".
                            "<td>".$bot5['result'][$i]['total']."</td>
                          </tr>";
                    
                }                
                            
        echo "</table>";
         
    }else {echo "null";}
?>