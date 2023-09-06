<?php
   include "config.php";

   if (isset($_GET["id"])) {
        $rowId = $_GET["id"]; 
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $newProject = $_POST["project"];
            $newActivity = $_POST["task"];
            $newClientType = $_POST["client"];
            $newClientName = $_POST["clientName"];
            $newReference = $_POST["reference"];
            $newDate = $_POST["date"];
            $newStartTime = $_POST["start-time"];
            $newEndTime = $_POST["end-time"];
            $newTotalHours = $_POST["total-hours"];
            $newStatus = $_POST["status"];
            $newActionTaken = $_POST["actionTaken"];
            

            $updateQuery = "UPDATE project_details SET project = '$newProject', Activity = '$newActivity', ClientType = '$newClientType', ClientName = '$newClientName', Reference = '$newReference', Date = '$newDate', StartTime = '$newStartTime', EndTime = '$newEndTime', TotalHours = '$newTotalHours', Status = '$newStatus', ActionTaken = '$newActionTaken' WHERE project_id = '$rowId'";

            if ($conn->query($updateQuery) === TRUE) {
                header('Location: adminDashboard.php');
            } else {
                echo "Error updating profile: " . $conn->error;
            }

            $conn->close();
        }
   }
?>