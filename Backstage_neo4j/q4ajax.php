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
     
     if(isset($_GET['a_q4_from'])) {$a_q4_from=$_GET['a_q4_from'];} else{$a_q4_from="";}
     if($a_q4_from != ""){
         $sql="select fromyear,frommonth,fromday,toyear,tomonth,today from query where id =4";
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



			 
         $sql="CREATE VIEW q4 as
				SELECT fact.year,fact.month,fact.day,companydim.category,SUM(transactiondim.quantity*transactiondim.price) as sum FROM companydim,fact,transactiondim
				WHERE fact.company_id=companydim.company_id AND fact.transaction_id=transactiondim.transaction_id AND fact.year=$fromyear AND fact.month=$frommonth AND fact.day=$fromday
				GROUP BY fact.year,fact.month,fact.day,companydim.category
				ORDER BY SUM(transactiondim.quantity*transactiondim.price) DESC LIMIT 2";

         $result = $conn->query($sql);

		 
         $sql1="select category,sum from q4";
		
		 
         $result = $conn->query($sql1);
		
         // output data of each row
         while($row = $result->fetch_assoc()) {
             $pic = $row["category"];
             $pic1 = $row["sum"];
             echo "
                           <div >
                            <table>
                              <tr>
                                <th>TOP</th>             
                              </tr>
                              <tr>
                                <td>$pic</td>

                              </tr>
                   
                            </table>
                        
                            
                            </div>
         ";

         }
         $sql0="CREATE VIEW q41 as
			 SELECT fact.year,fact.month,fact.day,productdim.kind FROM fact,productdim,transactiondim
			 WHERE fact.product_id=productdim.product_id AND fact.transaction_id=transactiondim.transaction_id AND fact.year=$fromyear AND fact.month=$frommonth AND fact.day=$fromday
			 GROUP BY fact.year,fact.month,fact.day,productdim.kind
			 ORDER BY SUM(transactiondim.quantity*transactiondim.price) DESC LIMIT 1";

         $result1 = $conn->query($sql0);
         $sql2="select kind from q41";
         $result1 = $conn->query($sql2);
         while($row = $result1->fetch_assoc()) {
             $pic2 = $row["kind"];

             echo" <div>
                             <table>
                              <tr>
                                
                                <th>Top Product Categories</th>
                          
                              </tr>
                              <tr>
                                <td>$pic2</td>                          
                          
                              </tr>
                   
                            </table>
                            </div>";
         }




     }$sql3="drop view q4,q41";
$result = $conn->query($sql3);
?>