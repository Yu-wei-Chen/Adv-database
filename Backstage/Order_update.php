<?php

session_start();
                //  echo $_SESSION['mStoreid'];
                //  echo $_SESSION['job'];
                //  echo $_SESSION['mstate'];
                    $Mid = $_SESSION['Mid'];

            $Tid = $_GET['Tid'];
            $check = $_GET['check'];
            
            //echo $Sid."<BR>".$Sname."<BR>";

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


            if ($check == "A") {
                //echo $Tid;
                $sql4 = "UPDATE Transaction SET `status`='success' WHERE ID_Transaction = $Tid ";
            }else{
                //echo $check;
                $sql4 = "UPDATE Transaction SET `status`='reject' WHERE ID_Transaction = $Tid ";
            }

            if ($conn->query($sql4) === TRUE) {
                    echo "<script>alert('Update successfully'); location.href = 'order.php'; </script>"; //
            }else{
                    echo "<script>alert('Update failed! Please re-submit'); location.href = 'order.php';</script>";//
            }

            // Close connection
            mysqli_close($conn);
        //}
?>

        






