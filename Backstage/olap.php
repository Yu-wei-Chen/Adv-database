<?
session_start();
                   // echo $_SESSION['mStoreid'];
                   // echo $_SESSION['job'];
                   // echo $_SESSION['mstate'];
                   // echo $_SESSION['Mid'];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
    <link type="text/css" rel="stylesheet" href="css/main.css"/>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    
    <script type="text/javascript">
        window.onload = function () {
            var chart = new CanvasJS.Chart("chartContainer",
            {
                theme: "theme2",
                title:{
                    text: "Gaming Consoles Sold in 2012"
                },
                data: [
                {
                    type: "pie",
                    showInLegend: true,
                    toolTipContent: "{y} - #percent %",
                    yValueFormatString: "#0.#,,. Million",
                    legendText: "{indexLabel}",
                    dataPoints: [
                        {  y: 4181563, indexLabel: "PlayStation 3" },
                        {  y: 2175498, indexLabel: "Wii" },
                        {  y: 3125844, indexLabel: "Xbox 360" },
                        {  y: 1176121, indexLabel: "Nintendo DS"},
                        {  y: 1727161, indexLabel: "PSP" },
                        {  y: 4303364, indexLabel: "Nintendo 3DS"},
                        {  y: 1717786, indexLabel: "PS Vita"}
                    ]
                }
                ]
            });
            chart.render();
        }
    </script>
    <script type="text/javascript" src="js/canvasjs.min.js"></script>

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
                                <a class="navbar-brand active" href="home.php">Home</a>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li><a href="product.php">Product</a></li>
                                    <li><a href="order.php">Order</a></li>
                                    <li><a href="faculty.php">Faculty</a></li>
                                    <li><a href="store.php">Store</a></li>
                                    <li class="active"><a href="olap.php">OLAP</a></li>
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
                    <!--<div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4>
                            OLAP!!
                        </h4> 
                    </div>
                    <div class="jumbotron">
                        <h1>
                            Welcome OLAP!
                        </h1>
                        
                        <p>
                            <a class="btn btn-primary btn-large" href="contactUs.php">Contact Us</a>
                        </p>
                    </div>-->
                    <div id="chartContainer" style="height: 400px; width: 100%;"></div>
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