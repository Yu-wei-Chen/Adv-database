<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order</title>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
    <link type="text/css" rel="stylesheet" href="css/main.css"/>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="row clearfix">
                <div class="col-md-12 column">
                    <nav class="navbar navbar-inverse" role="navigation">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="home.php">Home</a>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li><a href="product.php">Product</a></li>
                                    <li class="active"><a href="order.php">Order</a></li>
                                    <li><a href="faculty.php">Faculty</a></li>
                                    <li><a href="store.php">Store</a></li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="logout.php">Log Out</a></li>
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="row clearfix">
                <div class="col-md-1 column">
                </div>
                <div class="col-md-10 column">
                    <h3>
                        Order List
                    </h3>
                    <hr>
                    <div class="tabbable" id="tabs-740623">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#approved" data-toggle="tab">Approved orders</a>
                            </li>
                            <li>
                                <a href="#rejected" data-toggle="tab">Rejected orders</a>
                            </li>
                            <li>
                                <a href="#holding" data-toggle="tab">Pending orders</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="approved">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>
                                            Product name
                                        </th>
                                        <th>
                                            Purchase date
                                        </th>
                                        <th>
                                            Price
                                        </th>
                                        <th>
                                            Quantity
                                        </th>
                                        <th>
                                            Total Price
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <? include_once("Order_select_A.php"); ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="rejected">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>
                                            Product name
                                        </th>
                                        <th>
                                            Purchase date
                                        </th>
                                        <th>
                                            Price
                                        </th>
                                        <th>
                                            Quantity
                                        </th>
                                        <th>
                                            Total Price
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <? include_once("Order_select_R.php"); ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="holding">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>
                                            Product name
                                        </th>
                                        <th>
                                            Purchase date
                                        </th>
                                        <th>
                                            Price
                                        </th>
                                        <th>
                                            Qty
                                        </th>
                                        <th>
                                            Total Price
                                        </th>
                                        <th>
                                            Pending
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <? include_once("Order_select_U.php"); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-1 column">
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="footer">
                <div class="container">
                    <div class="row footer-top">
                        <div class="col-sm-6 col-lg-6">
                            <h4></h4>
                            <p>Come and join us!</p>
                        </div>
                        <div class="col-sm-6 col-lg-5 col-lg-offset-1">
                            <div class="row about">
                                <div class="col-xs-3">
                                    <h4>Contact</h4>
                                    <ul class="list-unstyled">
                                        <li>
                                            <a href="contactUs.php">Contact us</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-xs-3">
                                    <h4>Address</h4>
                                    <ul class="list-unstyled">
                                        <address> <strong>Pitts</strong>
                                            <br /> 4200 Fifth Ave<br /> Pittsburgh, PA 15260<br />
                                        </address>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                    <hr>
                    <div class="row footer-bottom">
                        <ul class="list-inline text-center">
                            <li>Copyright &copy;2016. INFSCI 2710: Database Management<br/>
                                School of Information Sciences, University of Pittsburgh </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>