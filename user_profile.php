<?php
include "config.php"; // Include the database connection file

session_start();
// Get the employee ID from the query parameter
$employeeName = $_SESSION["name"];

// Fetch employee details from the database based on the ID
$sql = "SELECT * FROM user_details WHERE Fullname = '$employeeName'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $employeeName = $row['Fullname'];
    $employeeEmail = $row['Email'];
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
    <link rel="stylesheet" href="./css/user-profile.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container rounded bg-white mt-5">
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="./images/user-profile.webp" width="90"><span class="font-weight-bold"><?php echo $employeeName; ?></span><span class="text-black-50"><?php echo $employeeEmail; ?></span><span>United States</span></div>
            </div>
            <div class="col-md-8">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-row align-items-center back">
                            <i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                            <a href="./dashboard.php" class="mb-1 text-decoration-none text-body">Back to home</a>
                        </div>
                        <h6 class="text-right">Edit Profile</h6>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><input type="text" class="form-control" placeholder="first name" value="John"></div>
                        <div class="col-md-6"><input type="text" class="form-control" value="Doe" placeholder="Doe"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><input type="text" class="form-control" placeholder="Email" value="john_doe12@bbb.com"></div>
                        <div class="col-md-6"><input type="text" class="form-control" value="+19685969668" placeholder="Phone number"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><input type="text" class="form-control" placeholder="address" value="D-113, right avenue block, CA,USA"></div>
                        <div class="col-md-6"><input type="text" class="form-control" value="USA" placeholder="Country"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><input type="text" class="form-control" placeholder="Bank Name" value="Bank of America"></div>
                        <div class="col-md-6"><input type="text" class="form-control" value="043958409584095" placeholder="Account Number"></div>
                    </div>
                    <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
