<?php

session_start();
                //  echo $_SESSION['mStoreid'];
                //  echo $_SESSION['job'];
                //  echo $_SESSION['mstate'];
                    $Mid = $_SESSION['Mid'];

            if ($Mid != 5){
                echo "<script>alert('You do not have permission'); location.href = 'home.php';</script>";
            }            

            

            //echo $cid."<BR>";
            //echo $ctype;

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
            
            




            $sql = "SELECT * FROM Store "; 
            //echo "<BR>"."<BR>".$sql."<BR>"."<BR>"."<BR>"."<BR>";
            $result = $conn->query($sql);
            
            //echo $sql;
            
            
            // output data of each row
            while($row = $result->fetch_assoc()) {
                //$i++; 
                $Manager = $row["ID_Manager"];
                $Sname = $row["store_name"];
                $Sid = $row["ID_Store"];
            
                $sql2 = "SELECT * FROM Salary where ID_Store = $Sid and job_title = 'clerk' "; 
                //echo "<BR>"."<BR>".$sql."<BR>"."<BR>"."<BR>"."<BR>";
                $result2 = $conn->query($sql2);

                while($row2 = $result2->fetch_assoc()) {
                    //$i++; 
                    $salary_C = $row2["salary"];
                }

                $sql3 = "SELECT * FROM Salary where ID_Store = $Sid and job_title = 'manager' "; 
                //echo "<BR>"."<BR>".$sql."<BR>"."<BR>"."<BR>"."<BR>";
                $result3 = $conn->query($sql3);

                while($row3 = $result3->fetch_assoc()) {
                    //$i++; 
                    $salary_M = $row3["salary"];
                }


                
                echo "<tr>";
                echo "<td>".$Sname."</td>";
                echo "<td>".$Manager."</td>";
                echo "<td>".$salary_C."</td>";
                echo "<td>".$salary_M."</td>";
                echo "<td>";
                echo "<button type="."button"." class="."btn btn-default btn-link".">";
                echo "<a href="."editStore.php?Sid=".$Sid."".">";         
                echo "edit";
                echo "</a>";
                echo "</button>";
                echo "</td>";
                echo "</tr>";

            }
            
          /*   
                "."quantity".[$qq+1].""."
            
                
            */
            //for ($pp=0; $pp < $i; $pp++) { 
            /*    
                echo "<tr>";
                echo "<td class="."ring-in".">";
                echo "<a class="."at-in".">";
                echo "<img src=".$tpimage." class="."img-responsive".">";
                echo "</a>";         
                echo "<div class="."sed".">";
                echo "<h5>".$tpname."</h5>";
                echo "<p>".$tpdesc."</p>";
                echo "</div>";
                echo "<div class="."clearfix"."></div> ";
                echo "</td>";        
                echo "<td>".$tqty."</td>";
                echo "<td>$".$value."</td>";
                echo "<td>".$tdate."</td>";
                echo "<td><a href="."#".">x</a></td>";
                echo "</tr>";
            */
            //}

            // Close connection
            mysqli_close($conn);
        //}
?>

        






