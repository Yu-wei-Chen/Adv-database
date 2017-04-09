<?php
    session_start();

    //echo $_SESSION['id']."<BR>";
    //echo $_SESSION['type'];



    if ($_SESSION['type'] == "Customer"){
    	echo "<script>location.href = 'edit_customer.php';</script>";
    }else{
    	echo "<script>location.href = 'edit_company.php';</script>";
    }




?>


