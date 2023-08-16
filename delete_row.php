<?php
include "config.php"; // Include the database connection file

if (isset($_GET["name"])) {
    $rowName = $_GET["name"];

    // Delete the row from the project_details table
    $deleteQuery = "DELETE FROM project_details WHERE user_name = '$rowName'";
    
    if ($conn->query($deleteQuery) === TRUE) {
        header("Location: adminDashboard.html");
        exit();
    } else {
        echo "Error deleting row: " . $conn->error;
    }

    $conn->close();
}
?>
