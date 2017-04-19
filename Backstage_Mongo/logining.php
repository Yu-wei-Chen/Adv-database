<?php

                    session_start();
            
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

            $username = $_POST["username"];
            $password = $_POST["password"];


            //echo $username."<BR>".$password."<BR>"."<BR>"."<BR>";
            
            //echo $_SESSION['id']."///";
            //echo "<br/>".$username."<br/>".$password."<br/>".$customertype."<br/>";

            if ($username && $password  != null){
                //echo "post successfully"."<br/>";

                
                    $sql = "SELECT * FROM Login_Manager where username = '$username' and password = '$password'";
                    
                    
                    $result = $conn->query($sql);
                
                    while($row = $result->fetch_assoc()) {
                        $Mid = $row["ID_Manager"];
                    }
                    //echo $Mid."----";
                if ($Mid != null) {

                    $sql1 = "SELECT * FROM Manager where ID_Manager = $Mid ";
                    
                    $result1 = $conn->query($sql1);
                
                    while($row1 = $result1->fetch_assoc()) {
                        $mStoreid = $row1["ID_Store"];
                        $job = $row1["job_title"];
                        $mstate = $row1["state"];
                    }

                    $_SESSION['mStoreid'] = $mStoreid;
                    $_SESSION['job'] = $job;
                    $_SESSION['mstate'] = $mstate;
                    $_SESSION['Mid'] = $Mid;

                        echo "<script>alert('login successfully'); location.href = 'home.php';</script>"; //
                    }else{
                        echo "<script>alert('login failed! Please re-login'); location.href = 'login.php';</script>";
                    }

                }else{
                    //echo "<script>alert('Please re-enter'); </script>";//location.href = 'login.php';
                }
  
            // Close connection
            mysqli_close($conn);
?>