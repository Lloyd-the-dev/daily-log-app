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
            <input type="time" value="<?php echo $startTime; ?>" name="start-time" id="start-time">

            <label for="end-time">End Time:</label>
            <input type="time" value="<?php echo $endTime; ?>" name="end-time" id="end-time">

            <p>Total Hours Spent: <span id="total-hours-display"><?php echo $totalhours; ?></span> hours</p>
            <input type="hidden" id="total-hours" name="total-hours" value="<?php echo $totalhours; ?>">
            

            <label for="status">Status</label>
            <input type="text" value="<?php echo $status; ?>" name="status">

            <label for="actionTaken">Action Taken: </label>
            <textarea id="actionTaken" name="actionTaken" rows="4" required style="max-width: 360px; max-height: 100px" name="actionTaken"><?php echo $actionTaken; ?></textarea>
            <button name="submit" type="submit">Save</button>
        </form>

        <script>
            const startTimeInput = document.getElementById("start-time");
            const endTimeInput = document.getElementById("end-time");
            const remarksInput = document.getElementById("remarks");

            // Get reference to the total hours span element
            const totalHoursSpan = document.getElementById("total-hours");

            // Add event listeners to the input elements
            startTimeInput.addEventListener("input", calculateTotalHours);
            endTimeInput.addEventListener("input", calculateTotalHours);

            function calculateTotalHours() {
                const startTime = new Date(`2000-01-01T${startTimeInput.value}:00`);
                const endTime = new Date(`2000-01-01T${endTimeInput.value}:00`);

            

            
                if (!isNaN(startTime) && !isNaN(endTime)) {
                    let timeDiff = endTime - startTime;
                    if (timeDiff < 0) {
                        timeDiff += 24 * 60 * 60 * 1000; // Add 24 hours if end time is before start time
                    }

                    const totalHours = Math.floor(timeDiff / (60 * 60 * 1000));
                    const totalMinutes = Math.floor((timeDiff % (60 * 60 * 1000)) / (60 * 1000));

                    const totalHoursInput = document.getElementById("total-hours");
                    const totalHoursDisplay = document.getElementById("total-hours-display");

                    totalHoursDisplay.textContent = `${totalHours.toString().padStart(2, "0")}:${totalMinutes.toString().padStart(2, "0")}`;
                    totalHoursInput.value = `${totalHours.toString().padStart(2, "0")}:${totalMinutes.toString().padStart(2, "0")}`;

                } else {
                    totalHoursSpan.textContent = "00:00";
                }
            }
        </script>
</body>
</html>

