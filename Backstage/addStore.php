<?php
session_start();
                   // echo $_SESSION['mStoreid'];
                   // echo $_SESSION['job'];
                   // echo $_SESSION['mstate'];
                   // echo $_SESSION['Mid'];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Store</title>
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
                                    <li><a href="order.php">Order</a></li>
                                    <li><a href="faculty.php">Faculty</a></li>
                                    <li class="active"><a href="store.php">Store</a></li>
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
                    <form class="form-horizontal" role="form" action="Store_insert.php" method="post">
                        <h3>
                            Add Store
                        </h3>
                        <hr>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-6">
                                <input class="form-control" name="Store_name" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Job Title : Clerk</label>
                            <div class="col-sm-6">
                                <input class="form-control" name="Salary_C" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Job Title : Manager</label>
                            <div class="col-sm-6">
                                <input class="form-control" name="Salary_M" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Manager name</label>
                            <div class="col-sm-6">
                                <input class="form-control" name="Manager_name" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Manager address</label>
                            <div class="col-sm-6">
                                <input class="form-control" name="Manager_address" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Manager email</label>
                            <div class="col-sm-6">
                                <input class="form-control" name="Manager_email" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Manager phone</label>
                            <div class="col-sm-6">
                                <input class="form-control" name="Manager_phone" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Manager State</label>
                            <div class="col-sm-6">
                                <input class="form-control" name="Manager_state" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Manager username</label>
                            <div class="col-sm-6">
                                <input class="form-control" name="Manager_username" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Manager password</label>
                            <div class="col-sm-6">
                                <input class="form-control" name="Manager_password" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" class="btn btn-default btn-primary" value="Submit" />
                            </div>
                        </div>
                    </form>
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
                    <div class="modal fade" id="deletestore" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="conf">Warning</h4>
                                </div>
                                <div class="modal-body">Are you sure you wanna delete this store?</div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-default btn-primary" data-toggle="modal"
                                            data-target="#deletestore">
                                        Yes
                                    </button>

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