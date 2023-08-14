<?php

   if(isset($_POST['submit']))
    {
        $fullName = $_POST["fullName"];
        $email = $_POST["email"];
        $password = $_POST["password"];
    }

   $con = mysqli_connect("localhost","root","oreoluwa2003","daily_logging");

   $sql = "INSERT INTO `user_details` (`user_id`, `Fullname`, `Email`, `Password`) VALUES ('0', '$fullName', '$email', '$password')";

   $rs = mysqli_query($con, $sql);

   if($rs)
   {
     echo "Contact Records inserted";
   }

   mysqli_close($con);
?>