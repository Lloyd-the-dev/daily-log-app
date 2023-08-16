<?php

   if(isset($_POST['submit']))
    {
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $phoneNumber = $_POST["phoneNumber"];
        $address = $_POST["address"];
        $country = $_POST["country"];
        $password = $_POST["password"];
        $confPassword = $_POST["confirmPassword"];

    }
    if($password != $confPassword){
      echo '<script type ="text/JavaScript">'; 
      echo 'alert("Passwords do not match")';
      echo '</script>';
    }else{
      $con = mysqli_connect("localhost","root","oreoluwa2003","daily_logging");

      $sql = "INSERT INTO `user_details` (`user_id`, `Firstname`,`Lastname`, `Email`, `Password`,`Phonenumber`,`Address`,`Country`, `is_admin`) VALUES ('0', '$firstName','$lastName', '$email', '$password','$phoneNumber','$address', '$country'  , '0')";

      $rs = mysqli_query($con, $sql);

      if($rs)
      {
        echo "Contact Records inserted";
        header("Location: index.html");
      }

      mysqli_close($con);
    }

   
?>