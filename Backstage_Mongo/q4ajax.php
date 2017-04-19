<?php
include_once("Q4_mongo.php");
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
     
     if(isset($_GET['a_q4_from'])) {$a_q4_from=$_GET['a_q4_from'];} else{$a_q4_from="";}
     if($a_q4_from != ""){
         
         echo "<table>
                        <tr>
                            <th >Top 2 Company Type</th>
                            
                        </tr>";
                for($i=1;$i<sizeof($top2c['result']);$i++){
                    //print_r($top5['result'][$i]);//['_id']['store'] //['total']
                    echo "<tr>
                            <td>".$topcc[$i]."</td>".
                         "</tr>";
                    
                }            
         echo "<table>
                        <tr>
                            <th >TOP Product kind</th>
                            
                        </tr>";
                for($i=0;$i<sizeof($top1pk['result']);$i++){
                    //print_r($top5['result'][$i]);//['_id']['store'] //['total']
                    echo "<tr>
                            <td>".$toppk."</td>".
                            
                          "</tr>";
                    
                }                
                            
        echo "</table>";
         
    }else {echo "null";}
?>