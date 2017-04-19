			<?php

			session_start();
			$cid = $_SESSION['id'];


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

            //echo "customer";

			$sql1 = "Update Customer set customer_name='$name',address='$Address',age='$Age',state='$state',income='$income',gender='$Gender',phone='$phone',email='$email' where ID_Customer = $cid"; // insert into company
			$sql2 = "Update Login_Customer set username='$username',password='$password' where ID_Customer = $cid"; // insert into login

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

			echo "<script>alert('Edited Success!');location.href = 'login.php';</script>";

			?>