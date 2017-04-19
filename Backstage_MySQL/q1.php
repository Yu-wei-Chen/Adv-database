<?php
if(!session_id()) session_start();
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
    
    
//q1_from
    if(isset($_GET['q1_from'])) {$q1_from=$_GET['q1_from'];} else{$q1_from="";}
        
    if($q1_from != ""){
        $year_q1_from=substr($q1_from,0,4);
        $month_q1_from=substr($q1_from,4);
        $sql="update query set fromyear=$year_q1_from,frommonth=$month_q1_from where id=1";
        $result=mysqli_query($conn,$sql);
        $q1_from="";
        
    }
//q1_to
     if(isset($_GET['q1_to'])) {$q1_to=$_GET['q1_to'];} else{$q1_to="";}
     if($q1_to != ""){
        $year_q1_to=substr($q1_to,0,4);
        $month_q1_to=substr($q1_to,4);
        $sql="update query set toyear=$year_q1_to,tomonth=$month_q1_to where id=1";
        $result=mysqli_query($conn,$sql);
        $q1_to="";
        //echo $month;
    }

//q2_from

    if(isset($_GET['q2_from'])) {$q2_from=$_GET['q2_from'];} else{$q2_from="";}
        
    if($q2_from != ""){
        $year=substr($q2_from,0,4);
        $month=substr($q2_from,4);
        $sql="update query set fromyear=$year,frommonth=$month where id=2";
        $result=mysqli_query($conn,$sql);
        
        
    }
    
//q2_to

     if(isset($_GET['q2_to'])) {$q2_to=$_GET['q2_to'];} else{$q2_to="";}
     if($q2_to != ""){
        $year=substr($q2_to,0,4);
        $month=substr($q2_to,4);
        $sql="update query set toyear=$year,tomonth=$month where id=2";
        $result=mysqli_query($conn,$sql);
        
    }
    
//q3_from
    if(isset($_GET['q3_from'])) {$q3_from=$_GET['q3_from'];} else{$q3_from="";}
        
    if($q3_from != ""){
       
        $date=explode("/",$q3_from); //0=year 1=month 2=day
        $year=$date[0];
        $month=$date[1];
        $day=$date[2];
        $sql="update query set fromyear=$year,frommonth=$month,fromday=$day where id=3";
        $result=mysqli_query($conn,$sql);
        
        
    }
//q3_to
     if(isset($_GET['q3_to'])) {$q3_to=$_GET['q3_to'];} else{$q3_to="";}
     if($q3_to != ""){
        
        $date=explode("/",$q3_to); //0=year 1=month 2=day 
        $year=$date[0];
        $month=$date[1];
        $day=$date[2]; 
        $sql="update query set toyear=$year,tomonth=$month, today=$day where id=3";
        $result=mysqli_query($conn,$sql);
        
    }
//q4_from
    if(isset($_GET['q4_from'])) {$q4_from=$_GET['q4_from'];} else{$q4_from="";}
        
    if($q4_from != ""){
        $date=explode("/",$q4_from); //0=year 1=month 2=day 
        $year=$date[0];
        $month=$date[1];
        $day=$date[2]; 
        $sql="update query set fromyear=$year,frommonth=$month,fromday=$day where id=4";
        $result=mysqli_query($conn,$sql);
        
        
    }
//q4_to
     if(isset($_GET['q4_to'])) {$q4_to=$_GET['q4_to'];} else{$q4_to="";}
     if($q4_to != ""){
        $date=explode("/",$q4_to); //0=year 1=month 2=day 
        $year=$date[0];
        $month=$date[1];
        $day=$date[2]; 
        $sql="update query set toyear=$year,tomonth=$month, today=$day where id=4";
        $result=mysqli_query($conn,$sql);
        
    }
//q5_from
    if(isset($_GET['q5_from'])) {$q5_from=$_GET['q5_from'];} else{$q5_from="";}
        
    if($q5_from != ""){
        $year=substr($q5_from,0,4);
        $month=substr($q5_from,4);
        $sql="update query set fromyear=$year,frommonth=$month where id=5";
        $result=mysqli_query($conn,$sql);
        
        
    }
//q5_to
     if(isset($_GET['q5_to'])) {$q5_to=$_GET['q5_to'];} else{$q5_to="";}
     if($q5_to != ""){
        $year=substr($q5_to,0,4);
        $month=substr($q5_to,4);
        $sql="update query set toyear=$year,tomonth=$month where id=5";
        $result=mysqli_query($conn,$sql);
        
    }
//q6_from
    if(isset($_GET['q6_from'])) {$q6_from=$_GET['q6_from'];} else{$q6_from="";}
        
    if($q6_from != ""){
        
        $sql="update query set product_name='$q6_from' where id=6";
        $result=mysqli_query($conn,$sql);
        
        
    }
//q6_to
     if(isset($_GET['q6_to'])) {$q6_to=$_GET['q6_to'];} else{$q6_to="";}
     if($q6_to != ""){
        $year=substr($q6_to,0,4);
        $month=substr($q6_to,4);
        $sql="update query set toyear=$year,tomonth=$month where id=6";
        $result=mysqli_query($conn,$sql);
        
    }
//q7_from
    if(isset($_GET['q7_from'])) {$q7_from=$_GET['q7_from'];} else{$q7_from="";}
        
    if($q7_from != ""){
        $sql="update query set product_name='$q7_from' where id=7";
        $result=mysqli_query($conn,$sql);
        
        
    }
//q7_to
     if(isset($_GET['q7_to'])) {$q7_to=$_GET['q7_to'];} else{$q7_to="";}
     if($q7_to != ""){
        $year=substr($q7_to,0,4);
        $month=substr($q7_to,4);
        $sql="update query set toyear=$year,tomonth=$month where id=7";
        $result=mysqli_query($conn,$sql);
        
    }
//q8_from
    if(isset($_GET['q8_from'])) {$q8_from=$_GET['q8_from'];} else{$q8_from="";}
        
    if($q8_from != ""){
        $date=explode("/",$q8_from); //0=year 1=month 2=day 
        $year=$date[0];
        $month=$date[1];
        $week=$date[2]; 
        $sql="update query set fromyear=$year,frommonth=$month,fromweek=$week where id=8";
        $result=mysqli_query($conn,$sql);
        
        
    }
//q8_to
     if(isset($_GET['q8_to'])) {$q8_to=$_GET['q8_to'];} else{$q8_to="";}
     if($q8_to != ""){
        $date=explode("/",$q8_to); //0=year 1=month 2=day 
        $year=$date[0];
        $month=$date[1];
        $week=$date[2];
        $sql="update query set toyear=$year,tomonth=$month,toweek=$week where id=8";
        $result=mysqli_query($conn,$sql);
        
    }
?>
