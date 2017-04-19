<?php
session_start();
                   // echo $_SESSION['mStoreid'];
                   // echo $_SESSION['job'];
                   // echo $_SESSION['mstate'];
                   // echo $_SESSION['Mid'];
            $servername = "localhost";
			$username = "root";
			$password = "root";
			$dbname = "final";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}
include_once("Q1_mongo.php");
include_once("Q5_mongo.php");
include_once("Q7_mongo.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
    <link type="text/css" rel="stylesheet" href="css/main.css"/>
    <link type="text/css" rel="stylesheet" href="css/question_part.css"/>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
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
                
                <!--For answering 8 qustion button--> 
                <div class="question">
                    <a href="#" onclick="question1_content()">Qestion 1</a>
                    <a href="#" onclick="question2_content()">Qestion 2</a>
                    <a href="#" onclick="question3_content()">Qestion 3</a>
                    <a href="#" onclick="question4_content()">Qestion 4</a>
                    <a href="#" onclick="question5_content()">Qestion 5</a>
                    <a href="#" onclick="question6_content()">Qestion 6</a>
                    <a href="#" onclick="question7_content()">Qestion 7</a>
                    <a href="#" onclick="question8_content()">Qestion 8</a>
                </div>
                <div class="col-md-10 column">
                    <div class="jumbotron">
                        <div id="question1_content">
                            
                            <h1 id=question_content>
                            Welcome OLAP!
                            </h1>
                        </div>
                        <p>
                            <a class="btn btn-primary btn-large" href="contactUs.php" style="display:none;";>Contact Us</a>
                        </p>
                    </div>
                    <div class="alert alert-success alert-dismissable">
                        <h4 id="h4">
                            OLAP!!
                        </h4>
                        <!--question 1 filter-->
                        <div id="q1_filter" style="display:none;";>
                            
                            <label>From</label>
                            <select id="q1_from" onchange="check1_from()">
                             <!--<option value="">year month</option>-->
                              <?php
                                  $sql="select year,month from fact group by year,month";
                                  $result=mysqli_query($conn,$sql);
                                  $total_records=mysqli_num_rows($result);
                                  for($i=1;$i<=$total_records;$i++){
                                  $row=$result->fetch_row();?>
                                <option value="<?php echo $row[0].$row[1];?>"><?php echo $row[0]."/".$row[1] ?></option>
                               <?php }?>
                            </select>
                            
                             <label>To</label>
                            <select id="q1_to" onchange="check1_to()">
                             <!--<option value="">year month</option>-->
                              <?php
                                  $sql="select year,month from fact group by year,month";
                                  $result=mysqli_query($conn,$sql);
                                  $total_records=mysqli_num_rows($result);
                                  for($i=1;$i<=$total_records;$i++){
                                  $row=$result->fetch_row();?>
                                <option value="<?php echo $row[0].$row[1];?>"><?php echo $row[0]."/".$row[1] ?></option>
                               <?php }?>
                            </select>                          
                            
                            <button id="search" onclick="For_question1_pie()">Search</button>    
                            
                        </div>
                        
                        <!--question 2 filter-->
                        <div id="q2_filter" style="display:none;";>
                            <label>From</label>
                            <select id="q2_from" onchange="check2_from()">
                             <!--<option value="">year month</option>-->
                                 
                              <?php
                                  $sql="select year,month from fact group by year,month";
                                  $result=mysqli_query($conn,$sql);
                                  $total_records=mysqli_num_rows($result);
                                  for($i=1;$i<=$total_records;$i++){
                                  $row=$result->fetch_row();?>
                                
                                <option value="<?php echo $row[0].$row[1];?>"><?php echo $row[0]."/".$row[1] ?></option>
                               <?php }?>
                            </select>
                            
                             <label>To</label>
                            <select id="q2_to" onchange="check2_to()">
                             <!--<option value="">year month</option>-->
                                 
                              <?php
                                  $sql="select year,month from fact group by year,month";
                                  $result=mysqli_query($conn,$sql);
                                  $total_records=mysqli_num_rows($result);
                                  for($i=1;$i<=$total_records;$i++){
                                  $row=$result->fetch_row();?>
                                
                                <option value="<?php echo $row[0].$row[1];?>"><?php echo $row[0]."/".$row[1] ?></option>
                               <?php }?>
                            </select>
                            
                            <button id="search" onclick="For_question2()">Search</button>    
                           
                        </div>
                        <!--question 2 should be modified here-->
                        <div id="message2"></div>
                        <div id="question2" style="display:none">
                            
                        </div>
                        <!--question 3 filter-->
                        <div id="q3_filter" style="display:none;";>
                            <label>From</label>
                            <select id="q3_from" onchange="check3_from()">
                             <!--<option value="">year month</option>-->
                                 
                              <?php
                                  $sql="select year,month,day from fact group by year,month,day";
                                  $result=mysqli_query($conn,$sql);
                                  $total_records=mysqli_num_rows($result);
                                  for($i=1;$i<=$total_records;$i++){
                                  $row=$result->fetch_row();?>
                                
                                <option value="<?php echo $row[0]."/".$row[1]."/".$row[2];?>"><?php echo $row[0]."/".$row[1]."/".$row[2] ?></option>
                               <?php }?>
                            </select>
                            
                             <label style="display:none;";>To</label>
                            <select id="q3_to" onchange="check3_to()" style="display:none;";>
                             <!--<option value="">year month</option>-->
                                 
                              <?php
                                  $sql="select year,month,day from fact group by year,month,day";
                                  $result=mysqli_query($conn,$sql);
                                  $total_records=mysqli_num_rows($result);
                                  for($i=1;$i<=$total_records;$i++){
                                  $row=$result->fetch_row();?>
                                
                                <option value="<?php echo $row[0]."/".$row[1]."/".$row[2];?>"><?php echo $row[0]."/".$row[1]."/".$row[2] ?></option>
                               <?php }?>
                            </select>
                            
                            <button id="search" onclick="For_question3()">Search</button>    
                           
                        </div>
                         <!--question 3 should be modified here-->
                        <div id="message3"></div>
                        <div id="question3" style="display:none">
                            
                        </div>
                        <!--question 4 filter-->
                        <div id="q4_filter" style="display:none;";>
                            <label>From</label>
                            <select id="q4_from" onchange="check4_from()">
                             <!--<option value="">year month</option>-->
                                 
                              <?php
                                  $sql="select year,month,day from fact group by year,month,day";
                                  $result=mysqli_query($conn,$sql);
                                  $total_records=mysqli_num_rows($result);
                                  for($i=1;$i<=$total_records;$i++){
                                  $row=$result->fetch_row();?>
                                
                                <option value="<?php echo $row[0]."/".$row[1]."/".$row[2];?>"><?php echo $row[0]."/".$row[1]."/".$row[2] ?></option>
                               <?php }?>
                            </select>
                            
                             <label style="display:none;";>To</label>
                            <select style="display:none;"; id="q4_to" onchange="check4_to()">
                             <!--<option value="">year month</option>-->
                                 
                              <?php
                                  $sql="select year,month,day from fact group by year,month,day";
                                  $result=mysqli_query($conn,$sql);
                                  $total_records=mysqli_num_rows($result);
                                  for($i=1;$i<=$total_records;$i++){
                                  $row=$result->fetch_row();?>
                                
                                <option value="<?php echo $row[0]."/".$row[1]."/".$row[2];?>"><?php echo $row[0]."/".$row[1]."/".$row[2] ?></option>
                               <?php }?>
                            </select>
                            
                            <button id="search" onclick="For_question4()">Search</button>    
                           
                        </div>
                        <!--question 4 should be modified here-->
                        <div id="message4" tyle="display:none;";></div>
                        <div id="question4" style="display:none">
                            
                        </div>
                         <!--question 5 filter-->
                        <div id="q5_filter" style="display:none;";>
                            <label>From</label>
                            <select id="q5_from" onchange="check5_from()">
                             <!--<option value="">year month</option>-->
                                 
                              <?php
                                  $sql="select year,month from fact group by year,month";
                                  $result=mysqli_query($conn,$sql);
                                  $total_records=mysqli_num_rows($result);
                                  for($i=1;$i<=$total_records;$i++){
                                  $row=$result->fetch_row();?>
                                
                                <option value="<?php echo $row[0].$row[1];?>"><?php echo $row[0]."/".$row[1] ?></option>
                               <?php }?>
                            </select>
                            
                             <label style="display:none;";>To</label>
                            <select id="q5_to" onchange="check5_to()" style="display:none;";>
                             <!--<option value="">year month</option>-->
                                 
                              <?php
                                  $sql="select year,month from fact group by year,month";
                                  $result=mysqli_query($conn,$sql);
                                  $total_records=mysqli_num_rows($result);
                                  for($i=1;$i<=$total_records;$i++){
                                  $row=$result->fetch_row();?>
                                
                                <option value="<?php echo $row[0].$row[1];?>"><?php echo $row[0]."/".$row[1] ?></option>
                               <?php }?>
                            </select>
                            
                            <button id="search" onclick="For_question5();">Search</button>    
                           
                        </div>
                        <!--question 6 filter-->
                        <div id="q6_filter" style="display:none;";>
                            <label>Choose Product Name</label>
                            <select id="q6_from" onchange="check6_from()">
                             <!--<option value="">year month</option>-->
                                 
                              <?php
                                  $sql="select product_name from product";
                                  $result=mysqli_query($conn,$sql);
                                  $total_records=mysqli_num_rows($result);
                                  for($i=1;$i<=$total_records;$i++){
                                  $row=$result->fetch_row();?>
                                
                                <option value="<?php echo $row[0];?>"><?php echo $row[0] ?></option>
                               <?php }?>
                            </select>
                            
                             <label style="display:none;">To</label>
                            <select id="q6_to" onchange="check6_to()" style="display:none;">
                             <!--<option value="">year month</option>-->
                                 
                              <?php
                                  $sql="select year,month from fact group by year,month";
                                  $result=mysqli_query($conn,$sql);
                                  $total_records=mysqli_num_rows($result);
                                  for($i=1;$i<=$total_records;$i++){
                                  $row=$result->fetch_row();?>
                                
                                <option value="<?php echo $row[0].$row[1];?>"><?php echo $row[0]."/".$row[1] ?></option>
                               <?php }?>
                            </select>
                            
                            <button id="search" onclick="For_question6();">Search</button>    
                           
                        </div>
                        <!--question 6 should be modified here-->
                        <div id="message6" tyle="display:none;";></div>
                        <div id="question6" style="display:none">
                            
                        </div>
                        <!--question 7 filter-->
                        <div id="q7_filter" style="display:none;";>
                            <label>From</label>
                            <select id="q7_from" onchange="check7_from()">
                             <!--<option value="">year month</option>-->
                                 
                              <?php
                                  $sql="select product_name from product";
                                  $result=mysqli_query($conn,$sql);
                                  $total_records=mysqli_num_rows($result);
                                  for($i=1;$i<=$total_records;$i++){
                                  $row=$result->fetch_row();?>
                                
                                <option value="<?php echo $row[0];?>"><?php echo $row[0] ?></option>
                               <?php }?>
                            </select>
                            
                             <label style="display:none;">To</label>
                            <select id="q7_to" onchange="check7_to()" style="display:none;">
                             <!--<option value="">year month</option>-->
                                 
                              <?php
                                  $sql="select year,month from fact group by year,month";
                                  $result=mysqli_query($conn,$sql);
                                  $total_records=mysqli_num_rows($result);
                                  for($i=1;$i<=$total_records;$i++){
                                  $row=$result->fetch_row();?>
                                
                                <option value="<?php echo $row[0].$row[1];?>"><?php echo $row[0]."/".$row[1] ?></option>
                               <?php }?>
                            </select>
                            
                            <button id="search" onclick="For_question7();">Search</button>    
                           
                        </div>
                        <!--question 8 filter-->
                        <div id="q8_filter" style="display:none;";>
                            <label>From</label>
                            <select id="q8_from" onchange="check8_from()">
                             <!--<option value="">year month</option>-->
                                 
                              <?php
                                  $sql="select year,month,week from fact group by year,month,week";
                                  $result=mysqli_query($conn,$sql);
                                  $total_records=mysqli_num_rows($result);
                                  for($i=1;$i<=$total_records;$i++){
                                  $row=$result->fetch_row();?>
                                
                                <option value="<?php echo $row[0]."/".$row[1]."/".$row[2];?>"><?php echo "year: ".$row[0]." month: ".$row[1]." week: ".$row[2] ?></option>
                               <?php }?>
                            </select>
                            
                             <label style="display:none;";>To</label>
                            <select id="q8_to" onchange="check8_to()" style="display:none;";>
                             <!--<option value="">year month</option>-->
                                 
                              <?php
                                  $sql="select year,month,week from fact group by year,month,week";
                                  $result=mysqli_query($conn,$sql);
                                  $total_records=mysqli_num_rows($result);
                                  for($i=1;$i<=$total_records;$i++){
                                  $row=$result->fetch_row();?>
                                <option value="<?php echo $row[0]."/".$row[1]."/".$row[2];?>"><?php echo "year: ".$row[0]." month: ".$row[1]." week: ".$row[2] ?></option>
                               <?php }?>
                            </select>
                            
                            <button id="search" onclick="For_question8();">Search</button>    
                           
                        </div>
                        <!--question 8 should be modified here-->
                        <div id="message8" tyle="display:none;";></div>
                        <div id="question8" style="display:none">
                            
                        </div>
                        <div id="chartContainer"></div>
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
                                            <a href="contactUs.php" style="display:none;";>Contact us</a>
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
    <script type="text/javascript">
       function question1_content(){
           document.getElementById("question1_content").innerHTML="What is the ratio of business to home customers?";
           document.getElementById("question1_content").style.fontSize="2em";
           document.getElementById("h4").style.display="none";
           document.getElementById("chartContainer").style.display="inherit";
           document.getElementById("chartContainer").style.width="100%";
           document.getElementById("chartContainer").style.height="400px";
           document.getElementById("question2").style.display="none";
           document.getElementById("message2").style.display="none";
           document.getElementById("message3").style.display="none";
           document.getElementById("message4").style.display="none";
           document.getElementById("message6").style.display="none";
           document.getElementById("message8").style.display="none";
           document.getElementById("question3").style.display="none";
           document.getElementById("question4").style.display="none";
           document.getElementById("question6").style.display="none";
           document.getElementById("question8").style.display="none";
           document.getElementById("q1_filter").style.display="none";
           document.getElementById("q2_filter").style.display="none";
           document.getElementById("q3_filter").style.display="none";
           document.getElementById("q4_filter").style.display="none";
           document.getElementById("q5_filter").style.display="none";
           document.getElementById("q6_filter").style.display="none";
           document.getElementById("q7_filter").style.display="none";
           document.getElementById("q8_filter").style.display="none";
           For_question1_pie()
          
       }
       function question2_content(){
           document.getElementById("question1_content").innerHTML="What stores are increasing in sales?";
           document.getElementById("question1_content").style.fontSize="2em";
           document.getElementById("h4").style.display="none";
           document.getElementById("chartContainer").style.display="none";
           document.getElementById("message2").style.display="inherit";
           document.getElementById("message3").style.display="none";
           document.getElementById("message4").style.display="none";
           document.getElementById("message6").style.display="none";
           document.getElementById("message8").style.display="none";
           document.getElementById("question3").style.display="none";
           document.getElementById("question4").style.display="none";
           document.getElementById("question6").style.display="none";
           document.getElementById("question8").style.display="none";
           document.getElementById("q1_filter").style.display="none";
           document.getElementById("q2_filter").style.display="inline";
           document.getElementById("q3_filter").style.display="none";
           document.getElementById("q4_filter").style.display="none";
           document.getElementById("q5_filter").style.display="none";
           document.getElementById("q6_filter").style.display="none";
           document.getElementById("q7_filter").style.display="none";
           document.getElementById("q8_filter").style.display="none";
           
       }
       function question3_content(){
           document.getElementById("question1_content").innerHTML="Maintain every day the aggregate sales and profit of the top 5 and the bottom 5 products.";
           document.getElementById("question1_content").style.fontSize="2em";
           document.getElementById("h4").style.display="none";
           document.getElementById("chartContainer").style.display="none";
           document.getElementById("question2").style.display="none";
           document.getElementById("message2").style.display="none";
           document.getElementById("message3").style.display="inline";
           document.getElementById("message4").style.display="none";
           document.getElementById("message6").style.display="none";
           document.getElementById("message8").style.display="none";
           document.getElementById("question4").style.display="none";
           document.getElementById("question6").style.display="none";
           document.getElementById("question8").style.display="none";
           document.getElementById("q1_filter").style.display="none";
           document.getElementById("q2_filter").style.display="none";
           document.getElementById("q3_filter").style.display="inline";
           document.getElementById("q4_filter").style.display="none";
           document.getElementById("q5_filter").style.display="none";
           document.getElementById("q6_filter").style.display="none";
           document.getElementById("q7_filter").style.display="none";
           document.getElementById("q8_filter").style.display="none";
       }
        function question4_content(){
           document.getElementById("question1_content").innerHTML="Maintain every day the top 2 customer categories (highest sales) and the top product categories.";
           document.getElementById("question1_content").style.fontSize="2em";
           document.getElementById("h4").style.display="none";
           document.getElementById("chartContainer").style.display="none";
           document.getElementById("message2").style.display="none";
           document.getElementById("message3").style.display="none";
           document.getElementById("message4").style.display="inline";
           document.getElementById("message6").style.display="none";
           document.getElementById("message8").style.display="none";
           document.getElementById("question3").style.display="none";
           document.getElementById("question6").style.display="none";
           document.getElementById("question8").style.display="none";
           document.getElementById("q1_filter").style.display="none";
           document.getElementById("q2_filter").style.display="none";
           document.getElementById("q3_filter").style.display="none";
           document.getElementById("q4_filter").style.display="inline";
           document.getElementById("q5_filter").style.display="none";
           document.getElementById("q6_filter").style.display="none";
           document.getElementById("q7_filter").style.display="none";
           document.getElementById("q8_filter").style.display="none";
       }
        function question5_content(){
           document.getElementById("question1_content").innerHTML="How do the various regions compare by sales volume?";
           document.getElementById("question1_content").style.fontSize="2em";
           document.getElementById("h4").style.display="none";
           document.getElementById("chartContainer").style.display="inherit";
           document.getElementById("chartContainer").style.width="100%";
           document.getElementById("chartContainer").style.height="400px";
           document.getElementById("message2").style.display="none";
           document.getElementById("message3").style.display="none";
           document.getElementById("message4").style.display="none";
           document.getElementById("message6").style.display="none";
           document.getElementById("message8").style.display="none";
           document.getElementById("question3").style.display="none";
           document.getElementById("question4").style.display="none";
           document.getElementById("question6").style.display="none";
           document.getElementById("question8").style.display="none";
           document.getElementById("q1_filter").style.display="none";
           document.getElementById("q2_filter").style.display="none";
           document.getElementById("q3_filter").style.display="none";
           document.getElementById("q4_filter").style.display="none";
           document.getElementById("q5_filter").style.display="inline";
           document.getElementById("chartContainer").style.display="none";
           document.getElementById("q6_filter").style.display="none";
           document.getElementById("q7_filter").style.display="none";
           document.getElementById("q8_filter").style.display="none";
            
       }
        function question6_content(){
           document.getElementById("question1_content").innerHTML="Which businesses are buying given products the most?";
           document.getElementById("question1_content").style.fontSize="2em";
           document.getElementById("question6").style.display="inline";
           document.getElementById("h4").style.display="none";
           document.getElementById("chartContainer").style.display="none";
           document.getElementById("message2").style.display="none";
           document.getElementById("message3").style.display="none";
           document.getElementById("message4").style.display="none";
           document.getElementById("message6").style.display="inline";
           document.getElementById("message8").style.display="none";
           document.getElementById("question3").style.display="none";
           document.getElementById("question6").style.display="none";
           document.getElementById("question8").style.display="none";
           document.getElementById("q1_filter").style.display="none";
           document.getElementById("q2_filter").style.display="none";
           document.getElementById("q3_filter").style.display="none";
           document.getElementById("q4_filter").style.display="none";
           document.getElementById("q5_filter").style.display="none";
           document.getElementById("q6_filter").style.display="inline";
           document.getElementById("q7_filter").style.display="none";
           document.getElementById("q8_filter").style.display="none";
           
       }
        function question7_content(){
           document.getElementById("question1_content").innerHTML="What is the demand curve for each product category (i.e., the curve, that measures the propensity of customer to pay for a product as the price changes)?";
           document.getElementById("question1_content").style.fontSize="2em";
           document.getElementById("h4").style.display="none";
           document.getElementById("chartContainer").style.display="inherit";
           document.getElementById("chartContainer").style.width="100%";
           document.getElementById("chartContainer").style.height="400px";
           document.getElementById("message2").style.display="none";
           document.getElementById("message3").style.display="none";
           document.getElementById("message4").style.display="none";
           document.getElementById("message6").style.display="none";
           document.getElementById("message8").style.display="none";
           document.getElementById("question3").style.display="none";
           document.getElementById("question4").style.display="none";
           document.getElementById("question6").style.display="none";
           document.getElementById("question8").style.display="none";
           document.getElementById("q1_filter").style.display="none";
           document.getElementById("q2_filter").style.display="none";
           document.getElementById("q3_filter").style.display="none";
           document.getElementById("q4_filter").style.display="none";
           document.getElementById("q5_filter").style.display="none";
           document.getElementById("chartContainer").style.display="none";
           document.getElementById("q6_filter").style.display="none";
           document.getElementById("q7_filter").style.display="inline";
           document.getElementById("q8_filter").style.display="none";
           
       }
        function question8_content(){
           document.getElementById("question1_content").innerHTML="Develop a direct marketing data; for each product, a list of customers that buy the product more than 2 times per week.";
           document.getElementById("question1_content").style.fontSize="2em";
           document.getElementById("question8").style.display="inline";
           document.getElementById("h4").style.display="none";
           document.getElementById("chartContainer").style.display="none";
           document.getElementById("message2").style.display="none";
           document.getElementById("message3").style.display="none";
           document.getElementById("message4").style.display="none";
           document.getElementById("message6").style.display="none";
           document.getElementById("message8").style.display="inherit";
           document.getElementById("question3").style.display="none";
           document.getElementById("question4").style.display="none";
           document.getElementById("question6").style.display="none";
           document.getElementById("question8").style.display="none";
           document.getElementById("q1_filter").style.display="none";
           document.getElementById("q2_filter").style.display="none";
           document.getElementById("q3_filter").style.display="none";
           document.getElementById("q4_filter").style.display="none";
           document.getElementById("q5_filter").style.display="none";
           document.getElementById("q6_filter").style.display="none";
           document.getElementById("q7_filter").style.display="none";
           document.getElementById("q8_filter").style.display="inline";
       }
       //javascript for graph
        
        //question 1 should be modified here
        function For_question1_pie() {
            
        document.getElementById("chartContainer").style.display="inherit";
       var chart = new CanvasJS.Chart("chartContainer",
	{
		theme: "theme2",
		title:{
			text: "The Ratio of Business to Home Customers"
		},
		data: [
		{
			type: "pie",
			showInLegend: true,
			toolTipContent: "{y} - #percent %",
			yValueFormatString: "#,,. ",
			legendText: "{indexLabel}",
			dataPoints: [

				{  y: <?php echo $com_qty?>, indexLabel: "Business" },
				{  y: <?php echo $cust_qty?>, indexLabel: "Home Customers" },
				
			]
		}
		]
	});
	chart.render();
    }
    function For_question2(){
        document.getElementById("question2").style.display="inline";
        q2ajax()
    }
    function For_question3(){
        document.getElementById("question3").style.display="inline";
        q3ajax()
    }
    function For_question4(){
        document.getElementById("question4").style.display="inline";
        q4ajax()
    }
    //question 5 should be modify here
    <?php 
                //header("Refresh:0"); 
                $sql="select fromyear,frommonth from query where id=5";
                $result=mysqli_query($conn,$sql);
                $total_records=mysqli_num_rows($result);
                for($i=1;$i<=$total_records;$i++){
                $row=$result->fetch_row();
               }   
                
            ?>
    function For_question5() {
            location.assign('olap_for5.php');
            document.getElementById("chartContainer").style.display="inherit";
			var chart = new CanvasJS.Chart("chartContainer",
			{
				title: {
					text: "Various Regions Compare By Sales Volume"
				},
				

				data: [
				{
					type: "bar",

					dataPoints: [
					{ x: 10, y: 0, label:" " },
					{ x: 20, y: <?php echo $total_sales[0]; ?>, label:"<?php echo $region[0]; ?>" },
					{ x: 30, y: <?php echo $total_sales[1]; ?>, label:"<?php echo $region[1]; ?>" },
					{ x: 40, y: 0, label:" " }
					
					
					
					
					
					]
				}
				]
			});

			chart.render();
		}
    function For_question6(){
        document.getElementById("question6").style.display="inline";
        q6ajax()
    }
    
    function For_question7() {
        location.assign('olap_for7.php');
        document.getElementById("chartContainer").style.display="inherit";
		var chart = new CanvasJS.Chart("chartContainer", {
				title: {
					text: "Demand Curve",
					margin: 15
				},
				toolTip: {
					shared: true
				},
				axisX: {
					valueFormatString: "Price",
					interval: 500,
					
				},
				axisY: {
					maximum: 300,
					interval: 50,
				},

				legend: {
					verticalAlign: "bottom",
					horizontalAlign: "center"
				},
				data: [
				
				{
					type: "stackedArea",
					//name: "pedistrians",
					showInLegend: "true",
					dataPoints: [
                    <?php
                        for($i=0;$i<sizeof($curve['result']);$i++){
                    ?>    
					{ x: <?php echo $price[$i]?>,indexLabel: "<?php echo $price[$i]; ?>", y: <?php echo $quantity[$i]; ?>,  },
                    
					
                    <?php } ?>
					]
				}

				]
			});

			chart.render();
	}
    function For_question8(){
        document.getElementById("question8").style.display="inline";
        q8ajax()
    }
    //ajax    
    function $_xmlHttpRequest(){   
        if(window.ActiveXObject)
        {
            xmlHTTP=new ActiveXObject("Microsoft.XMLHTTP");
        }
        else if(window.XMLHttpRequest)
        {
            xmlHTTP=new XMLHttpRequest();
        }
    }
    function check1_from(){  
        var q1_from=document.getElementById("q1_from").value;
        //var q1_to=document.getElementById("q1_to").value;
        $_xmlHttpRequest();
        xmlHTTP.open("GET","q1.php?q1_from="+q1_from,true);
        //xmlHTTP.open("GET","q1.php?q1_to="+q1_to,true);

            xmlHTTP.onreadystatechange=function check_user()
            {
                if(xmlHTTP.readyState == 4)
                {
                    if(xmlHTTP.status == 200)
                    {
                        var str=xmlHTTP.responseText;
                        document.getElementById("message").innerHTML=str;
                    }
                }
            }
            xmlHTTP.send(null);
    }
    function check1_to(){  
        //var q1_from=document.getElementById("q1_from").value;
        var q1_to=document.getElementById("q1_to").value;
        $_xmlHttpRequest();
        //xmlHTTP.open("GET","q1.php?q1_from="+q1_from,true);
        xmlHTTP.open("GET","q1.php?q1_to="+q1_to,true);

            xmlHTTP.onreadystatechange=function check_user()
            {
                if(xmlHTTP.readyState == 4)
                {
                    if(xmlHTTP.status == 200)
                    {
                        var str=xmlHTTP.responseText;
                        document.getElementById("message").innerHTML=str;
                    }
                }
            }
            xmlHTTP.send(null);
    }
    function check2_from(){  
        var q2_from=document.getElementById("q2_from").value;
        $_xmlHttpRequest();
        xmlHTTP.open("GET","q1.php?q2_from="+q2_from,true);

            xmlHTTP.onreadystatechange=function check_user()
            {
                if(xmlHTTP.readyState == 4)
                {
                    if(xmlHTTP.status == 200)
                    {
                        var str=xmlHTTP.responseText;
                        document.getElementById("message2").innerHTML=str;
                    }
                }
            }
            xmlHTTP.send(null);
    }
    function check2_to(){  
        var q2_to=document.getElementById("q2_to").value;
        $_xmlHttpRequest();
        xmlHTTP.open("GET","q1.php?q2_to="+q2_to,true);

            xmlHTTP.onreadystatechange=function check_user()
            {
                if(xmlHTTP.readyState == 4)
                {
                    if(xmlHTTP.status == 200)
                    {
                        var str=xmlHTTP.responseText;
                        document.getElementById("message2").innerHTML=str;
                    }
                }
            }
            xmlHTTP.send(null);
    }
    function check3_from(){  
        var q3_from=document.getElementById("q3_from").value;
        $_xmlHttpRequest();
        xmlHTTP.open("GET","q1.php?q3_from="+q3_from,true);

            xmlHTTP.onreadystatechange=function check_user()
            {
                if(xmlHTTP.readyState == 4)
                {
                    if(xmlHTTP.status == 200)
                    {
                        var str=xmlHTTP.responseText;
                        document.getElementById("message").innerHTML=str;
                    }
                }
            }
            xmlHTTP.send(null);
    }
    function check3_to(){  
        var q3_to=document.getElementById("q3_to").value;
        $_xmlHttpRequest();
        xmlHTTP.open("GET","q1.php?q3_to="+q3_to,true);

            xmlHTTP.onreadystatechange=function check_user()
            {
                if(xmlHTTP.readyState == 4)
                {
                    if(xmlHTTP.status == 200)
                    {
                        var str=xmlHTTP.responseText;
                        document.getElementById("message").innerHTML=str;
                    }
                }
            }
            xmlHTTP.send(null);
    }
    function check4_from(){  
        var q4_from=document.getElementById("q4_from").value;
        $_xmlHttpRequest();
        xmlHTTP.open("GET","q1.php?q4_from="+q4_from,true);

            xmlHTTP.onreadystatechange=function check_user()
            {
                if(xmlHTTP.readyState == 4)
                {
                    if(xmlHTTP.status == 200)
                    {
                        var str=xmlHTTP.responseText;
                        document.getElementById("message").innerHTML=str;
                    }
                }
            }
            xmlHTTP.send(null);
    }
    function check4_to(){  
        var q4_to=document.getElementById("q4_to").value;
        $_xmlHttpRequest();
        xmlHTTP.open("GET","q1.php?q4_to="+q4_to,true);

            xmlHTTP.onreadystatechange=function check_user()
            {
                if(xmlHTTP.readyState == 4)
                {
                    if(xmlHTTP.status == 200)
                    {
                        var str=xmlHTTP.responseText;
                        document.getElementById("message").innerHTML=str;
                    }
                }
            }
            xmlHTTP.send(null);
    }
    function check5_from(){  
        var q5_from=document.getElementById("q5_from").value;
        $_xmlHttpRequest();
        xmlHTTP.open("GET","q1.php?q5_from="+q5_from,true);

            xmlHTTP.onreadystatechange=function check_user()
            {
                if(xmlHTTP.readyState == 4)
                {
                    if(xmlHTTP.status == 200)
                    {
                        var str=xmlHTTP.responseText;
                        document.getElementById("message").innerHTML=str;
                    }
                }
            }
            xmlHTTP.send(null);
    }
    function check5_to(){  
        var q5_to=document.getElementById("q5_to").value;
        $_xmlHttpRequest();
        xmlHTTP.open("GET","q1.php?q5_to="+q5_to,true);

            xmlHTTP.onreadystatechange=function check_user()
            {
                if(xmlHTTP.readyState == 4)
                {
                    if(xmlHTTP.status == 200)
                    {
                        var str=xmlHTTP.responseText;
                        document.getElementById("message").innerHTML=str;
                    }
                }
            }
            xmlHTTP.send(null);
    }
    function check6_from(){  
        var q6_from=document.getElementById("q6_from").value;
        $_xmlHttpRequest();
        xmlHTTP.open("GET","q1.php?q6_from="+q6_from,true);

            xmlHTTP.onreadystatechange=function check_user()
            {
                if(xmlHTTP.readyState == 4)
                {
                    if(xmlHTTP.status == 200)
                    {
                        var str=xmlHTTP.responseText;
                        document.getElementById("message").innerHTML=str;
                    }
                }
            }
            xmlHTTP.send(null);
    }
    function check6_to(){  
        var q6_to=document.getElementById("q6_to").value;
        $_xmlHttpRequest();
        xmlHTTP.open("GET","q1.php?q6_to="+q6_to,true);

            xmlHTTP.onreadystatechange=function check_user()
            {
                if(xmlHTTP.readyState == 4)
                {
                    if(xmlHTTP.status == 200)
                    {
                        var str=xmlHTTP.responseText;
                        document.getElementById("message").innerHTML=str;
                    }
                }
            }
            xmlHTTP.send(null);
    }
    function check7_from(){  
        var q7_from=document.getElementById("q7_from").value;
        $_xmlHttpRequest();
        xmlHTTP.open("GET","q1.php?q7_from="+q7_from,true);

            xmlHTTP.onreadystatechange=function check_user()
            {
                if(xmlHTTP.readyState == 4)
                {
                    if(xmlHTTP.status == 200)
                    {
                        var str=xmlHTTP.responseText;
                        document.getElementById("message").innerHTML=str;
                    }
                }
            }
            xmlHTTP.send(null);
    }
    function check7_to(){  
        var q7_to=document.getElementById("q7_to").value;
        $_xmlHttpRequest();
        xmlHTTP.open("GET","q1.php?q7_to="+q7_to,true);

            xmlHTTP.onreadystatechange=function check_user()
            {
                if(xmlHTTP.readyState == 4)
                {
                    if(xmlHTTP.status == 200)
                    {
                        var str=xmlHTTP.responseText;
                        document.getElementById("message").innerHTML=str;
                    }
                }
            }
            xmlHTTP.send(null);
    }
    function check8_from(){  
        var q8_from=document.getElementById("q8_from").value;
        $_xmlHttpRequest();
        xmlHTTP.open("GET","q1.php?q8_from="+q8_from,true);

            xmlHTTP.onreadystatechange=function check_user()
            {
                if(xmlHTTP.readyState == 4)
                {
                    if(xmlHTTP.status == 200)
                    {
                        var str=xmlHTTP.responseText;
                        document.getElementById("message").innerHTML=str;
                    }
                }
            }
            xmlHTTP.send(null);
    }
    function check8_to(){  
        var q8_to=document.getElementById("q8_to").value;
        $_xmlHttpRequest();
        xmlHTTP.open("GET","q1.php?q8_to="+q8_to,true);

            xmlHTTP.onreadystatechange=function check_user()
            {
                if(xmlHTTP.readyState == 4)
                {
                    if(xmlHTTP.status == 200)
                    {
                        var str=xmlHTTP.responseText;
                        document.getElementById("message").innerHTML=str;
                    }
                }
            }
            xmlHTTP.send(null);
    }
    function q2ajax(){
        var a_q2_from=document.getElementById("q2_from").value;
        $_xmlHttpRequest();
        xmlHTTP.open("GET","q2ajax.php?a_q2_from="+a_q2_from,true);
        
        

            xmlHTTP.onreadystatechange=function check_user()
            {
                if(xmlHTTP.readyState == 4)
                {
                    if(xmlHTTP.status == 200)
                    {
                        var str=xmlHTTP.responseText;
                        document.getElementById("message2").innerHTML=str;
                    }
                }
            }
            xmlHTTP.send(null);
    }
    function q3ajax(){
        var a_q3_from=document.getElementById("q3_from").value;
        $_xmlHttpRequest();
        xmlHTTP.open("GET","q3ajax.php?a_q3_from="+a_q3_from,true);
        
        

            xmlHTTP.onreadystatechange=function check_user()
            {
                if(xmlHTTP.readyState == 4)
                {
                    if(xmlHTTP.status == 200)
                    {
                        var str=xmlHTTP.responseText;
                        document.getElementById("message3").innerHTML=str;
                    }
                }
            }
            xmlHTTP.send(null);
    }
    function q4ajax(){
        var a_q4_from=document.getElementById("q4_from").value;
        $_xmlHttpRequest();
        xmlHTTP.open("GET","q4ajax.php?a_q4_from="+a_q4_from,true);
        
        

            xmlHTTP.onreadystatechange=function check_user()
            {
                if(xmlHTTP.readyState == 4)
                {
                    if(xmlHTTP.status == 200)
                    {
                        var str=xmlHTTP.responseText;
                        document.getElementById("message4").innerHTML=str;
                    }
                }
            }
            xmlHTTP.send(null);
    }
    function q6ajax(){
        var a_q6_from=document.getElementById("q6_from").value;
        $_xmlHttpRequest();
        xmlHTTP.open("GET","q6ajax.php?a_q6_from="+a_q6_from,true);
        
        

            xmlHTTP.onreadystatechange=function check_user()
            {
                if(xmlHTTP.readyState == 4)
                {
                    if(xmlHTTP.status == 200)
                    {
                        var str=xmlHTTP.responseText;
                        document.getElementById("message6").innerHTML=str;
                    }
                }
            }
            xmlHTTP.send(null);
    }
    function q8ajax(){
        var a_q8_from=document.getElementById("q8_from").value;
        $_xmlHttpRequest();
        xmlHTTP.open("GET","q8ajax.php?a_q8_from="+a_q8_from,true);
        
        

            xmlHTTP.onreadystatechange=function check_user()
            {
                if(xmlHTTP.readyState == 4)
                {
                    if(xmlHTTP.status == 200)
                    {
                        var str=xmlHTTP.responseText;
                        document.getElementById("message8").innerHTML=str;
                    }
                }
            }
            xmlHTTP.send(null);
    }
    
   </script>
</body>
</html>