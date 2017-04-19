
<html>
	<head>
		<title>
		</title>
	</head>
	<body>
		
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
			echo "<p><font color=\"red\">Connected successfully</font></p>";

			// Run a sql
			


			$sql = "SELECT * FROM Product";
			$result = $conn->query($sql);

			
			    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        echo "id: " . $row["product_name"]. " - Name: " . $row["price"]. "<img src=" . $row["image"]. " /> <br>";
		        echo $row["image"];
			}
				 
			// Close connection
			mysqli_close($conn);
		?>
	</body>
</html>