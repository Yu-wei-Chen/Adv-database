<?php 
    session_start();
    //echo "session id ====".$_SESSION['id']."<BR>";
    //echo $_SESSION['type'];
?>
<!DOCTYPE html  PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>shopping</title>
    <link type="text/css" rel="stylesheet" href= main.css>
    <link type="text/css" rel="stylesheet" href="css/main.css"/>
    <link href="login.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="js.js"></script>
</head>
<?php
            
            // connect to MySQL
            include_once("config.php");


            
            //echo "<p><font color=\"red\">Connected successfully</font></p>";
            $sid = $_SESSION['id'];
            // Run a sql
            $sql = "SELECT * FROM Company where ID_Company = $sid "; // find the top 5 popular item
            $result = $conn->query($sql);
            
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $cname = $row["company_name"];
                $caddress = $row["address"];
                $cemail = $row["email"];
                $cphone = $row["phone"];
                $ccategory = $row["category"];
                $cincome = $row["income"];
                $cstate = $row["state"];
            }


            $sql1 = "SELECT * FROM Login_Company where ID_Company = $sid "; // find the top 5 popular item
            $result1 = $conn->query($sql1);
            
            // output data of each row
            while($row1 = $result1->fetch_assoc()) {
                $username = $row1["username"];
                $pwd = $row1["password"];
            }
            //$i = 0;    
            // Close connection
            mysqli_close($conn);
        ?>
<body>
<div class="main">

    <div class="header">
        <div class="right-bg"></div>
        <ul class="worp">

            <li class="logo"><img src="/final/image/logo.jpg" alt=""/></li>
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
                <a href="index.php">Home</a>
                <a href="product.php?gender=male">Man</a>
                <a href="product.php?gender=female">Woman</a>
                <a href="Item.php?pid=1">Item</a>

                <a href="orders.php" class="a1">Members</a>
                <a href="login.php">Login</a>
                <a href="CheckOut.php">Cart</a>
                <a href="contact.php">Contact</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="register">
            <h1>Company Edition</h1>
            <form action="company_editing.php" method="post">
                <div class="col-md-6  register-top-grid">

                    <div class="mation">
                        <span>Name</span>
                        <input type="text" name="name" value=<?php echo $cname; ?>>
                        <span>Address</span>
                        <input type="text" name="address" value=<?php echo $caddress; ?>>
                        <span>State</span>
                        <input type="text" name="state" value=<?php echo $cstate; ?>>
                        <span>Income</span>
                        <input type="text" name="income" value=<?php echo $cincome; ?>>
                        <span>Category</span>
                        <input type="text" name="category" value=<?php echo $ccategory; ?>>
                        <span>Phone</span>
                        <input type="text" name="phone" value=<?php echo $cphone; ?>>
                        <span>Email Address</span>
                        <input type="text" name="email" value=<?php echo $cemail; ?>>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class=" col-md-6 register-bottom-grid">

                    <div class="mation">
                        <span>User Name</span>
                        <input type="text" name="username" value=<?php echo $username; ?>>
                        <span>Password</span>
                        <input type="text" name="password" value=<?php echo $pwd; ?>>
                    </div>
                </div>
                <div class="register-but">
                    <input type="submit" value="submit">
                </div>
            </form>


        </div>
    </div>
</div>
</body>
</html>