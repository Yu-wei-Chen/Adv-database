<!DOCTYPE html  PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Buy Confirmation</title>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
    <link type="text/css" rel="stylesheet" href="css/buyConfirmation.css"/>
    <link type="text/css" rel="stylesheet" href="css/main.css"/>
    <script type="text/javascript" src= "js/js.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<?php include_once("buy_confirming.php"); ?>
<body>
<div class="main">
    <div class="header">
        <div class="right-bg"></div>
        <ul class="worp">

            <li class="logo"><img src="images/logo.jpg" alt="logo"/></li>
            <li class="right">
                <p class="hot">Enjoy yourself!</p>
                <input type="text" id="txt" value="Search" onfocus="inputOnfocus()" onblur="inputOnblur()"  style="color:Gray"/>
                <input type="submit" value="" class="button" />
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
                <a href="contact.php">Contact</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-2 column">
            </div>
            <div class="col-md-6 column">
                
                <table>
                <form class="form-horizontal" role="form" action="buying.php" method="post">
                    <tr>
                        <td>
                            <label class="checkbox-inline">
                                Please check the Address and Total Price.<br><br>
                                
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name" value="<?php echo $cname; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="state" class="col-sm-2 control-label">State</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="state" value="<?php echo $cstate; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="address" class="col-sm-2 control-label">Address</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="address" value="<?php echo $caddress; ?>" />
                                            <input type="hidden" value="<?php echo $str; ?>" name="tid">
                                        </div>
                                    </div>
                                
                            </label>
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Total Price :</strong> <?php echo $total_price; ?> <hr>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <button type="submit" class="btn btn-default btn-danger" data-toggle="modal" >Buy</button>
                            <button type="button" class="btn btn-default btn-link" onclick="location.href='CheckOut.php';">Back to cart</button>
                        </td>
                    </tr>
                    </form>
                </table>
            </div>
            <div class="col-md-4 column">

            </div>
            <div class="modal fade" id="buy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="conf">Congrads!</h4>
                        </div>
                        <div class="modal-body">Your order has been placed!</div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-default btn-primary" data-toggle="modal"
                                    data-target="#buy">
                                Yes
                            </button>

                        </div>
                    </div>
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
</div>
</body>
</html>