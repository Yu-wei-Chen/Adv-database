<?php 
    session_start();
?>
<!DOCTYPE html  PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html" xml:lang="en" lang="en">
<head>
    <title>shopping</title>
    <link type="text/css" rel="stylesheet" href= "main.css">
    
    <link type="text/css" rel="stylesheet" href="css/main.css"/>
    <link href="login.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="js.js"></script>
</head>
<body>
<?php

            
            // connect to MySQL
            include_once("config.php");

            $username = $_POST["username"];
            $password = $_POST["password"];
            $customertype = $_POST["button1"];

            //echo $username."<BR>".$password."<BR>".$customertype."<BR>"."<BR>";
            
            if ($_SESSION['id'] != null) {
            echo "<script>location.href = 'index.php';</script>";
            }
            //echo $_SESSION['id']."///";
            //echo "<br/>".$username."<br/>".$password."<br/>".$customertype."<br/>";

            if ($username && $password && $customertype != null){
                //echo "post successfully"."<br/>";

                if ($customertype == "customer") {
                    $sql = "SELECT * FROM Login_Customer where username = '$username' and password = '$password'";
                    $_SESSION['type'] = "Customer";
                    
                    $result = $conn->query($sql);
                
                    while($row = $result->fetch_assoc()) {
                        $uname = $row["ID_Customer"];
                    }

                }else{
                    $sql = "SELECT * FROM Login_Company where username = '$username' and password = '$password'";
                    $_SESSION['type'] = "Company";

                    $result = $conn->query($sql);
                
                    while($row = $result->fetch_assoc()) {
                        $uname = $row["ID_Company"];
                    }
                }
                
                if ($uname != null) {

                    $_SESSION['id'] = $uname;
                    //echo $_SESSION['id'];
                    echo "<script>alert('login successfully'); location.href = 'index.php';</script>";
                }else{
                    echo "<script>alert('login failed! Please re-login');</script>";
                }
            }else{
                //echo "<script>alert('Please re-enter'); </script>";//location.href = 'login.php';
            }
  
            // Close connection
            mysqli_close($conn);
?>
<div class="main">

    <div class="header">
        <div class="right-bg"></div>
        <ul class="worp">

            <li class="logo"><img src="/final/images/logo.jpg" alt=""/></li>
            <li class="right">
                <p class="hot">Enjoy yourself!</p>
                <form action="Product.php" method="POST">
                        <input type="text" id="txt" name="search" onfocus="inputOnfocus()" onblur="inputOnblur()"  style="color:Gray"/>
                        <input type="submit" value="" class="button" />
                    </form>
            </li>

        </ul>
    </div>

    <div class="con">
        <div class="worp">
            <div class="nav">
                <a href="index.php" >Home</a>
                <a href="product.php?gender=male">Man</a>
                <a href="product.php?gender=female">Woman</a>
                <a href="Item.php?pid=1">Item</a>

                <a href="orders.php">Members</a>
                <a href="login.php" class="a1">Login</a>
                <a href="CheckOut.php">Cart</a>
                <a href="contact.php">Contact</a>
            </div>
        </div>
    </div>
<div class="account">
    <div class="container">
        <h1>Login</h1>
        <div class="account_grid">
            <div class="col-md-6 login-right">
                <form action="login.php" method="post">

                    <span>User Name</span>
                    <input type="text" name="username" value="Tony">

                    <span>Password</span>
                    <input type="text" name="password" value="123">
                    </dd>
                    <dd>
                        <table border="0">
                            <tr>
                                <td><input type="radio" name="button1" value="customer" checked/>customer</td>
                                <td><input type="radio" name="button1" value="company" />company</td>
                        </table></dd>
                    <div class="word-in">
                        <input type="submit" value="Login">
                    </div>
                </form>
            </div>
            <div class="col-md-6 login-left">
                <h4>NEW CUSTOMERS</h4>
                <p>By creating an account with our store, you will be able to move through the checkout process faster.</p>
                <a class="acount-btn" href="register_customer.php">Register for customer</a>
                <a class="acount-btn" href="register_company.php">Register for company</a>
                <p>If you are a new,please register first!<br/>Thank you for your corporation!</p>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
  </div>
<div class="foot">
    <div class="copy">
        <p>INFSCI 2710: Database Management Copyright</p>
        <p>University of Pittsburgh<br/>School of Information Sciences</p>
    </div>
</div>
</div>
</body>
</html>