<?php

session_start();
                //  echo $_SESSION['mStoreid'];
                //  echo $_SESSION['job'];
                //  echo $_SESSION['mstate'];
                    $Mid = $_SESSION['Mid'];

                    $Sid = $_GET['Sid'];

            

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
            
            $sql = "SELECT * FROM Store where ID_Store = $Sid "; 
            //echo "<BR>"."<BR>".$sql."<BR>"."<BR>"."<BR>"."<BR>";
            $result = $conn->query($sql);
            

            while($row = $result->fetch_assoc()) {
                //$i++; 
                $Manager = $row["ID_Manager"];
                $Sname = $row["store_name"];
            }

            $sql2 = "SELECT * FROM Salary where ID_Store = $Sid and job_title = 'clerk' "; 
            //echo "<BR>"."<BR>".$sql."<BR>"."<BR>"."<BR>"."<BR>";
            $result2 = $conn->query($sql2);

            while($row2 = $result2->fetch_assoc()) {
                //$i++; 
                $salary_C = $row2["salary"];
            }

            $sql3 = "SELECT * FROM Salary where ID_Store = $Sid and job_title = 'manager' "; 
            //echo "<BR>"."<BR>".$sql."<BR>"."<BR>"."<BR>"."<BR>";
            $result3 = $conn->query($sql3);

            while($row3 = $result3->fetch_assoc()) {
                //$i++; 
                $salary_M = $row3["salary"];
            }

            //echo $Manager;

            $sql4 = "SELECT * FROM Manager where ID_Manager = $Manager "; 
            //echo "<BR>"."<BR>".$sql."<BR>"."<BR>"."<BR>"."<BR>";
            $result4 = $conn->query($sql4);

            while($row4 = $result4->fetch_assoc()) {
                //$i++; 
                $Manager_name = $row4["manager_name"];
                $Manager_address = $row4["address"];
                $Manager_email = $row4["email"];
                $Manager_phone = $row4["phone"];
                $Manager_state = $row4["state"];
            }


            $sql5 = "SELECT * FROM Login_Manager where ID_Manager = $Manager "; 
            //echo "<BR>"."<BR>".$sql."<BR>"."<BR>"."<BR>"."<BR>";
            $result5 = $conn->query($sql5);

            while($row5 = $result5->fetch_assoc()) {
                //$i++; 
                $Manager_username = $row5["username"];
                $Manager_password = $row5["password"];
            }
            


            // Close connection
            mysqli_close($conn);
        //}
?>

        






