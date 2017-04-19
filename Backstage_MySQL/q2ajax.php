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
			
			$sql="CREATE VIEW a2 as
				SELECT fact.year,fact.month,storedim.store_id,storedim.store_name,SUM(transactiondim.price*transactiondim.quantity) as total,regiondim.region
				FROM fact,storedim,regiondim,transactiondim
				WHERE fact.store_id=storedim.store_id AND fact.region_id=regiondim.region_id AND fact.transaction_id=transactiondim.transaction_id
				GROUP BY fact.year,fact.month,fact.store_id,fact.region_id";
				
			$result = $conn->query($sql);
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
          $fromyear=$row[0];
          $frommonth=$row[1];
          $toyear=$row[2];
          $tommonth=$row[3];     
         }
			 
  		$sql1 = "SELECT aa.year, aa.month, aa.total, ab.year, ab.month, ab.store_name, ab.total as total2 FROM a2 aa, a2 ab WHERE aa.year = $fromyear and aa.month = $frommonth and ab.year = $toyear and ab.month = $tommonth and aa.store_name=ab.store_name and ab.total>aa.total";
		
  		$result = $conn->query($sql1);
		
		while($row = $result->fetch_assoc()) {
            $pic = $row["store_name"];
  			$pic1 = $row["total"];
  			$pic2 = $row["total2"];

            echo "
                           <div >
                            <table>
                              <tr>
                                <th>Store Name</th>
                                <th>From</th>
								<th>To</th>
                              </tr>
                              <tr>
                                <td>$pic</td>
                                <td>$$pic1</td>
								<td>$$pic2</td>
                              </tr>
                            </table>
                            </div>
         ";

 		}

    }$sql3="drop view a2";
			$result = $conn->query($sql3);

?>