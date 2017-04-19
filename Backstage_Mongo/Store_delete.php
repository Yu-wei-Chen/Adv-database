<?php

session_start();
                //  echo $_SESSION['mStoreid'];
                //  echo $_SESSION['job'];
                //  echo $_SESSION['mstate'];
                    $Mid = $_SESSION['Mid'];


            $Sid = $_GET['Sid'];        

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
            $sql1 = "DELETE FROM Login_Manager WHERE ID_Store = $Sid ";

            if ($conn->query($sql1) === TRUE) {
                //echo "<script>alert('Delete successfully'); location.href = 'faculty.php';</script>"; //
            }else{
                //echo $sql."<script>alert('Delete failed! Please re-submit'); location.href = 'editFaculty.php';</script>"; //
            }

            $sql = "DELETE FROM Manager WHERE ID_Store = $Sid ";

            if ($conn->query($sql) === TRUE) {
                //echo "<script>alert('Delete successfully'); location.href = 'faculty.php';</script>"; //
            }else{
                //echo $sql."<script>alert('Delete failed! Please re-submit'); location.href = 'editFaculty.php';</script>"; //
            }

            

            $sql = "DELETE FROM Transaction WHERE ID_Store = $Sid ";

            if ($conn->query($sql) === TRUE) {
                //echo "<script>alert('Delete successfully'); location.href = 'faculty.php';</script>"; //
            }else{
                //echo $sql."<script>alert('Delete failed! Please re-submit'); location.href = 'editFaculty.php';</script>"; //
            }

            $sql = "DELETE FROM Product WHERE ID_Store = $Sid ";

            if ($conn->query($sql) === TRUE) {
                //echo "<script>alert('Delete successfully'); location.href = 'faculty.php';</script>"; //
            }else{
                //echo $sql."<script>alert('Delete failed! Please re-submit'); location.href = 'editFaculty.php';</script>"; //
            }
            
            $sql = "DELETE FROM Salary WHERE ID_Store = $Sid ";

            if ($conn->query($sql) === TRUE) {
                //echo "<script>alert('Delete successfully'); location.href = 'faculty.php';</script>"; //
            }else{
                //echo $sql."<script>alert('Delete failed! Please re-submit'); location.href = 'editFaculty.php';</script>"; //
            }

            $sql = "DELETE FROM Store WHERE ID_Store = $Sid ";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Delete successfully'); location.href = 'store.php';</script>"; //
            }else{
                echo $sql."<script>alert('Delete failed! Please re-submit'); location.href = 'editStore.php';</script>"; //
            }


            // Close connection
            mysqli_close($conn);
        //}
?>

        






