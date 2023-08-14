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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="./css/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <!--NavBar -->
    <header class="header">
      <a href="#" class="logo"><span style="color: orangered">Alpha</span>BetaConsulting</a>

      <input type="checkbox" id="check" />
      <label for="check" class="icons">
        <i class="bx bx-menu" id="menu-icon"></i>
        <i class="bx bx-x" id="close-icon"></i>
      </label>

      <nav class="navbar">
        <div class="nav-item">
            <i class='bx bx-home-circle'></i>
            <a href="dashboard.php" style="--i: 0" class="nav-item-title">Home</a>
        </div>
        <div class="nav-item">
            <i class='bx bx-laptop'></i>
            <a href="#projects"  style="--i: 1" class="nav-item-title">Projects</a>
        </div>
        <?php if ($_SESSION["admin"] == 1) { ?>
            <div class="nav-item">
                <i class='bx bxs-report'></i>
                <a href="" style="--i: 4" class="nav-item-title">Report</a>
            </div>
        <?php } ?>

        <div class="nav-item">
            <i class='bx bx-log-out'></i>
            <a href="logout.php" class="nav-item-title" style="--i: 4">Logout</a>
        </div>
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
            <select id="project" name="project" readonly>
                    <option value="0">Select Project:</option>
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
            <textarea id="message" rows="4" class="activity" style="max-width: 360px; max-height: 100px" name="task"></textarea>

            <label for="client" class="client">ClientType</label>
            <select width="500px" id="client" name="client" readonly>
                    <option value="0">Select Client type:</option>
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
            <select id="status" name="status">
                <option value="Pending">Pending</option>
                <option value="Work in Progress">Work in Progress</option>
                <option value="Resolved">Resolved</option>
                <option value="Completed">Completed</option>
            </select>

            <label for="remarks">Remarks:</label>
            <textarea id="remarks" name="remarks" rows="4" style="max-width: 360px; max-height: 100px" name="remarks"></textarea>
            
            <button name="submit">Submit</button>
        </form>
    </section>


    <script src="index.js"></script>
</body>
</html>

<?php
   if(isset($_POST['submit']))
   {
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
   }

  $con = mysqli_connect("localhost","root","oreoluwa2003","daily_logging");

  $sql = "INSERT INTO `project_details` (`project_id`, `project`, `Activity/Task`, `ClientType`, `Reference/ID`, `Date`, `StartTime`, `EndTime`, `TotalHours`, `Status`, `Remarks`) VALUES ('0', '$project', '$activityTask', '$client', '$reference', '$date', '$startTime', '$endTime', '$totalHours', '$status', '$remarks')";

  $rs = mysqli_query($con, $sql);

  if($rs)
  {
    echo '<script type ="text/JavaScript">'; 
    echo 'alert("Activity successfully added!")';
    echo '</script>';  
  }

  mysqli_close($con);
?>


