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
    <title>Admin Dashboard</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body{
            display: flex;
            flex-direction: column;
            align-items: center;
            font-family: Arial, Helvetica, sans-serif;;
        }
        h1{
            font-weight: bolder;
            width: 60%;
        }
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 90%;
            color: black;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }
 
        #customers tr{
            background-color: white;
        }
        .open-item{
            background-color: orangered;
        }
        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: dodgerblue;
            color: white;
        }
        a{
            color: black;
            text-decoration: none;
            text-transform: capitalize;

        }
        #customers i{
            color: red;
            cursor: pointer;
        }
        .head{
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 90%;
        }
        .home{
            transition: 1s ease-in-out;
        }
        .home:hover{
            color: purple;
        }
        .modal{
            display: none;
        }
    </style>
</head>
<body>
    <div class="head">
        <a href="./dashboard.php" class="home"><i class='bx bx-arrow-back'></i>Back to home</a>
        <h1>Worker Logsheet</h1>
    </div>
    <table id="customers">
        <thead>
            <tr>
                <th>Edit</th>
                <th>Employee's Name</th>
                <th>Project</th>
                <th>Activity/Task</th>
                <th>ClientType</th>
                <th>ClientName</th>
                <th>Reference/ID</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Total Hours</th>
                <th>Status</th>
                <th>ActionTaken</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
    <div id="yourModalId" class="modal">
        <div class="modal-content">
            <form action="">
                <input type="text" value="<?php echo $project; ?>">
                <input type="text" value="<?php echo $activity; ?>">
                <input type="text" value="<?php echo $clientType; ?>">
                <input type="text" value="<?php echo $clientName; ?>">
                <input type="text" value="<?php echo $reference; ?>">
                <input type="date" value="<?php echo $date; ?>">
                <input type="time" value="<?php echo $startTime; ?>">
                <input type="time" value="<?php echo $endTime; ?>">
                <input type="text" value="<?php echo $totalhours; ?>">
                <input type="text" value="<?php echo $status; ?>">
                <input type="text" value="<?php echo $actionTaken; ?>">
                <button class="close-button">close</button>
            </form>
        </div>
    </div>
    
    
    <script src="admin.js"></script>
</body>
</html>