<?php

session_start();
                //  echo $_SESSION['mStoreid'];
                //  echo $_SESSION['job'];
                //  echo $_SESSION['mstate'];
                    $Mid = $_SESSION['Mid'];

            $name = $_POST['name'];
            $kind = $_POST['kind'];
            $store = $_POST['store'];
            $price = $_POST['price'];
            $inventory = $_POST['inventory'];
            $gender = $_POST['gender'];
            $describe = $_POST['describe']; 
            
            //echo "<BR>"."<BR>".$Sname; 
            if ($price < 0) {
                echo "<script>alert('Price can not lower than 0'); location.href = 'addProduct.php';</script>"; 
                exit;
            }
            //echo $F_store;

            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "final";

            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 


            $target_dir = "../images/";
            if ($_FILES["myfile"]["error"] == 0) {
                //檢查是否有上傳檔案
                if(!empty($_FILES["myfile"]["name"])) {
                    //顯示上傳的檔案名稱
                    //echo "FileName:".$_FILES["myfile"]["name"]."<br>";
                    //顯示上傳檔案的Content-Type
                    //echo "Content-Type:".$_FILES["myfile"]["type"]."<br>";
                    //顯示檔案大小
                    //echo "FileSize:".$_FILES["myfile"]["size"]."<br>";
                    //echo "<hr>";
                    //搬移上傳的檔案
                    move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_dir.$_FILES["myfile"]["name"]);
                }
            } else {
                //顯示錯誤代碼
                echo "Error Code: ".$_FILES["myfile"]["error"];
            }

            $location = "/final/images/".$_FILES["myfile"]["name"]; // sql location


            $sql4 = "Insert into Product values (NULL, '$name', $inventory, $price, '$kind', '$gender', '$describe', '$location', $store) ";

            //echo $sql4;

            if ($conn->query($sql4) === TRUE) {
                    echo "<script>alert('Update successfully'); location.href = 'Product.php';</script>"; //
            }else{
                    //echo "<script>alert('Update failed! Please re-submit'); location.href = 'editStore.php';</script>";
            }


            // Close connection
            mysqli_close($conn);
        //}
?>

        






