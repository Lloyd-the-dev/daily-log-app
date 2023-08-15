<?php 

    $con = mysqli_connect("localhost","root","oreoluwa2003","daily_logging");
   
    $email = $_POST["email"];
    $password = $_POST["password"];


    $sql = "SELECT user_id, Fullname, Email, is_admin, Password FROM user_details WHERE Email = '$email' AND Password = '$password'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
      
    if($count == 1){  
        session_start();
        $_SESSION["user_id"] = $row["user_id"];
        $_SESSION["name"] = $row["Fullname"];
        $_SESSION["admin"] = $row["is_admin"];
        
        header("Location: dashboard.php"); // Redirect to user dashboard 
    }  
    else{  
        echo "<h1> Login failed. Invalid username or password.</h1>"; 

    }     

    $con->close();
      
?>