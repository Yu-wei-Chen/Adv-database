
<html>
	<head>
		<title>
			Welcome to INFSCI 2710111
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
			//DELETE FROM `Login_Customer`  ID_Customer = 12

			$sql = "DELETE FROM `Manager` WHERE manager_name = 'MDDDD'";

			if ($conn->query($sql) === TRUE) {
			    echo "New record created successfully";
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();
			?>
	</body>
</html>