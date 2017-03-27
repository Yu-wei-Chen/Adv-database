<!DOCTYPE html  PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>shopping</title>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
    <link type="text/css" rel="stylesheet" href="css/main.css"/>
    <script src="js/jquery.min.js"></script>
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
                <a href="product.php?gender=male">Man</a>
                <a href="product.php?gender=female">Woman</a>
                <a href="Item.php?pid=1" class="a1">Item</a>

                <a href="orders.php">Members</a>
                <a href="login.php">Login</a>
                <a href="CheckOut.php">Cart</a>
                <a href="contact.php">Contact</a>
            </div>
        </div>
    </div>

    <div class="item">
        <div class="container">
            <div class="col-md-9">
                <div class="col-md-5 grid">
                    <div class="flexslider">
                        <div class="item_display">
                            <!--Product image-->
                            <form action="AA1.php" method="post">
                            <? include_once("Item_select.php"); ?>
                            </form>
                        <!--<div class="available">
                            <h6>Choose quantity </h6>
                            <ul>
                                <li>Quantity: 
                                    <select>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </li>
                            </ul>
                        </div>
                        <a href="#" class="cart item_add">Add to Cart</a>-->

                    </div>
                </div>
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
                    </ul>
                </div>
                <!--initiate accordion-->
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