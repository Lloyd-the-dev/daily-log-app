<?php 

    $con = mysqli_connect("localhost","root","","daily_logging");
   
    $email = $_POST["email"];
    $password = $_POST["password"];


    $sql = "SELECT user_id, Fullname, Email, Password FROM user_details WHERE Email = '$email' AND Password = '$password'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
      
    if($count == 1){  
        echo "<h1><center> Login successful </center></h1>";  
    }  
    else{  
        echo "<h1> Login failed. Invalid username or password.</h1>";  
    }     

    $con->close();
      
?>