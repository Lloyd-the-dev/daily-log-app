<?php
include "../config.php"; // Include the database connection file

if (isset($_GET["id"])) {
    $rowId = $_GET["id"]; 

    // Delete the row from the project_details table
    $deleteQuery = "DELETE FROM status WHERE status_id = '$rowId'";
    
    if ($conn->query($deleteQuery) === TRUE) {
        header("Location: status.php");
        exit();
    } else {
        echo "Error deleting row: " . $conn->error;
    }

    $conn->close();
}
?>
