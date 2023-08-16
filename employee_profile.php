<?php

include "config.php"; // Include the database connection file


if (isset($_GET['name'])) {
    $employeeId = trim($_GET['name']);

    // Query to retrieve employee profile based on the employeeId
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
    <link rel="stylesheet" href="./css/dashboard.css">
</head>
<body style="background: #303030; padding: 4rem;">
    <h1 style="margin-left: 400px; text-transform: capitalize;"><?php echo $row['user_name']?>'s Profile</h1>
    <form action="employee_profile.php" method="POST" style="width: 27%; margin-left: 400px;">
                <label for="project">Assign to Project</label>
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

                <button name="submit" type="submit" id="assign">Assign</button>
    </form>
</body>
</html> 
