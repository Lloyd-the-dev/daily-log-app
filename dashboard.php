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
        <div class="nav-item">
            <i class='bx bxs-report'></i>
            <a href="" style="--i: 4" class="nav-item-title">Report</a>
        </div>
        <div class="nav-item">
            <i class='bx bx-log-out'></i>
            <a href="logout.php" class="nav-item-title" style="--i: 4">Logout</a>
        </div>
      </nav>
    </header>
    <h1 class="welcome-message">Welcome, <?php echo $_SESSION["name"]; ?></h1>

    <section id="projects">
        <h1 class="project-heading">What Project(s) Did you work on Today?</h1>
        <form action="" class="pro-form">
            <label for="">Projects</label>
            <div class="project-dropdown">
                <select>
                    <option value="0">Select Project:</option>
                    <option value="1">Ibile-Hub</option>
                    <option value="2">RevBill</option>
                    <option value="3">LASEPA</option>
                    <option value="4">HMS</option>
                    <option value="5">Telemedicine-HMS</option>
                    <option value="6">Smaptaal</option>
                    <option value="7">RevPay</option>
                    <option value="8">Business-License</option>
                    <option value="9">Bank-Assessment</option>
                    <option value="10">TechPay-Web</option>
                    <option value="11">HR</option>
                    <option value="12">LRP</option>
                    <option value="13">LRP-Admin</option>
                    <option value="14">TechPay-Mobile</option>
                    <option value="15">E-Settlement</option>
                    <option value="16">LSSB</option>
                    <option value="17">LASPA</option>
                    <option value="18">LASEMA</option>
                </select>
            </div>

            <label for="">Activity/Task</label>
            <textarea name="" id="" cols="30" rows="10" class="activity"></textarea>

            <label for="" class="client">ClientType</label>
            <div class="project-dropdown">
                <select width="500px">
                    <option value="0">Select Client type:</option>
                    <option value="1">Login-Access</option>
                    <option value="2">LSJ</option>
                    <option value="3">RevBill</option>
                    <option value="4">LASEPA</option>
                    <option value="5">ACDS</option>
                    <option value="6">3rd-Party</option>
                    <option value="7">LIRS</option>
                    <option value="8">Other-Agency</option>
                    <option value="9">Bank</option>
                    <option value="10">ABC-Helpdesk</option>
                    <option value="11">IBILE</option>
                    <option value="12">CBS</option>
                    <option value="13">Tax-Payer</option>
                    <option value="14">ABC-Others</option>
                </select>
            </div>

            <label for="">Reference/ID</label>
            <input type="text">

            <input type="date">
            <!-- time area -->
            <div class="time">
                <div class="time-item">
                    <label for="">Start Time</label>
                    <input type="time">
                </div>
                <div class="time-item">
                    <label for="">End TIme</label>
                    <input type="time">
                </div>
            </div> <!--end of time area -->
            <p id="totalHours"></p>

            <label for="">Status</label>
            <select>
                <option value="1">Pending</option>
                <option value="1">Work in Progress</option>
                <option value="1">Resolved</option>
                <option value="1">Completed</option>
            </select>

            <label for="">Remarks</label>
            <input type="text">
        </form>
       
    </section>
    <script src="index.js"></script>
</body>
</html>
