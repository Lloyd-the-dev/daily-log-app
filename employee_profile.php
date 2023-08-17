<?php
        include "config.php"; // Include the database connection file

        if (isset($_GET['name'])) {
            $employeeId = trim($_GET['name']);
    
            // Query to retrieve employee profile based on the employeeName called "employeeId"
            $sql = "SELECT * FROM project_details WHERE user_name ='$employeeId'";
            $result = $conn->query($sql);
    
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            } else {
                echo "Employee not found.";
            }
        } else {
            echo "Invalid request.";
        }

    
        

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['user_name']?>'s Profile</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body{
            font-family: "Poppins", sans-serif;
        }
        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
        }

        input,
        select{
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s ease-in-out;
        }

        input:focus,
        select:focus{
            outline: none;
            border-color: #3498db;
        }

        button {
            background-color: #3498db;
            text-decoration: none;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 15px;
            transition: background-color 0.3s ease-in-out;
        }

        button:hover {
            background-color: #2980b9;
        }
        
        .head{
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 59%;
        }
        .home{
            transition: 1s ease-in-out;
        }
        .home:hover{
            color: purple;
        }

    </style>
</head>
<body style="padding: 4rem; text-align: center;">
    <div class="head">
        <a href="./adminDashboard.html" class="home"><i class='bx bx-arrow-back'></i>Back to Logsheet</a>
        <h1 style="text-transform: capitalize;">
            <?php echo $row['user_name']; ?>'s Profile
        </h1>
    </div>
    <img src="./images/user-profile.webp" alt="" width= "200px" style="border-radius: 50%;">
    
    
    <form action="assign.php?name=<?php echo $employeeId?>" method="POST" style="width: 27%; margin-left: 440px">
                <label for="project" style="margin-bottom: 1.5rem;">Assign to Project</label>
                <select id="project" name="project">
                        <option value="<?php echo $row['project']?>"><?php echo $row['project']?></option>
                        <option value="Ibile-Hub">Ibile-Hub</option>
                        <option value="RevBill">RevBill</option>
                        <option value="LASEPA">LASEPA</option>
                        <option value="HMS">HMS</option>
                        <option value="Telemedicine-HMS">Telemedicine-HMS</option>
                        <option value="Smaptaal">Smaptaal</option>
                        <option value="RevPay">RevPay</option>
                        <option value="Business-License">Business-License</option>
                        <option value="Bank-Assessment">Bank-Assessment</option>
                        <option value="TechPay-Web">TechPay-Web</option>
                        <option value="HR">HR</option>
                        <option value="LRP">LRP</option>
                        <option value="LRP-Admin">LRP-Admin</option>
                        <option value="TechPay-Mobile">TechPay-Mobile</option>
                        <option value="E-Settlement">E-Settlement</option>
                        <option value="LSSB">LSSB</option>
                        <option value="LASPA">LASPA</option>
                        <option value="LASEMA">LASEMA</option>
                </select>
                <button name="submit" type="submit" onclick="redirectToEmail()">Assign</button>
    </form>

    <script>
        function redirectToEmail() {
            let email = "<?php echo $row['Email']; ?>";
            let project = "<?php echo $project; ?>";
            let subject = encodeURIComponent("Project Assignment");
            let body = encodeURIComponent("You have been assigned to the project: " + project);

            let mailtoLink = "mailto:" + email + "?subject=" + subject + "&body=" + body;
            window.location.href = mailtoLink;
        }
    </script>
</body>
</html> 
