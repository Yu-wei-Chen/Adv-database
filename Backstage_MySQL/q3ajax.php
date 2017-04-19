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
         $sql="CREATE VIEW q32 as
                            SELECT fact.year,fact.month,fact.day,productdim.product_id,productdim.product_name,SUM(transactiondim.quantity*transactiondim.price) as sum FROM fact,transactiondim,productdim
                            WHERE fact.transaction_id=transactiondim.transaction_id AND fact.product_id=productdim.product_id AND fact.year=$fromyear AND fact.month=$frommonth AND fact.day=$fromday
                            GROUP BY fact.year,fact.month,fact.day,productdim.product_id
                            ORDER BY sum ASC LIMIT 5";

         $result = $conn->query($sql);

         $sql1="select product_name,sum from q32";
         $result = $conn->query($sql1);
         $i = 1;
         // output data of each row
         while($row = $result->fetch_assoc()) {
             $pic2[$i] = $row["product_name"];
             $pic3[$i] = $row["sum"];
             //echo $pic2[$i]."<br/>";
             //echo $pic3[$i]."<br/>";
             $i++;
         }



         $sql="CREATE VIEW q3 as
				SELECT fact.year,fact.month,fact.day,productdim.product_id,productdim.product_name,SUM(transactiondim.quantity*transactiondim.price) as sum FROM fact,transactiondim,productdim
				WHERE fact.transaction_id=transactiondim.transaction_id AND fact.product_id=productdim.product_id AND fact.year=$fromyear AND fact.month=$frommonth AND fact.day=$fromday
				GROUP BY fact.year,fact.month,fact.day,productdim.product_id
				ORDER BY sum DESC LIMIT 5";

         $result = $conn->query($sql);

         $sql1="select product_name,sum from q3";
         $result = $conn->query($sql1);

         // output data of each row
         $i = 1;
         while($row = $result->fetch_assoc()) {
             $pic = $row["product_name"];
             $pic1 = $row["sum"];

             echo "
                           <div >
                            <table>
                              <tr>
                                <th>TOP</th>
                                <th>BOTTOM</th>
                       
                              </tr>
                              <tr>
                                <td>$pic&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$$pic1</td>
                                <td>$pic2[$i]&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$$pic3[$i]</td>
                           
                              </tr>
                           
                            </table>
                            </div>
         ";

             $i++;

         }
         $sql3="drop view q3,q32";
         $result = $conn->query($sql3);

    }
?>