<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
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
        .container{
            margin: 3rem;
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
        .onboard{
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="head">
        <a href="../dashboard.php" class="home"><i class='bx bx-arrow-back'></i>Back to home</a>
        <h1>Employees</h1>
    </div>
    <table id="client">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody></tbody>
    </table>
    <form action="users.php" class="container" method="POST">
        <h1 class="onboard">Onboard Users</h1>
        <label for="">Email</label>
        <input type="email" name="email">
        <select name="accountType" id="">
            <option value="user">User</option>
            <option value="admin">Admin</option>
            <option value="passive">PassiveAdmin</option>
        </select>
        <button name="submit" type="submit">Onboard</button>
    </form>

        <script>
            
            fetch('fetchUsers.php')
                    .then(response => response.json())
                    .then(data => {
                        const tableBody = document.querySelector('#client tbody');
                
                        data.forEach(row => {
                            const newRow = tableBody.insertRow();
                            const passive = row.passiveAdmin
                            const adminRole = row.is_admin
                            const message = (adminRole == 1) ? "(admin)" : ""
                            const message2 = (passive == 1) ? "(passive)" : ""
                            newRow.insertCell().innerHTML = row.Firstname;
                            newRow.insertCell().textContent = row.Lastname; 
                            newRow.insertCell().innerHTML = row.Email + ' <b>' + message + '</b>'+ '<b>' + message2 + '</b>'; 
                            newRow.insertCell().textContent = row.Password; 
                            newRow.insertCell().textContent = row.Phonenumber; 
                            newRow.insertCell().textContent = row.Address; 
                            newRow.insertCell().innerHTML = '<td><a href="delete_user.php?id=' + row.user_id + '"><i class="bx bx-trash" ></i></a></td>';

                        });
                    })
                .catch(error => console.error('Error fetching data:', error));
        </script>
</body>
</html>

<?php
    include "../config.php";
    if (!empty($_POST["email"])){
        $email = $_POST["email"];
        $accType = $_POST["accountType"];
        //Normal users
        if($accType == "user"){
            $sql = "INSERT INTO `user_details` (`user_id`, `Firstname`,`Lastname`, `Email`, `Password`,`Phonenumber`,`Address`, `is_admin`, `first_login`, `passiveAdmin`) VALUES ('0', '','', '$email', '' , '' , '' ,  '0', '1', '0')";
        } else if($accType == "admin"){
            $sql = "INSERT INTO `user_details` (`user_id`, `Firstname`,`Lastname`, `Email`, `Password`,`Phonenumber`,`Address`, `is_admin`, `first_login`, `passiveAdmin`) VALUES ('0', '','', '$email', '' , '' , '' ,  '1', '1', '0')";
        }else{
            $sql = "INSERT INTO `user_details` (`user_id`, `Firstname`,`Lastname`, `Email`, `Password`,`Phonenumber`,`Address`, `is_admin`, `first_login`, `passiveAdmin`) VALUES ('0', '','', '$email', '' , '' , '' ,  '0', '1', '1')";
        }
        



         $rs = mysqli_query($conn, $sql);
 
         if($rs)
         {
             echo '<script type ="text/JavaScript">'; 
             echo 'alert("User successfully onboarded!")';
             echo '</script>';  
         }
 
         mysqli_close($conn);
 }
 
?>