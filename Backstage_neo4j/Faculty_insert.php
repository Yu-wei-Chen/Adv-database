<?php

session_start();
                //  echo $_SESSION['mStoreid'];
                //  echo $_SESSION['job'];
                //  echo $_SESSION['mstate'];
                    $Mid = $_SESSION['Mid'];

            $F_name = $_POST['F_name'];
            $F_store = $_POST['F_store'];
            $F_state = $_POST['F_state'];
            $F_email = $_POST['F_email'];
            $F_phone = $_POST['F_phone'];
            $F_address = $_POST['F_address'];
            $F_username = $_POST['F_username'];
            $F_password = $_POST['F_password'];       
            
            //echo "<BR>"."<BR>".$Sname; 

            //echo $F_store;

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
            //echo "<p><font color=\"red\">Connected successfully</font></p>";

            $sql4 = "Insert into Manager values (NULL, '$F_name', '$F_address', '$F_email', '$F_phone', 'clerk', $F_store, '$F_state') ";

            //echo $sql4;

            if ($conn->query($sql4) === TRUE) {
                    //echo "<script>alert('Update successfully'); location.href = 'Store.php';</script>"; //
            }else{
                    //echo "<script>alert('Update failed! Please re-submit'); location.href = 'editStore.php';</script>";
            }

            $sql5 = "Insert into Login_Manager values (NULL, '$F_name', '$F_password') ";

            if ($conn->query($sql5) === TRUE) {
                    echo "<script>alert('Add successfully');location.href = 'faculty.php'; </script>"; //
            }else{
                    //echo "<script>alert('Update failed! Please re-submit'); location.href = 'editStore.php';</script>";
            }

            // Close connection
            mysqli_close($conn);
        //}
?>

        






