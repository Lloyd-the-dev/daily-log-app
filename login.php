<?php 

    $con = mysqli_connect("localhost","root","oreoluwa2003","daily_logging");
   
    $email = $_POST["email"];
    $password = $_POST["password"];


    $sql = "SELECT user_id, Firstname, Email, is_admin, Password FROM user_details WHERE Email = '$email' AND Password = '$password'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
      
    if($count == 1){  
        session_start();
        $_SESSION["user_id"] = $row["user_id"];
        $_SESSION["name"] = $row["Firstname"];
        $_SESSION["mail"] = $row["Email"];
        $_SESSION["admin"] = $row["is_admin"];
        
        header("Location: dashboard.php"); // Redirect to user dashboard 
    }  
    else{  
        echo '<script type="text/JavaScript">';
        echo 'alert("Invalid credentials");';
        echo 'window.location.href = "index.php";'; // Redirect after displaying the alert
        echo '</script>';
    }     

    $con->close();
      
?>