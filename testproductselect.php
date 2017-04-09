<?php
            session_start();
            //$AAA =  $_SESSION['id']
		//echo $_POST["search"]."  <- input<BR/>";
        //if ($_POST["search"]!=null) {
            $sid = $_SESSION['id'];
            $stype = $_SESSION['type'];
            $gender = $_GET['gender'];
            $kind = $_GET['kind'];
            $price = $_GET['price'];
            $search_YN = $_POST["search"];
            $search = "%".$_POST["search"]."%";

            $link = $_SERVER['REQUEST_URI'];

            // connect to MySQL
            include_once("config.php");
            
            // Run a sql
            
            if ($search_YN != null) {
                $sql = "SELECT * FROM Product where product_name like '$search' "; // find the top 5 popular item  (where kind like '$search'
            }elseif ($kind == null) {
                $sql = "SELECT * FROM Product where gender = '$gender' "; // find the top 5 popular item  (where kind like '$search'
            }else{
                $sql = "SELECT * FROM Product where gender = '$gender' and kind = '$kind' "; // find the top 5 popular item  (where kind like '$search'
            }

            //$sql = "SELECT * FROM Product where gender = $gender and kind = $kind "; // find the top 5 popular item  (where kind like '$search'
            if ($price != null){
                $sql = $sql."order by $price";
            }


            $result = $conn->query($sql);
            $i = 0;
            
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $i++; 
                $pid[$i] = $row["ID_Product"];
                $pna[$i] = $row["product_name"];
                $ppr[$i] = $row["price"];
                $pim[$i] = $row["image"];
                //echo "<tr><td>".$pid[$i]."</td><td>".$pna[$i]."</td><td>".$ppr[$i]."</td><td>".$ppr[$i]."</td><td>".$pim[$i]."</td><td><button type="."button"." class="."btn btn-danger btn-xs".">cancle</button></td></tr><br>";
                 
            }
            //echo $search."<br>";
            //echo $i;

            $out_num = ceil($i / 3);
            //echo $out_num;
            $in_num = $i % 3;
            if ($in_num == 0) {
                $in_num = 3;
            }

            //echo "<br><br><br>";

            if ($i > 3) {
                for ($k=0; $k < ($out_num-1); $k++) { 
                    echo "<div class="."content-top1".">";
                    
                    echo "<div class="."col-md-4 col-md3"."><div class="."col-md1 simpleCart_shelfItem"."> <a href="."Item.php?pid=".$pid[($k*3)+1]."><img class="."img-responsive"." src=".$pim[($k*3)+1]." alt="."product image"."/></a><h3><a href="."Item.php?pid=".$pid[($k*3)+1].">".$pna[($k*3)+1]."</a></h3><div class="."price"."><h5 class="."item_price".">$".$ppr[($k*3)+1]."</h5><a href="."AddtoCart.php?id=".$sid."&type=".$stype."&pid=".$pid[($k*3)+1].""." class="."item_add".">Add To Cart</a><div class="."clearfix".">  ";
                    echo "</div></div></div></div> ";

                    echo "<div class="."col-md-4 col-md3"."><div class="."col-md1 simpleCart_shelfItem"."> <a href="."Item.php?pid=".$pid[($k*3)+2]."><img class="."img-responsive"." src=".$pim[($k*3)+2]." alt="."product image"."/></a><h3><a href="."Item.php?pid=".$pid[($k*3)+2].">".$pna[($k*3)+2]."</a></h3><div class="."price"."><h5 class="."item_price".">$".$ppr[($k*3)+2]."</h5><a href="."AddtoCart.php?id=".$sid."&type=".$stype."&pid=".$pid[($k*3)+2].""." class="."item_add".">Add To Cart</a><div class="."clearfix".">  ";
                    echo "</div></div></div></div> ";

                    echo "<div class="."col-md-4 col-md3"."><div class="."col-md1 simpleCart_shelfItem"."> <a href="."Item.php?pid=".$pid[($k*3)+3]."><img class="."img-responsive"." src=".$pim[($k*3)+3]." alt="."product image"."/></a><h3><a href="."Item.php?pid=".$pid[($k*3)+3].">".$pna[($k*3)+3]."</a></h3><div class="."price"."><h5 class="."item_price".">$".$ppr[($k*3)+3]."</h5><a href="."AddtoCart.php?id=".$sid."&type=".$stype."&pid=".$pid[($k*3)+3].""." class="."item_add".">Add To Cart</a><div class="."clearfix".">  ";
                    echo "</div></div></div></div> ";
                    
                    echo "</div>";
                }
            }    


            if ($pid[$i] == null) {
                echo "No item";
            }else{
            //echo "<br><br><br>";
                echo "<div class="."content-top1".">";

                for ($l=0; $l < $in_num; $l++) { 
                    echo "<div class="."col-md-4 col-md3"."><div class="."col-md1 simpleCart_shelfItem"."> <a href="."Item.php?pid=".$pid[($i-$in_num+$l+1)].""."><img class="."img-responsive"." src=".$pim[($i-$in_num+$l+1)]." alt="."product image"."/></a><h3><a href="."Item.php?pid=".$pid[($i-$in_num+$l+1)].">".$pna[($i-$in_num+$l+1)]."</a></h3><div class="."price"."><h5 class="."item_price".">$".$ppr[($i-$in_num+$l+1)]."</h5><a href="."AddtoCart.php?pid=".$pid[($i-$in_num+$l+1)].""." class="."item_add".">Add To Cart</a><div class="."clearfix".">  ";
                        echo "</div></div></div></div> ";
                }

                echo "</div>";

            }

            //($i-$in_num+$l+1)
            //$i = 0;    
            // Close connection
            mysqli_close($conn);
        //}
?>

        






