<?php

session_start();
                //  echo $_SESSION['mStoreid'];
                //  echo $_SESSION['job'];
                //  echo $_SESSION['mstate'];
                    $Mid = $_SESSION['Mid'];

            $Sname = $_POST['Store_name'];
            $Manager_name = $_POST['Manager_name'];
            $Manager_address = $_POST['Manager_address'];
            $Manager_email = $_POST['Manager_email'];
            $Manager_phone = $_POST['Manager_phone'];
            $Manager_state = $_POST['Manager_state'];
            $Salary_C = $_POST['Salary_C'];
            $Salary_M = $_POST['Salary_M'];    
            $Manager_username = $_POST['Manager_username'];
            $Manager_password = $_POST['Manager_password'];       
            
            //echo "<BR>"."<BR>".$Sname; 

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

            $sql4 = "Insert into Login_Manager values (NULL, '$Manager_username', '$Manager_password') ";

            if ($conn->query($sql4) === TRUE) {
                    //echo "<script>alert('Update successfully'); location.href = 'Store.php';</script>"; //
            }else{
                    //echo "<script>alert('Update failed! Please re-submit'); location.href = 'editStore.php';</script>";
            }

            $sql7 = "SELECT * FROM Login_Manager "; 
            //echo "<BR>"."<BR>".$sql."<BR>"."<BR>"."<BR>"."<BR>";
            $result7 = $conn->query($sql7);
            

            while($row7 = $result7->fetch_assoc()) {
                //$i++; 
                $ID_Manager = $row7["ID_Manager"];
            }

            //echo "<BR>"."<BR>".$ID_Manager;

            $sql = "Insert into Store values (NULL, '$Sname', '$ID_Manager') ";

            if ($conn->query($sql) === TRUE) {

                $sql6 = "SELECT * FROM Store "; 
                //echo "<BR>"."<BR>".$sql."<BR>"."<BR>"."<BR>"."<BR>";
                $result6 = $conn->query($sql6);
                

                while($row6 = $result6->fetch_assoc()) {
                    //$i++; 
                    $ID_Store = $row6["ID_Store"];
                }

                $sql2 = "Insert into Salary values ('clerk', $ID_Store, $Salary_C) ";

                if ($conn->query($sql2) === TRUE) {
                    //echo "<script>alert('Update successfully'); location.href = 'Store.php';</script>"; //
                }else{
                    //echo "<script>alert('Update failed! Please re-submit'); location.href = 'editStore.php';</script>";
                }

                $sql3 = "Insert into Salary values ('manager', $ID_Store, $Salary_M) ";

                if ($conn->query($sql3) === TRUE) {
                    //echo "<script>alert('Update successfully'); location.href = 'Store.php';</script>"; //
                }else{
                    //echo "<script>alert('Update failed! Please re-submit'); location.href = 'editStore.php';</script>";
                }

                $sql2 = "Insert into Manager values (NULL,'$Manager_name','$Manager_address','$Manager_email','$Manager_phone','manager', $ID_Store, '$Manager_state') ";

                if ($conn->query($sql2) === TRUE) {
                    //echo "<script>alert('Update successfully'); location.href = 'Store.php';</script>"; //
                }else{
                    //echo "<script>alert('Update failed! Please re-submit'); location.href = 'editStore.php';</script>";
                }



                //還需要新增　Manager 然後把Manager ID加到Store表中



                echo "<script>alert('Add successfully'); location.href = 'Store.php';</script>"; //
            }else{
                echo "<script>alert('Add failed! Please re-submit'); location.href = 'editStore.php';</script>";//
            }



            // Close connection
            mysqli_close($conn);
        //}
?>

        






