<?php
        include "config.php";
        session_start();
        if (!isset($_SESSION["user_id"])) {
            header("Location: login.html");
            exit();
        }
        $employeeId = $_SESSION["user_id"];
        $sql = "SELECT * FROM user_details WHERE user_id = '$employeeId'";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $name = $row['Firstname'];
            
        }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="./css/dashboard.css">
    <link rel="stylesheet" href="./css/test.scss">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    
    <style id="table_style" type="text/css">
        body {
            min-height: 100vh;
            background: url(https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/844a2e12-df15-4697-b172-3e05db4d3413), url("./images/dark-background.jpg") no-repeat;
            background-size: cover;
            background-position: center;
            color: #fff;
        }

        #customers {
            margin: 200px auto 0 auto;
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 80%;
            color: black;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }
 
        #customers tr{
            background-color: white;
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
        #customers a{
            color: black;
            text-decoration: none;
            text-transform: capitalize;

        }
        #customers i{
            color: red;
            cursor: pointer;
        }
        #myBtn{
            display: none;
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            font-size: 20px;
            border: none;
            outline: none;
            background-color: dodgerblue;
            color: white;
            cursor: pointer;
            padding: .5rem;
            border-radius: 4px;
            transition: 1s ease-in-out;
        }
        #myBtn:hover {
            background-color: #555;
        }
        #icon{
            font-size: 30px;
        }
        .export{
            margin-top: 20px;
            margin-left: 640px;
        }
        .navbar{
            display: flex;
            align-items: center;
        }
        @media (max-width: 678px) {
            .navbar{
                flex-direction: column;
            }
        }
        /* Navbar Dropdown */
        .dropdown {
        float: left;
        overflow: hidden;
        }

        .dropdown .dropbtn {
        font-size: 17px;    
        border: none;
        outline: none;
        color: white;
        padding: 14px 16px;
        background-color: inherit;
        font-family: inherit;
        margin: 0;
        }

        .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        }

        .dropdown-content a {
        float: none;
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
        }

        .dropdown:hover .dropbtn {
        background-color: #555;
        color: white;
        }

        .dropdown-content a:hover {
        background-color: #ddd;
        color: black;
        }

        .dropdown:hover .dropdown-content {
        display: block;
        }
        .modal{
                display: none;
        }
    </style>
   
</head>
<body>
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class='bx bx-up-arrow' id="icon"></i></button>
    <!--NavBar -->
    <header class="header">
      <a href="#" class="logo"><span style="color: orangered">Alpha</span>BetaConsulting</a>

      <input type="checkbox" id="check" />
      <label for="check" class="icons">
        <i class="bx bx-menu" id="menu-icon"></i>
        <i class="bx bx-x" id="close-icon"></i>
      </label>



      <nav class="navbar">
        <?php if ($_SESSION["admin"] == 1) { ?>
            <div class="dropdown" style="--i: 0">
                <button class="dropbtn">Admin tools</button>
                <div class="dropdown-content">
                    <a href="adminDashboard.php">Logs</a>
                    <a href="./admintools/client.php">Clients</a>
                    <a href="./admintools/project.php">Projects</a>
                    <a href="./admintools/users.php">Employees</a>
                    <a href="./admintools/status.php">Status</a>
                </div>
            </div> 
            <!-- <a href=""  class="nav-item"><i class='bx bxs-edit-alt'></i> Admin Functions</a> -->
        <?php } else if($_SESSION["passiveAdmin"] != 1){ ?>
            <a href="#projects"  style="--i: 0" class="nav-item"><i class='bx bx-laptop'></i> Projects</a>
        <?php } ?>
            <a href="report.php" style="--i: 1" class="nav-item"><i class='bx bxs-report'></i> Report</a>
            <a href="user_profile.php" class="nav-item" style="--i: 2"><i class='bx bx-user-circle'></i> Profile</a>
            <a href="logout.php" class="nav-item" style="--i: 3"><i class='bx bx-log-out'></i> Logout</a>
      </nav>
    </header>
    <h1 class="welcome-message">Welcome, <?php echo $name; ?>
     <?php 
            $message = ($_SESSION["admin"] == 1) ? "(admin)" : "";
            echo $message; 
        ?></h1>

 
    <?php 
        if($_SESSION["passiveAdmin"] != 1){
    ?>
        <section id="projects">
            <form action="dashboard.php" class="container" method="POST" onsubmit="openModal()">
                <h2 class="project-heading">What Project Did you work on Today?</h2>

                <label for="project">Projects</label>
                <select id="project" name="project" readonly required>
                </select>

                <label for="message">Activity/Task</label>
                <textarea id="message" rows="4" class="activity" style="max-width: 360px; max-height: 100px" name="task"></textarea>

                <label for="client" class="client">ClientType</label>
                <select width="500px" id="client" name="client" readonly required>
                        
                </select>

                <label for="clientName">Client Name</label>
                <input type="text" id="clientName" name="clientName">

                <label for="reference">Reference/ID:</label>
                <input type="text" id="reference" name="reference">

                <label for="date">Date:</label>
                <input type="date" id="date" name="date">

                <label for="start-time">Start Time:</label>
                <input type="time" id="start-time" name="start-time">

                <label for="end-time">End Time:</label>
                <input type="time" id="end-time" name="end-time">

                <p>Total Hours Spent: <span id="total-hours-display">0</span> hours</p>
                <input type="hidden" id="total-hours" name="total-hours" value="0">

                <label for="status">Status</label>
                <select id="status" name="status">
                </select>

                <label for="actionTaken">Action Taken: </label>
                <textarea id="actionTaken" name="actionTaken" rows="4" style="max-width: 360px; max-height: 100px" name="actionTaken"></textarea>

                <button onclick="window.dialog.showModal();" type="button">Submit</button>
                <dialog id="dialog">
                    <h2>Are you sure you want to submit?</h2>
                    <p style="color: red">this action can't be reversed</p>
                    <button onclick="window.dialog.close();" aria-label="close" class="cancel-btn" type="button">Return</button>
                    <button name="submit" type="submit">Submit</button>
                </dialog>
            </form>
        </section>
       <?php } ?>
   

  

    <script src="index.js"></script>
    <script>
    
       
        // Get the button
        let mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
        }

        //Populate the Projects Dropdown
        const projectDropdown = document.getElementById('project');

        // Make an AJAX request to fetch projects names
        fetch('./admintools/fetchProject.php')
            .then(response => response.json())
            .then(data => {
                // Clear existing options
                projectDropdown.innerHTML = '';
                
                // Populate dropdown with fetched projects names
                data.forEach(projectName => {
                    const option = document.createElement('option');
                    option.value = projectName.project_name;
                    option.textContent = projectName.project_name;
                    projectDropdown.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching Project names:', error));
        
        //Populate the Client Dropdown
        const clientDropdown = document.getElementById('client');

        // Make an AJAX request to fetch client names
        fetch('./admintools/fetchClient.php')
            .then(response => response.json())
            .then(data => {
                // Clear existing options
                clientDropdown.innerHTML = '';
                
                // Populate dropdown with fetched client names
                data.forEach(clientName => {
                    const option = document.createElement('option');
                    option.value = clientName.Client_type;
                    option.textContent = clientName.Client_type;
                    clientDropdown.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching client names:', error));

        //Populate the Status Dropdown
        const statusDropdown = document.getElementById('status');

        // Make an AJAX request to fetch client names
        fetch('./admintools/fetchStatus.php')
            .then(response => response.json())
            .then(data => {
                // Clear existing options
                statusDropdown.innerHTML = '';
                
                // Populate dropdown with fetched client names
                data.forEach(status => {
                    const option = document.createElement('option');
                    option.value = status.status;
                    option.textContent = status.status;
                    statusDropdown.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching Status:', error));
    </script>

</body>
</html>

<?php
    if(!empty($_POST["task"])){
       $project = $_POST["project"];
       $activityTask = $_POST["task"];
       $client = $_POST["client"];
       $clientName = $_POST["clientName"];
       $reference = $_POST["reference"];
       $date = $_POST["date"];
       $startTime = $_POST["start-time"];
       $endTime = $_POST["end-time"];
       $totalHours = $_POST["total-hours"];
       $status = $_POST["status"];
       $actionTaken = $_POST["actionTaken"];
       $userName =  $name;
 

        $con = mysqli_connect("localhost","root","oreoluwa2003","daily_logging");

        $sql = "INSERT INTO `project_details` (`project_id`, `project`, `Activity`, `ClientType`,`ClientName`, `Reference`, `Date`, `StartTime`, `EndTime`, `TotalHours`, `Status`, `ActionTaken`, `user_name`) VALUES ('0', '$project', '$activityTask', '$client', '$clientName', '$reference', '$date', '$startTime', '$endTime', '$totalHours', '$status', '$actionTaken', '$userName')";

        $rs = mysqli_query($con, $sql);

        if($rs)
        {
            echo '<script type ="text/JavaScript">'; 
            echo 'alert("Activity successfully added!")';
            echo '</script>';  
        }

        mysqli_close($con);
}
   
?>






