<?php
include "config.php"; // Include the database connection file



// Get the employee ID from the query parameter
// $employeeName = 

// Fetch employee details from the database based on the ID
$sql = "SELECT * FROM project_details WHERE user_name = 'ore'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $employeeName = $row['user_name'];
} else {
    echo "Employee not found.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $employeeName; ?>'s Profile</title>
    <link rel="stylesheet" href="./css/dashboard.css">
</head>
<body style="background: #303030; padding: 4rem;">
    <h1 style="margin-left: 400px; text-transform: capitalize;"><?php echo $employeeName; ?>'s Profile</h1>
    <form action="employee_profile.php" method="POST" style="width: 27%; margin-left: 400px;">
                <label for="project">Assign to Project</label>
                <select id="project" name="project">
                        <option value="<?php $row['project']?>"><?php echo $row['project']?></option>
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
                
                <button name="submit" type="submit">Assign</button>
    </form>
</body>
</html>
<?php 
    $errors = [];
    $errorMessage = '';

    if (!empty($_POST)) {
    $email = "ojoore35@gmail.com";
    $message = "Baby let me love you love you love you". $_POST['project'];



    if (empty($message)) {
        $errors[] = 'Message is empty';
    }

    if (empty($errors)) {
        $toEmail = 'ore_ojo14@yahoo.com';
        $emailSubject = 'New email from your contact form';
        $headers = ['From' => $email, 'Reply-To' => $email, 'Content-type' => 'text/html; charset=utf-8'];
        $bodyParagraphs = ["Email: {$email}", "Message:", $message];
        $body = join(PHP_EOL, $bodyParagraphs);
 
        if (mail($toEmail, $emailSubject, $body, $headers)) {
 
            echo "It worked";
        } else {
            $errorMessage = 'Oops, something went wrong. Please try again later';
        }
    }
}
?>