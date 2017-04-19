
<html>
	<head>
		<title>
			Welcome to INFSCI 2710
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


			$i = 1;
			$sql = "Select * From Product order by -price";
			// Run a sql
			$result = $conn->query($sql);
			if ($result)
			{
				echo "<table border=1px>";
				while($row = $result->fetch_assoc())
				{
					echo "<tr>";
					echo "<td><input type=checkbox name='".$i."'></td>";
					foreach($row as $key=>$value)
					{
						echo "<td>$value</td>";
						$i++;
					}
					echo "</tr>";
				}
				echo "</table>";
			}
			$result->free();
			$i = 0;
			// Close connection
			mysqli_close($conn);
		?>
	</body>
</html>