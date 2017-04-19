<?php

session_start();
                //  echo $_SESSION['mStoreid'];
                //  echo $_SESSION['job'];
                //  echo $_SESSION['mstate'];
                    $Mid = $_SESSION['Mid'];


            $Cid = $_GET['Cid'];        

            echo $Cid;

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
            $sql1 = "DELETE FROM Login_Manager WHERE ID_Manager = $Cid ";

            if ($conn->query($sql1) === TRUE) {
                //echo "<script>alert('Delete successfully'); location.href = 'faculty.php';</script>"; //
            }else{
                //echo $sql."<script>alert('Delete failed! Please re-submit'); location.href = 'editFaculty.php';</script>"; //
            }

            $sql = "DELETE FROM Manager WHERE ID_Manager = $Cid ";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Delete successfully'); location.href = 'faculty.php';</script>"; //
            }else{
                echo $sql."<script>alert('Delete failed! Please re-submit'); location.href = 'editFaculty.php';</script>"; //
            }

            //要先刪除login, manager, Transaction, salary, Product 才能刪Store.


            // Close connection
            mysqli_close($conn);
        //}
?>

        






