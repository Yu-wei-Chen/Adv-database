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
<script type="text/javascript">

function isEmail(strEmail) {
    if (strEmail.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) != -1){
        return true;
    }else{
        alert("Email fomat wrong");
    }
}

function isPhone(strPhone) {
    if (strPhone.search(/^[0-9]{10}$/) != -1){
        return true;
    }else{
        alert("Phone fomat wrong");
    }
}
</script>
<body>
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
                <a href="index.php">Home</a>
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

    <div class="container">
        <div class="register">
            <h1>Customer Register</h1>
            <form action="customer_registering.php" method="post">
                <div class="col-md-6  register-top-grid">

                    <div class="mation">
                        <span>Name</span>
                        <input type="text" name="name" value="AA">
                        <span>Age</span>
                        <input type="text" name="Age" value="23">
                        <span>Gender</span>
                        <input type="text" name="Gender" value="male">
                        <span>Address</span>
                        <input type="text" name="Address" value="5th Ave">
                        <span>State</span>
                        <input type="text" name="state" value="NY">
                        <span>Income</span>
                        <input type="text" name="income" value="123456789">
                        <span>Phone</span>
                        <input type="text" name="phone" onblur="isPhone(this.value)" value="">
                        <span>Email Address</span>
                        <input type="text" name="email" onblur="isEmail(this.value)" value="">
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class=" col-md-6 register-bottom-grid">

                    <div class="mation">
                        <span>User Name</span>
                        <input type="text" name="username" value="AA">
                        <span>Password</span>
                        <input type="text" name="password" value="123">
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