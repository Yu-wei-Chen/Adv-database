            <?php

            session_start();
            $Mid = $_SESSION['Mid'];

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

            $sql6 = "SELECT * FROM Manager where ID_Manager = $Mid "; 
            //echo "<BR>"."<BR>".$sql."<BR>"."<BR>"."<BR>"."<BR>";
            $result6 = $conn->query($sql6);
            

            while($row6 = $result6->fetch_assoc()) {
                //$i++; 
                $job = $row6["job_title"];

            }

            if ($job != "super") {
                
                $sql7 = "SELECT * FROM Store where ID_Manager = $Mid "; 
            //echo "<BR>"."<BR>".$sql."<BR>"."<BR>"."<BR>"."<BR>";
                $result7 = $conn->query($sql7);
                

                while($row7 = $result7->fetch_assoc()) {
                    //$i++; 
                    $Sid = $row7["ID_Store"];
                    echo "<option>".$Sid."</option>";
                }


            }else{

                $sql7 = "SELECT * FROM Store "; 
                //echo "<BR>"."<BR>".$sql."<BR>"."<BR>"."<BR>"."<BR>";
                $result7 = $conn->query($sql7);
                

                while($row7 = $result7->fetch_assoc()) {
                    //$i++; 
                    $Sid = $row7["ID_Store"];
                    echo "<option>".$Sid."</option>";
                }
            }



            ?>