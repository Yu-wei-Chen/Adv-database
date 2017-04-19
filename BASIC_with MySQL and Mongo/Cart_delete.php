
		<?php

			session_start();
    		//echo "session id ====".$_SESSION['id']."<BR>";
    		//echo $_SESSION['type'];

			echo $_SESSION['id'];

            $tid = $_GET['tid'];

			// connect to MySQL
            include_once("config.php");


			echo "delete";


			$sql = "DELETE FROM Transaction WHERE ID_Transaction = $tid";

			if ($conn->query($sql) === TRUE) {
			    echo "<script>location.href = 'CheckOut.php';</script>";
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();
			?>