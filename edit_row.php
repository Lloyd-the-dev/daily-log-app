<?php
    include "config.php"; // Include the database connection file

    if (isset($_GET["name"]) && isset($_GET["row"])) {
        $rowName = $_GET["name"];
        $rowId = $_GET["row"]; 

        // Delete the row from the project_details table
        $editQuery = "SELECT * FROM project_details WHERE user_name = '$rowName' AND project_id = '$rowId'";
        $result = $conn->query($editQuery);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $project = $row['project'];
            $activity = $row['Activity'];
            $clientType = $row['ClientType'];
            $clientName = $row['ClientName'];
            $reference = $row['Reference'];
            $date = $row['Date'];
            $startTime = $row['StartTime'];
            $endTime = $row['EndTime'];
            $totalhours = $row['TotalHours'];
            $status = $row['Status'];
            $actionTaken = $row['ActionTaken'];

        } else {
            echo "Employee not found.";
        }


        $conn->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Logs</title>
    <link rel="stylesheet" href="./css/dashboard.css">
    <style>
        .container{
            margin: 4rem auto;
        }
    </style>
</head>
<body>
    <form action="save.php?id=<?php echo $rowId;?>" class="container" method="POST">
            <h2 class="project-heading">Edit Projects</h2>

            <label for="project">Projects</label>
            <input type="text" value="<?php echo $project; ?>" name="project">

            <label for="message">Activity/Task</label>
            <textarea id="message" rows="4" name="task" class="activity" style="max-width: 360px; max-height: 100px" required><?php echo $activity; ?></textarea>

            <label for="client" class="client">ClientType</label>
            <input type="text" value="<?php echo $clientType; ?>" name="client">

            <label for="clientName">Client Name</label>
            <input type="text" value="<?php echo $clientName; ?>" name="clientName">

            <label for="reference">Reference/ID:</label>
            <input type="text" value="<?php echo $reference; ?>" name="reference">

            <label for="date">Date:</label>
            <input type="date" value="<?php echo $date; ?>" name="date">

            <label for="start-time">Start Time:</label>
            <input type="time" value="<?php echo $startTime; ?>" name="start-time">

            <label for="end-time">End Time:</label>
            <input type="time" value="<?php echo $endTime; ?>" name="end-time">

            <p>Total Hours Spent:</p>
            <input type="text" value="<?php echo $totalhours; ?>" name="total-hours">

            <label for="status">Status</label>
            <input type="text" value="<?php echo $status; ?>" name="status">

            <label for="actionTaken">Action Taken: </label>
            <textarea id="actionTaken" name="actionTaken" rows="4" required style="max-width: 360px; max-height: 100px" name="actionTaken"><?php echo $actionTaken; ?></textarea>
            <button name="submit" type="submit">Save</button>
        </form>

</body>
</html>

