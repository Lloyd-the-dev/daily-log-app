<?php
        session_start();
        if (!isset($_SESSION["user_id"])) {
            header("Location: login.html");
            exit();
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
            background: url(https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/844a2e12-df15-4697-b172-3e05db4d3413) no-repeat;
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
        
        @media print{
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
            <a href="adminDashboard.html" style="--i: 0" class="nav-item"><i class='bx bxs-edit-alt'></i> Logs</a>
        <?php } else{ ?>
            <a href="#projects"  style="--i: 0" class="nav-item"><i class='bx bx-laptop'></i> Projects</a>
        <?php } ?>
            <a href="report.php" style="--i: 1" class="nav-item"><i class='bx bxs-report'></i> Report</a>
            <a href="user_profile.php" class="nav-item" style="--i: 2"><i class='bx bx-user-circle'></i> Profile</a>
            <a href="logout.php" class="nav-item" style="--i: 3"><i class='bx bx-log-out'></i> Logout</a>
      </nav>
    </header>
    <h1 class="welcome-message">Welcome, <?php echo $_SESSION["name"]; ?>
     <?php 
            $message = ($_SESSION["admin"] == 1) ? "(admin)" : "";
            echo $message; 
        ?></h1>

 
    <section id="projects">
        <form action="dashboard.php" class="container" method="POST">
            <h2 class="project-heading">What Project Did you work on Today?</h2>

            <label for="project">Projects</label>
            <select id="project" name="project" readonly required>
                    <option value="Ibile-Hub">Ibile-Hub</option>
                    <option value="RevBill">RevBill</option>
                    <option value="LASEPA">LASEPA</option>
                    <option value="HMS">HMS</option>
                    <option value="Telemedicine-HMS">Telemedicine-HMS</option>
                    <option value="Smaptaal">Smaptaal</option>
                    <option value="RevPay">RevPay</option>
                    <option value="Business-License">Business-License</option>
                    <option value="Bank-Assessment">Bank-Assessment</option>
                    <option value="TechPay-Web">TechPay-Web</option>
                    <option value="HR">HR</option>
                    <option value="LRP">LRP</option>
                    <option value="LRP-Admin">LRP-Admin</option>
                    <option value="TechPay-Mobile">TechPay-Mobile</option>
                    <option value="E-Settlement">E-Settlement</option>
                    <option value="LSSB">LSSB</option>
                    <option value="LASPA">LASPA</option>
                    <option value="LASEMA">LASEMA</option>
            </select>

            <label for="message">Activity/Task</label>
            <textarea id="message" rows="4" class="activity" style="max-width: 360px; max-height: 100px" name="task" required></textarea>

            <label for="client" class="client">ClientType</label>
            <select width="500px" id="client" name="client" readonly required>
                    <option value="Login-Access">Login-Access</option>
                    <option value="LSJ">LSJ</option>
                    <option value="RevBill">RevBill</option>
                    <option value="LASEPA">LASEPA</option>
                    <option value="ACDS">ACDS</option>
                    <option value="3rd-Party">3rd-Party</option>
                    <option value="LIRS">LIRS</option>
                    <option value="Other-Agency">Other-Agency</option>
                    <option value="Bank">Bank</option>
                    <option value="ABC-Helpdesk">ABC-Helpdesk</option>
                    <option value="IBILE">IBILE</option>
                    <option value="CBS">CBS</option>
                    <option value="Tax-Payer">Tax-Payer</option>
                    <option value="ABC-Others">ABC-Others</option>
            </select>

            <label for="reference">Reference/ID:</label>
            <input type="text" id="reference" required name="reference">

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>

            <label for="start-time">Start Time:</label>
            <input type="time" id="start-time" name="start-time" required>

            <label for="end-time">End Time:</label>
            <input type="time" id="end-time" name="end-time" required>

            <p>Total Hours Spent: <span id="total-hours-display">0</span> hours</p>
            <input type="hidden" id="total-hours" name="total-hours" value="0">

            <label for="status">Status</label>
            <select id="status" name="status" required>
                <option value="Pending">Pending</option>
                <option value="Work in Progress">Work in Progress</option>
                <option value="Resolved">Resolved</option>
                <option value="Completed">Completed</option>
            </select>

            <label for="remarks">Remarks:</label>
            <textarea id="remarks" name="remarks" rows="4" required style="max-width: 360px; max-height: 100px" name="remarks"></textarea>
            
            <button name="submit" type="submit">Submit</button>
        </form>
    </section>
    
    
   

  

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
    </script>

</body>
</html>

<?php
    if(!empty($_POST["task"])){
       $project = $_POST["project"];
       $activityTask = $_POST["task"];
       $client = $_POST["client"];
       $reference = $_POST["reference"];
       $date = $_POST["date"];
       $startTime = $_POST["start-time"];
       $endTime = $_POST["end-time"];
       $totalHours = $_POST["total-hours"];
       $status = $_POST["status"];
       $remarks = $_POST["remarks"];
       $userName = $_SESSION["name"];
 

        $con = mysqli_connect("localhost","root","oreoluwa2003","daily_logging");

        $sql = "INSERT INTO `project_details` (`project_id`, `project`, `Activity`, `ClientType`, `Reference`, `Date`, `StartTime`, `EndTime`, `TotalHours`, `Status`, `Remarks`, `user_name`) VALUES ('0', '$project', '$activityTask', '$client', '$reference', '$date', '$startTime', '$endTime', '$totalHours', '$status', '$remarks', '$userName')";

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






