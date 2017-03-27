<!DOCTYPE html  PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>shopping</title>
    <link type="text/css" rel="stylesheet" href="main.css">
    <link type="text/css" rel="stylesheet" href="css/main.css"/>
    <link href="login.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="js.js"></script>
</head>
<body>
<div class="main">

    <div class="header">
        <div class="right-bg"></div>
        <ul class="worp">

            <li class="logo"><img src="images/logo.jpg" alt=""/></li>
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
                <a href="CheckOut.php">Cart</a>
                <a href="contact.php" class="a1">Contact</a>
            </div>
        </div>
    </div>
    <div id="head_hot_goods_wrap">
        <div id="head_hot_goods_title">
            <span class="top_rate">Contact us</span>
            <div id="head_hot_goods_change">
                <span id="head_hot_goods_prave"><</span>
                <span id="head_hot_goods_next">></span>
            </div>
        </div>
        <div id="head_hot_goods_content">
            <ul>
                <li>
                    <a><img src="images/pitt.jpg" alt=""></a>
                    <a>Yuewei Chen</a>
                    <a>University of Pittsburgh</a>
                </li>
                <li>
                    <a><img src="images/pitt.jpg" alt=""></a>
                    <a>Zehao Liu</a>
                    <a>University of Pittsburgh</a>
                </li>
                <li>
                    <a><img src="images/pitt.jpg" alt=""></a>
                    <a>Feng Zhao</a>
                    <a>University of Pittsburgh</a>
                </li>
            </ul>
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