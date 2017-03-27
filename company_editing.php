			<?php

			session_start();
			$cid = $_SESSION['id'];
			//echo $cid;

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

            //echo "company"."<BR>";
            //echo $name;

			$sql1 = "Update Company set company_name='$name',address='$address',state='$state',income='$income',category='$category',phone='$phone',email='$email' where ID_Company = $cid"; // insert into company
			$sql2 = "Update Login_Company set username='$username',password='$password' where ID_Company = $cid"; // insert into login

			if ($conn->query($sql2) === TRUE) {
			   //echo "login record created successfully". "<br>";
			} else {
			   //echo "Error: login" . $sql2 . "<br>" . $conn->error. "<br>". "<br>";
			}


			if ($conn->query($sql1) === TRUE) {
			    //echo "company record created successfully";
			} else {
			    //echo "Error: company" . $sql1 . "<br>" . $conn->error;
			}

			$conn->close();

			echo "<script>alert('Edited Success!');location.href = 'login.php';</script>";

			?>