<?php

		//echo $_POST["search"]."  <- input<BR/>";
        //if ($_POST["search"]!=null) {
            $product_id = $_GET['pid'];
            //echo $product_id;


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

            //$search = $_POST["search"];
            
            // Run a sql
            $sql = "SELECT * FROM Product where ID_Product = '$product_id'"; // find the top 5 popular item  (where kind like '$search'
            $result = $conn->query($sql);
            //$i = 0;
            
            // output data of each row
            while($row = $result->fetch_assoc()) {
                //$i++; 
                $pid = $row["ID_Product"];
                $pna = $row["product_name"];
                $ppr = $row["price"];
                $pim = $row["image"];
                $pin = $row["inventory"];
                $pde = $row["description"];
                //echo "<tr><td>".$pid[$i]."</td><td>".$pna[$i]."</td><td>".$ppr[$i]."</td><td>".$ppr[$i]."</td><td>".$pim[$i]."</td><td><button type="."button"." class="."btn btn-danger btn-xs".">cancle</button></td></tr><br>";
                 
            }
            //echo $search."<br>";
            //echo $i;

            if ($pin > 10){
                $inventory = "In Stock";
            }elseif ($pin > 0 && $pin <= 10) {
                $inventory = "Stock scarce";
            }else{
                $inventory = "Unavailable";
            }

            echo  "<img src=".$pim." alt="."Item/></div></div></div><div class="."col-md-7 item-top-in><div class="."item-para simpleCart_shelfItem><h1>".$pna."</h1><p>".$pde."</p><label class="."add-to item_price price>$  ".$ppr."</label><div class="."star-on><div class="."inventory><span class="."inventories".">".$inventory."</span></div></div>";
            
            echo "<div class="."available.".">"."<h6>Choose quantity </h6><ul><li>Quantity: <select name="."qty"."><option value="."1".">1</option><option value="."2".">2</option><option value="."3".">3</option><option value="."4".">4</option><option value="."5".">5</option></select></li></ul></div>"."<input type="."hidden"." value=".$pid." name="."pid".">";

            if ($inventory == "Unavailable"){
                echo "<a href="."#"." "."class="."cart item_add".">This item is not available</a>";
            }else{
                echo "<input type="."submit"." value="."Add to Cart".">";
                //echo "<a href="."CheckOut.php"." "."class="."cart item_add".">Add to Cart</a>";
            }
            
            //<input type="submit" value="Login">"<div class="."word-in"."></div>"
                          

            //($i-$in_num+$l+1)
            //$i = 0;    
            // Close connection
            mysqli_close($conn);
        //}
?>

        






