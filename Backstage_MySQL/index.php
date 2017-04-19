<? 
    session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MySQL</title>
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
                                <a class="navbar-brand active" href="index.php">Login</a>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    
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
                    <div class="jumbotron">
                        <h3>
                            Login
                        </h3>
                        
                            <form class="form-horizontal" role="form" action="logining.php" method="post">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputEmail3" name="username" value="super" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="inputPassword3" name="password" value="123" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="submit" class="btn btn-default btn-primary" value="Sign in" />
                                    </div>
                                </div>
                            </form>
                        
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
                                            <a href="contactUs_logout.php">Contact us</a>
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