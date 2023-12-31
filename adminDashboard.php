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
    
    
    <script src="admin.js"></script>
</body>
</html>