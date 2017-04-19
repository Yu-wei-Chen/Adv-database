<?php

session_start();
                //  echo $_SESSION['mStoreid'];
                //  echo $_SESSION['job'];
                //  echo $_SESSION['mstate'];
                    $Mid = $_SESSION['Mid'];

            $name = $_POST['name'];
            $price = $_POST['price'];
            $inventory = $_POST['inventory'];
            $describe = $_POST['describe'];
            $Pid = $_POST['Pid'];
            
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
                    //echo "success"."<BR>";
                    $location = "/final/images/".$_FILES["myfile"]["name"]; // sql location

                    $sql5 = "UPDATE Product SET `image`='$location' WHERE ID_Product = $Pid ";

                    if ($conn->query($sql5) === TRUE) {
                            //echo "<script>alert('Update successfully'); location.href = 'faculty.php';</script>"; //
                    }else{
                            //echo "<script>alert('Update failed! Please re-submit'); location.href = 'editFaculty.php';</script>";
                    }

                }
            } else {
                //顯示錯誤代碼
                //echo "Error Code: ".$_FILES["myfile"]["error"];
            }


            $sql4 = "UPDATE Product SET `product_name`='$name',`price` = $price,`inventory`= $inventory,`description`='$describe' WHERE ID_Product = $Pid ";

            if ($conn->query($sql4) === TRUE) {
                    echo "<script>alert('Update successfully'); location.href = 'Product.php';</script>"; //
            }else{
                    echo "<script>alert('Update failed! Please re-submit'); location.href = 'editProduct.php';</script>";//
            }

            // Close connection
            mysqli_close($conn);
        //}
?>

        






