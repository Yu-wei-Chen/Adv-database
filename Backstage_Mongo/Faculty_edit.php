<?php

session_start();
                //  echo $_SESSION['mStoreid'];
                //  echo $_SESSION['job'];
                //  echo $_SESSION['mstate'];
                    $Mid = $_SESSION['Mid'];

                    $Cid = $_GET['Cid'];

            

            //echo $cid."<BR>";
            //echo $ctype;

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

            //$search = $_POST["search"];
            
            // Run a sql
            
            $sql = "SELECT * FROM Manager where ID_Manager = $Cid "; 
            //echo "<BR>"."<BR>".$sql."<BR>"."<BR>"."<BR>"."<BR>";
            $result = $conn->query($sql);
            

            while($row = $result->fetch_assoc()) {
                //$i++; 
                $manager_name = $row["manager_name"];
                $address = $row["address"];
                $email = $row["email"];
                $phone = $row["phone"];
                $state = $row["state"];
            }

            $sql2 = "SELECT * FROM Login_Manager where ID_Manager = $Cid "; 
            //echo "<BR>"."<BR>".$sql."<BR>"."<BR>"."<BR>"."<BR>";
            $result2 = $conn->query($sql2);

            while($row2 = $result2->fetch_assoc()) {
                //$i++; 
                $username = $row2["username"];
                $password = $row2["password"];
            }

            // Close connection
            mysqli_close($conn);
        //}
?>

        






