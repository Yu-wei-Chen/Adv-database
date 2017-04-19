<?php 
    session_start();
    //$AAA =  $_SESSION['id'];
    //echo $AAA."<br/>";
    //echo $_SESSION['type'];
?>
<!DOCTYPE html  PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>shopping</title>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
    <link type="text/css" rel="stylesheet" href="main.css"/>
    <link type="text/css" rel="stylesheet" href="css/main.css"/>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/js.js"></script>
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
                <a href="product.php?gender=male" class="a1">Man</a>
                <a href="product.php?gender=female" class="a1">Woman</a>
                <a href="Item.php?pid=1">Item</a>

                <a href="orders.php">Members</a>
                <a href="login.php">Login</a>
                <a href="CheckOut.php">Cart</a>
                <a href="contact.php">Contact</a>
            </div>
        </div>
    </div>

    <div class="products">
        <div class="container">
            <h1>Products</h1>
            <div class="col-md-9">
                <?php include_once("testproductselect.php"); ?>
            </div>
            <div class="col-md-3 product-bottom">
                <div class="rsidebar span_1_of_left">
                    <h3 class="cate">Categories</h3>
                    <ul class="menu-drop">
                        <li class="item1"><a href="#">Man</a>
                            <ul class="cute">
                                <li class="subitem1"><a href="product.php?gender=male&kind=shirt">Shirt </a></li>
                                <li class="subitem2"><a href="product.php?gender=male&kind=bag">Bag </a></li>
                                <li class="subitem3"><a href="product.php?gender=male&kind=accessary">Accesories</a></li>
                                <li class="subitem3"><a href="product.php?gender=male&kind=shoes">Shoes </a></li>
                            </ul>
                        </li>
                        <li class="item2"><a href="#">Woman</a>
                            <ul class="cute">
                                <li class="subitem1"><a href="product.php?gender=female&kind=shirt">Shirt </a></li>
                                <li class="subitem2"><a href="product.php?gender=female&kind=bag">Bag </a></li>
                                <li class="subitem3"><a href="product.php?gender=female&kind=accessary">Accesories</a></li>
                                <li class="subitem3"><a href="product.php?gender=female&kind=shoes">Shoes </a></li>
                            </ul>
                        </li>
                        <li class="item2"><a href="#">Sort by price</a>
                            <ul class="cute">
                                <li class="subitem1"><a href="<?php echo $link."&price=price"; ?>">Sort by $ -> $$$</a></li>
                                <li class="subitem2"><a href="<?php echo $link."&price=-price"; ?>">Sort by $$$ -> $</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <script type="text/javascript">
                    $(function () {
                        var menu_ul = $('.menu-drop > li > ul'),
                            menu_a = $('.menu-drop > li > a');
                        menu_ul.hide();
                        menu_a.click(function (e) {
                            e.preventDefault();
                            if (!$(this).hasClass('active')) {
                                menu_a.removeClass('active');
                                menu_ul.filter(':visible').slideUp('normal');
                                $(this).addClass('active').next().stop(true, true).slideDown('normal');
                            } else {
                                $(this).removeClass('active');
                                $(this).next().stop(true, true).slideUp('normal');
                            }
                        });

                    });
                </script>

            </div>
        </div>
    </div>
</div>


<div class="foot">
    <div class="copy">
        <p>INFSCI 2710: Database Management Copyright</p>
        <p>University of Pittsburgh<br/>School of Information Sciences</p>
    </div>
</div>

</body>
</html>