<?php
include "config.php"; // Include the database connection file

if (isset($_GET["name"]) && isset($_GET["row"])) {
    $rowName = $_GET["name"];
    $rowId = $_GET["row"]; 

    // Delete the row from the project_details table
    $deleteQuery = "DELETE FROM project_details WHERE user_name = '$rowName' AND project_id = '$rowId'";
    
    if ($conn->query($deleteQuery) === TRUE) {
        header("Location: adminDashboard.php");
        exit();
    } else {
        echo "Error deleting row: " . $conn->error;
    }

    $conn->close();
}
?>
