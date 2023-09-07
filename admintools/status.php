<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
         body{
            display: flex;
            flex-direction: column;
            align-items: center;
            font-family: Arial, Helvetica, sans-serif;;
        }
        h1{
            font-weight: bolder;
            width: 60%;
        }
        #client {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 60%;
            color: black;
            margin-top: 5rem;
        }

        #client td, #client th {
            border: 1px solid #ddd;
            padding: 8px;
        }
 
        #client tr{
            background-color: white;
        }
        .open-item{
            background-color: orangered;
        }
        #client tr:hover {
            background-color: #ddd;
        }

        #client th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: dodgerblue;
            color: white;
        }
        a{
            color: black;
            text-decoration: none;
            text-transform: capitalize;

        }
        #client i{
            color: red;
            cursor: pointer;
        }
        .head{
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 90%;
            margin-top: 2rem
        }
        .home{
            transition: 1s ease-in-out;
        }
        .home:hover{
            color: purple;
        }
        .container{
            margin: 3rem;
        }
    </style>
</head>
<body>
    <div class="head">
        <a href="../dashboard.php" class="home"><i class='bx bx-arrow-back'></i>Back to home</a>
        <h1>Status</h1>
    </div>
    <table id="client">
            <thead>
                <tr>
                    <th>Status</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody></tbody>
    </table>
    <form action="status.php" class="container" method="POST">
        <h1>Add Status</h1>
        <label for="">Status</label>
        <input type="text" name="status">
        <button name="submit" type="submit">Add</button>
    </form>

        <script src="fetchStatus.js"></script>
</body>
</html>

<?php
    include "../config.php";
    if (!empty($_POST["status"])){
        $status = $_POST["status"];

 
         $sql = "INSERT INTO `status` (`status_id`, `status`) VALUES ('0', '$status')";
 
         $rs = mysqli_query($conn, $sql);
 
         if($rs)
         {
             echo '<script type ="text/JavaScript">'; 
             echo 'alert("Status successfully added!")';
             echo '</script>';  
         }
 
         mysqli_close($conn);
 }
 
?>