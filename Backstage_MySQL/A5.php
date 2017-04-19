<?php
            
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

                $time = "select fromyear,frommonth from query where id =5";
                $result = $conn->query($time);
                while($row = $result->fetch_assoc()) {
                    $fromyear = $row["fromyear"];
                    $frommonth = $row["frommonth"];
}
			$sql="CREATE VIEW q5 as
				SELECT fact.year,fact.month,regiondim.region,SUM(transactiondim.price*transactiondim.quantity) as sale FROM fact,regiondim,transactiondim
                WHERE fact.transaction_id=transactiondim.transaction_id AND fact.region_id=regiondim.region_id AND fact.year=$fromyear AND fact.month=$frommonth
                GROUP BY fact.year,fact.month,regiondim.region";
				
			$result = $conn->query($sql);


    $sql1="select region,sale from q5";
    $result = $conn->query($sql1);

$i = 1;
  while($row = $result->fetch_assoc()) {
      $pic[$i]= $row["region"];
      $pic1[$i] = $row["sale"];

      echo "{ x: $i, y: $pic1[$i], label:\"$pic[$i]\"},";

      $i++;
  }

  $sql3="drop view q5";
  $result = $conn->query($sql3);

?>