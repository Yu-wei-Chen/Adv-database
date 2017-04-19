<?php
include_once("Q2_mongo.php");
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
//q2
     //if(isset($_GET['a_q2_to'])) {$a_q2_to=$_GET['a_q2_to'];} else{$a_q2_to="";}
     if(isset($_GET['a_q2_from'])) {$a_q2_from=$_GET['a_q2_from'];} else{$a_q2_from="";}
     if($a_q2_from != ""){
         $sql="select fromyear,frommonth,toyear,tomonth from query where id =2";
         $result=mysqli_query($conn,$sql);
         $total_records=mysqli_num_rows($result);
         for($i=1;$i<=$total_records;$i++){
         $row=$result->fetch_row();
          //use this filter variables
          $fromyear=(int)$row[0];
          $frommonth=(int)$row[1];
          $toyear=(int)$row[2];
          $tommonth=(int)$row[3];     
         }
         
            if ((1000*$fromyear)+$frommonth<(1000*$toyear)+$tommonth){        
            //calculate the sales is increasing or not  
                     echo "<table>
                        <tr>
                            <th>Store</th>
                            <th>Region</th>
                        </tr>";
                for($j=0;$j<sizeof($index_store);$j++){
                    $tem = $array2[$index_store[$j]][$index_region[$j]]-$array1[$index_store[$j]][$index_region[$j]];

                    if($tem>0){
                        echo "<tr>
                                <td>Store$index_store[$j]</td>
                                <td>Region$index_region[$j]</td>
                              </tr>";

                    }


                }
                     echo "</table>";




            }else {echo "You should choose the right time range! ";}
    }
?>