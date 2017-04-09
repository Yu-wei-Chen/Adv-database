<?php 
    session_start();
    if ($_SESSION['id']==null){
        echo "<script>alert('Please login First');location.href = 'login.php';</script>";
    }
?>
<!DOCTYPE html  PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>shopping</title>
    <link type="text/css" rel="stylesheet" href="css/main.css"/>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
    <script type="text/javascript" src="js/js.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>

<body>
<div class="main">
    <div class="header">
        <div class="right-bg"></div>
        <ul class="worp">

            <li class="logo"><img src="images/logo.jpg" alt="logo"/></li>
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
                <a href="login.php">Login</a>
                <a href="CheckOut.php" class="a1">Cart</a>
                <a href="contact.php">Contact</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="check-out">
            <h1>Checkout</h1>
            <form action="buy.php" method="post">
            <table>
                <tr>
                    <th>Item</th>
                    <th>Qty</th>
                    <th>Total Prices</th>
                    <th>Purchase Date</th>
                </tr>
                
                <?php include_once("Cart_select.php"); ?>
                
            </table>
            <input type="hidden" name="tid_buy" value="<?php echo $tid_buy; ?>">
            <!--<a href="#" class=" to-buy">PROCEED TO BUY</a>-->
            <input class="btn btn-danger btn-sm" data-toggle="modal" type="submit" value="PROCEED TO BUY">
             <!-- <button class="btn btn-danger btn-sm" data-toggle="modal" onclick="location.href='<?php echo "buy.php?id=".$tid_buy; ?>';">PROCEED TO BUY</button>-->
            </form>
            <div class="clearfix"></div>
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