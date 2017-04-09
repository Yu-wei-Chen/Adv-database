<?php
			// connect to MySQL
            include_once("config.php");

			$name = $_POST["name"];
            $Age = $_POST["Age"];
            $Gender = $_POST["Gender"];
            $Address = $_POST["Address"];
            $state = $_POST["state"];
            $income = $_POST["income"];
            $phone = $_POST["phone"];
            $email = $_POST["email"];
            $username = $_POST["username"];
            $password = $_POST["password"];


            $sql5 = "SELECT * FROM Login_Customer where username = '$username' ";
            	$result5 = $conn->query($sql5);

	            while($row5 = $result5->fetch_assoc()) {
	            	$username_wrong = $row5["username"];
	            }

            if ($username == $username_wrong){

				echo "<script>alert('".$username_wrong." already be used, please change another one');location.href = 'register_customer.php';</script>";
				exit;
            }


			$sql1 = "Insert into Customer values (NULL, '$name', '$Age','$Gender','$Address','$email','$phone','$income','$state')"; // insert into customer
			$sql2 = "Insert into Login_Customer values (NULL, '$username', '$password')"; // insert into login_customer

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