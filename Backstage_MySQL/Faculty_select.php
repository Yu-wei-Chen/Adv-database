<?php

if(!session_id()) session_start();
                //  echo $_SESSION['mStoreid'];
                //  echo $_SESSION['job'];
                //  echo $_SESSION['mstate'];
                    $Mid = $_SESSION['Mid'];

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

            $sql2 = "SELECT * FROM Manager where ID_Manager = $Mid "; 
                //echo "<BR>"."<BR>".$sql."<BR>"."<BR>"."<BR>"."<BR>";
            $result2 = $conn->query($sql2);

            while($row2 = $result2->fetch_assoc()) {
                $job = $row2["job_title"];
            }
            
            

            if ($job == "clerk" ){
                echo "<script>alert('You do not have permission'); location.href = 'home.php';</script>";
                exit;
            }    

            $sql1 = "SELECT * FROM Manager where  job_title = 'clerk' "; 
                //echo "<BR>"."<BR>".$sql."<BR>"."<BR>"."<BR>"."<BR>";
            $result1 = $conn->query($sql1);

            //echo $sql1;

            while($row1 = $result1->fetch_assoc()) {
                $name = $row1["manager_name"];
                $address = $row1["address"];
                $email = $row1["email"];
                $phone = $row1["phone"];
                $Sid = $row1["ID_Store"];
                $state = $row1["state"];
                $Cid = $row1["ID_Manager"];



                $sql3 = "SELECT * FROM Salary where ID_Store = $Sid and job_title = 'clerk' "; 
                //echo "<BR>"."<BR>".$sql."<BR>"."<BR>"."<BR>"."<BR>";
                $result3 = $conn->query($sql3);

                while($row3 = $result3->fetch_assoc()) {
                    //$i++; 
                    $salary_C = $row3["salary"];
                }

                
                echo "<tr>";
                echo "<td>".$name."</td>";
                echo "<td>".$Sid."</td>";
                echo "<td>".$state."</td>";
                echo "<td>".$email."</td>";
                echo "<td>".$phone."</td>";
                echo "<td>".$address."</td>";
                echo "<td>".$salary_C."</td>";
                echo "<td>";
                echo "<button type="."button"." class="."btn btn-default btn-link".">";
                echo "<a href="."editFaculty.php?Cid=".$Cid."".">";         
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

        






