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
            <a href="#customers" style="--i: 1" class="nav-item"><i class='bx bxs-report'></i> Report</a>
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
    
    <!--The Table(excel sheet) of Projects -->
    <table id="customers">
        <thead>
            <tr>
                <th>Employee's Name</th>
                <th>Project</th>
                <th>Activity/Task</th>
                <th>ClientType</th>
                <th>Reference/ID</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Total Hours</th>
                <th>Status</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <button class="primary" onclick="window.dialog.showModal();">Generate Report</button>

    <dialog id="dialog">
            <button id="btnExport" onclick="ExportToExcel('xlsx')">Excel format</button> <br>
            <!--Button for PDF format -->
            <button onclick="Export()">PDF format</button> <br>
            <!--Button for printing -->
            <button onclick="PrintTable()">Print</button> 
            <button onclick="window.dialog.close();" aria-label="close" class="x">❌</button>
    </dialog>

  


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="index.js"></script>
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn2");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
        modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
        modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
        }
        //Print The Table
        function PrintTable() {
            const printWindow = window.open('', '_blank');
            printWindow.document.write('<html><head><title>Printable Table</title></head><body>');
            printWindow.document.write('<style>' + document.querySelector('style').innerHTML + '</style>');
            printWindow.document.write('</head><body>');
            printWindow.document.write(document.getElementById('customers').outerHTML);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        }

        //PDF format
        function Export() {
            html2canvas(document.getElementById('customers'), {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("EmployeesLogs.pdf");
                }
            });
        }


        //Excel Format
        function ExportToExcel(type, fn, dl) {
            let elt = document.getElementById('customers');
            let wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
            return dl ?
                XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
                XLSX.writeFile(wb, fn || ('EmployeeLogs.' + (type || 'xlsx')));
        }
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






