<?php

session_start();
                //  echo $_SESSION['mStoreid'];
                //  echo $_SESSION['job'];
                //  echo $_SESSION['mstate'];
                    $Mid = $_SESSION['Mid'];


            $Pid = $_GET['Pid'];        

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
            

            $sql = "DELETE FROM Product WHERE ID_Product = $Pid ";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Delete successfully'); location.href = 'Product.php';</script>"; //
            }else{
                echo $sql."<script>alert('Delete failed! Please re-submit'); location.href = 'editProduct.php';</script>"; //
            }

            //要先刪除login, manager, Transaction, salary, Product 才能刪Store.


            // Close connection
            mysqli_close($conn);
        //}
?>

        






