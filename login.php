<?php 

    $con = new mysqli("localhost","root","","daily_logging");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $password = $_POST["password"];


            $sql = "SELECT user_id, Fullname, Email, Password FROM user_details WHERE Email = '$email'";
            $result = $con->query($sql);
        
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                if (password_verify($password, $row["Password"])) {
                    session_start();
                    $_SESSION["user_id"] = $row["user_id"];
                    $_SESSION["email"] = $row["Email"];
                    header("Location: dashboard.php"); // Redirect to user dashboard
                } else {
                    echo "Invalid password.";
                }
            } else {
                echo "Invalid Email."; 
            }
        }
    $con->close();
      
?>