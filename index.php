<? 
    session_start();
    //echo "session id ====".$_SESSION['id']."<BR>";
    //echo $_SESSION['type'];
?>
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
<?php
            
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
            //echo "<p><font color=\"red\">Connected successfully</font></p>";


            // Run a sql
            $sql1 = "SELECT ID_Product, COUNT(*) as frequency FROM Transaction GROUP BY ID_Product ORDER BY COUNT(*) DESC LIMIT 5"; 
            $result1 = $conn->query($sql1);
            $p = 0;
            // output data of each row
            while($row1 = $result1->fetch_assoc()) {
                 $top5_id[$p] = $row1["ID_Product"];
                 $p++;
            }
            
              
            for ($kk=0; $kk < $p; $kk++) { 
                $sql = "SELECT * FROM Product where ID_Product = $top5_id[$kk]";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    $pic[$kk] = "<img src=" . $row["image"]. " />";
                
                }
            }

            /*
             // find the top 5 popular item
            
            $i = 1;
            
            // output data of each row
            
            $i = 0;    */
            // Close connection
            mysqli_close($conn);
        ?>
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
                <a href="index.php" class="a1">Home</a>
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
    <div id="head_hot_goods_wrap">
        <div id="head_hot_goods_title">
            <span class="title_span">top rating items</span>
            <div id="head_hot_goods_change">
                <span id="head_hot_goods_prave"><</span>
                <span id="head_hot_goods_next">></span>
            </div>
        </div>
        <div id="head_hot_goods_content">
            <ul>
                <li>
                    <a href="Item.php?pid=<? echo $top5_id[0]; ?>"><? echo $pic[0]; ?></a>
                    <a></a>
                    <a></a>
                </li>
                <li>
                    <a href="Item.php?pid=<? echo $top5_id[1]; ?>"><? echo $pic[1]; ?></a>
                    <a></a>
                    <a></a>
                </li>
                <li>
                    <a href="Item.php?pid=<? echo $top5_id[2]; ?>"><? echo $pic[2]; ?></a>
                    <a></a>
                    <a></a>
                </li>
                <li>
                    <a href="Item.php?pid=<? echo $top5_id[3]; ?>"><? echo $pic[3]; ?></a>
                    <a></a>
                    <a></a>
                </li>
                <li>
                    <a href="Item.php?pid=<? echo $top5_id[4]; ?>"><? echo $pic[4]; ?></a>
                    <a></a>
                    <a></a>
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