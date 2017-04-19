<?php
    session_start();

    //echo $_SESSION['id']."<BR>";
    //echo $_SESSION['type'];



    

			$cid = $_SESSION['id'];


			// connect to MySQL
            include_once("config.php");

            
			if ($_SESSION['type'] == "Customer"){
    		
				$sql1 = "DELETE FROM Transaction where ID_Customer = $cid";
				$sql2 = "DELETE FROM Login_Customer where ID_Customer = $cid";
				$sql3 = "DELETE FROM Customer where ID_Customer = $cid";

		    }else{
			    $sql1 = "DELETE FROM Transaction where ID_Company = $cid";
				$sql2 = "DELETE FROM Login_Company where ID_Company = $cid";
				$sql3 = "DELETE FROM Company where ID_Company = $cid";

		    }

			if ($conn->query($sql1) === TRUE) {
			   //echo "login record created successfully";
			} else {
			   //echo "Error: login" . $sql2 . "<br>" . $conn->error;
			}


			if ($conn->query($sql2) === TRUE) {
			    //echo "company record created successfully";
			} else {
			    //echo "Error: company" . $sql1 . "<br>" . $conn->error;
			}

			if ($conn->query($sql3) === TRUE) {
			    //echo "company record created successfully";
			} else {
			    //echo "Error: company" . $sql1 . "<br>" . $conn->error;
			}

			$conn->close();


			 // delete session
		    unset($_SESSION['id']);
		    unset($_SESSION['type']);



			echo "<script>alert('Delete Success!');location.href = 'index.php';</script>";


?>


