<?php
include "config.php"; // Include the database connection file

session_start();
// Get the employee ID from the query parameter
$employeeName = $_SESSION["name"];
$employeeId = $_SESSION["user_id"];

// Fetch employee details from the database based on the ID
$sql = "SELECT * FROM user_details WHERE user_id = '$employeeId'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $employeeFirstname = $row['Firstname'];
    $employeeLastname = $row['Lastname'];
    $employeeFullname = $row['Firstname']. " " . $row['Lastname'];
    $employeeEmail = $row['Email'];
    $employeePhone = $row['Phonenumber'];
    $employeeAddress = $row['Address'];
    $employeeCountry = $row['Country'];

} else {
    echo "Employee not found.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $employeeFullname; ?>'s Profile</title>
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
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="./images/user-profile.webp" width="90"><span class="font-weight-bold"><?php echo $employeeFirstname; ?></span><span class="text-black-50"><?php echo $employeeEmail; ?></span><span><?php echo $employeeCountry; ?></span></div>
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
                    <form action="user_profile.php" method="POST">
                        <div class="row mt-2">
                                <div class="col-md-6"><input type="text" class="form-control" placeholder="first name" value="<?php echo $employeeFirstname; ?>" name="first_name"></div>
                                <div class="col-md-6"><input type="text" class="form-control" value="<?php echo $employeeLastname; ?>" placeholder="Lastname" name="last_name"></div>
                        </div>
                        <div class="row mt-3">
                                <div class="col-md-6"><input type="text" class="form-control" placeholder="Email" value="<?php echo $employeeEmail; ?>" name="email"></div>
                                <div class="col-md-6"><input type="text" class="form-control" value="<?php echo $employeePhone; ?>" placeholder="Phone number" name="phone_number"></div>
                        </div>
                        <div class="row mt-3">
                                <div class="col-md-6"><input type="text" class="form-control" placeholder="address" value="<?php echo $employeeAddress; ?>" name="address"></div>
                                <div class="col-md-6"><input type="text" class="form-control" value="<?php echo $employeeCountry; ?>" placeholder="Country" name="country"></div>
                        </div>
                        </div>
                        <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="submit" name="submit">Save Profile</button></div>
                        </div>
                    </form>
                    
            </div>
        </div>
    </div>
</body>
</html>
<?php 
    include "config.php";
    // session_start();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $newFirstname = $_POST["first_name"];
        $newLastname = $_POST["last_name"];
        $newEmail = $_POST["email"];
        $newPhone = $_POST["phone_number"];
        $newAddress = $_POST["address"];
        $newCountry = $_POST["country"];
        $userId = $_SESSION["user_id"];

        $updateQuery = "UPDATE user_details SET Firstname = '$newFirstname', Lastname = '$newLastname', Email = '$newEmail', Phonenumber = '$newPhone', Address = '$newAddress', Country = '$newCountry' WHERE user_id = '$userId'";

        if ($conn->query($updateQuery) === TRUE) {
            echo '<script type ="text/JavaScript">'; 
            echo 'alert("Profile Updated successfully!")';
            echo '</script>';
        } else {
            echo "Error updating profile: " . $conn->error;
        }
    
        $conn->close();
    }
?>