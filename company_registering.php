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

			$name = $_POST["name"];
            $address = $_POST["address"];
            $state = $_POST["state"];
            $income = $_POST["income"];
            $category = $_POST["category"];
            $phone = $_POST["phone"];
            $email = $_POST["email"];
            $username = $_POST["username"];
            $password = $_POST["password"];


            $sql5 = "SELECT * FROM Login_Company where username = '$username' ";
            	$result5 = $conn->query($sql5);

	            while($row5 = $result5->fetch_assoc()) {
	            	$username_wrong = $row5["username"];
	            }

            if ($username == $username_wrong){

				echo "<script>alert('".$username_wrong." already be used, please change another one');location.href = 'register_company.php';</script>";
				exit;
            }


			$sql1 = "Insert into Company values (NULL, '$name', '$address','$state','$income','$category','$phone','$email')"; // insert into company
			$sql2 = "Insert into Login_Company values (NULL, '$username', '$password')"; // insert into login

			if ($conn->query($sql2) === TRUE) {
			   //echo "login record created successfully";
			} else {
			   //echo "Error: login" . $sql2 . "<br>" . $conn->error;
			}


			if ($conn->query($sql1) === TRUE) {
			    //echo "company record created successfully";
			} else {
			    //echo "Error: company" . $sql1 . "<br>" . $conn->error;
			}

			$conn->close();

			echo "<script>alert('Congratulation! Please Login');location.href = 'login.php';</script>";

			?>