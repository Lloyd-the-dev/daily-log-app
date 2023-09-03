<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Report | 2023</title>
    <link rel="stylesheet" href="./css/test.scss">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/dashboard.css">
    <style>
        body{
            font-family: "Poppins", sans-serif;
            background-image: url("./images/dark-background.jpg");
            background-size: cover;
        }
        .container {
            margin: 2rem auto;
            background-color: #303030;
            color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
            width: 700px;
        }
        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
        }

        input{
            padding: 10px;
            width: 50%;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s ease-in-out;
        }

        input:focus{
            outline: none;
            border-color: #3498db;
        }
        .btn, button{
            background-color: #3498db;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 15px;
            transition: background-color 0.3s ease-in-out;
        }
        button{
            background-color: #303030;
        }
        .btn:hover {
            background-color: #2980b9;
        }
        #customers {
            margin: 50px auto 0 auto;
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
        .export{
            margin-top: 20px;
            margin-left: 640px;
        }
        .head{
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 60%;
        }
        .head h1{
            text-decoration: underline;
        }
        .home{
            transition: 1s ease-in-out;
        }
        .home:hover{
            color: purple;
        }
        a{
            color: black;
            text-decoration: none;
            text-transform: capitalize;
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
    <!-- <div class="head">
        <a href="./dashboard.php" class="home"><i class='bx bx-arrow-back'></i>Back to home</a>
        <h1>Generate Report</h1>
    </div> -->
    <!-- <form id="dateRangeForm" class="container">
        <label for="startDate">Start Date:</label> <br>
        <input type="date" id="startDate" autocomplete="off"><br>
        <label for="endDate">End Date:</label><br>
        <input type="date" id="endDate" autocomplete="off"><br>
        <select id="projectFilter" name="project" readonly required>
                    <option value="">All</option>
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
        <select id="statusFilter" name="status" required>
                <option value="">All</option>
                <option value="Pending">Pending</option>
                <option value="Work in Progress">Work in Progress</option>
                <option value="Resolved">Resolved</option>
                <option value="Completed">Completed</option>
            </select>
            <input type="text" id="usernameFilter">
            
            <select width="500px" id="clientTypeFilter" name="client" readonly required>
                    <option value="">All</option>
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

        <div class="btn">

            <button type="button" onclick="PrintTable()">Print Table</button>
            <button  onclick="ExportToPDF()" type="button">PDF format</button>
            <button id="btnExport" type="button" onclick="ExportToExcel('xlsx', 'EmployeeLogs.xlsx', true)">Excel format</button>
        </div>
        

    </form> -->
    <header class="header">
     <a href="./dashboard.php" class="logo">Return</a>


      <input type="checkbox" id="check" />
      <label for="check" class="icons">
        <i class="bx bx-menu" id="menu-icon"></i>
        <i class="bx bx-x" id="close-icon"></i>
      </label>

        <nav class="navbar">
                <a href="./filters/date.php" style="--i: 1" class="nav-item">By Date</a>
                <a href="" class="nav-item" style="--i: 2">By Project</a>
                <a href="" class="nav-item" style="--i: 3">By Name</a>
                <a href="" class="nav-item" style="--i: 4">By Status</a>
                <a href="" class="nav-item" style="--i: 5">By Client</a>

        </nav>
    </header>

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
   


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js" integrity="sha512-csNcFYJniKjJxRWRV1R7fvnXrycHP6qDR21mgz1ZP55xY5d+aHLfo9/FcGDQLfn2IfngbAHd8LdfsagcCqgTcQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        fetch('admin.php')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector('#customers tbody');
    
            data.forEach(row => {
                const newRow = tableBody.insertRow();
                newRow.insertCell().textContent = row.user_name;
                newRow.insertCell().textContent = row.project;
                newRow.insertCell().textContent = row.Activity;
                newRow.insertCell().textContent = row.ClientType;
                newRow.insertCell().textContent = row.Reference;
                newRow.insertCell().textContent = row.Date;
                newRow.insertCell().textContent = row.StartTime;
                newRow.insertCell().textContent = row.EndTime;
                newRow.insertCell().textContent = row.TotalHours;
                newRow.insertCell().textContent = row.Status;
                newRow.insertCell().textContent = row.Remarks; 

            });
        })
        .catch(error => console.error('Error fetching data:', error));
        
    

        function PrintTable() {
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;
            const selectedProject = document.getElementById('projectFilter').value;
            const selectedStatus = document.getElementById('statusFilter').value;
            const selectedUsername = document.getElementById('usernameFilter').value;
            const selectedClientType = document.getElementById('clientTypeFilter').value;

            if (!startDate || !endDate) {
                alert('Please select both start and end dates.');
                return;
            }

            const table = document.getElementById('customers');
            const tableRows = table.querySelectorAll('tbody tr');

            const filteredRows = Array.from(tableRows).filter(row => {
                const dateCell = row.querySelector('td:nth-child(6)');
                const projectCell = row.querySelector('td:nth-child(2)');
                const statusCell = row.querySelector('td:nth-child(10)');
                const usernameCell = row.querySelector('td:nth-child(1)');
                const clientTypeCell = row.querySelector('td:nth-child(4)');

                const rowDate = dateCell.textContent;
                const rowProject = projectCell.textContent;
                const rowStatus = statusCell.textContent;
                const rowUsername = usernameCell.textContent;
                const rowClientType = clientTypeCell.textContent;

                const dateInRange = rowDate >= startDate && rowDate <= endDate;
                const projectMatches = selectedProject === 'All' || rowProject === selectedProject;
                const statusMatches = selectedStatus === 'All' || rowStatus === selectedStatus;
                const usernameMatches = !selectedUsername || rowUsername.includes(selectedUsername);
                const clientTypeMatches = selectedClientType === 'All' || rowClientType === selectedClientType;

                return dateInRange && projectMatches && statusMatches && usernameMatches && clientTypeMatches;
            });

            if (filteredRows.length === 0) {
                alert('No logs found within the specified criteria.');
                return;
            }

            const printWindow = window.open('', '_blank');
            const tableToPrint = document.createElement('table');
            const tbody = document.createElement('tbody');

            filteredRows.forEach(row => {
                tbody.appendChild(row.cloneNode(true));
            });

            tableToPrint.appendChild(table.querySelector('thead').cloneNode(true));
            tableToPrint.appendChild(tbody);

            const html = `
                <html>
                <head>
                    <style>
                        table { width: 100%; border-collapse: collapse; }
                        th, td { border: 1px solid black; padding: 5px; }
                    </style>
                </head>
                <body>
                    <h2>Employee Logs from ${startDate} to ${endDate}</h2>
                    ${tableToPrint.outerHTML}
                </body>
                </html>
            `;

            printWindow.document.open();
            printWindow.document.write(html);
            printWindow.document.close();

            setTimeout(function () {
                printWindow.print();
                printWindow.close();
            }, 100);
        }

        function ExportToPDF() {
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;
            const selectedProject = document.getElementById('projectFilter').value;
            const selectedStatus = document.getElementById('statusFilter').value;
            const selectedUsername = document.getElementById('usernameFilter').value;
            const selectedClientType = document.getElementById('clientTypeFilter').value;

            if (!startDate || !endDate) {
                alert('Please select both start and end dates.');
                return;
            }

            const table = document.getElementById('customers');
            const tableRows = Array.from(table.querySelectorAll('tbody tr'));

            const filteredRows = tableRows.filter(row => {
                const dateCell = row.querySelector('td:nth-child(6)');
                const projectCell = row.querySelector('td:nth-child(2)');
                const statusCell = row.querySelector('td:nth-child(10)');
                const usernameCell = row.querySelector('td:nth-child(1)');
                const clientTypeCell = row.querySelector('td:nth-child(4)');

                const rowDate = dateCell.textContent;
                const rowProject = projectCell.textContent;
                const rowStatus = statusCell.textContent;
                const rowUsername = usernameCell.textContent;
                const rowClientType = clientTypeCell.textContent;

                const dateInRange = rowDate >= startDate && rowDate <= endDate;
                const projectMatches = selectedProject === 'All' || rowProject === selectedProject;
                const statusMatches = selectedStatus === 'All' || rowStatus === selectedStatus;
                const usernameMatches = !selectedUsername || rowUsername.includes(selectedUsername);
                const clientTypeMatches = selectedClientType === 'All' || rowClientType === selectedClientType;

                return dateInRange && projectMatches && statusMatches && usernameMatches && clientTypeMatches;
            });

            if (filteredRows.length === 0) {
                alert('No logs found within the specified criteria.');
                return;
            }

            const printWindow = window.open('', '_blank');
            const tableToPrint = document.createElement('table');
            const tbody = document.createElement('tbody');

            filteredRows.forEach(row => {
                tbody.appendChild(row.cloneNode(true));
            });

            tableToPrint.appendChild(table.querySelector('thead').cloneNode(true));
            tableToPrint.appendChild(tbody);

            const html = `
                <html>
                <head>
                    <style>
                        table { width: 100%; border-collapse: collapse; }
                        th, td { border: 1px solid black; padding: 5px; }
                    </style>
                </head>
                <body>
                    <h2>Employee Logs from ${startDate} to ${endDate}</h2>
                    ${tableToPrint.outerHTML}
                </body>
                </html>
            `;

            printWindow.document.open();
            printWindow.document.write(html);
            printWindow.document.close();

            setTimeout(function () {
                printWindow.print();
                printWindow.close();
            }, 100);
        }




        function s2ab(s) {
            const buf = new ArrayBuffer(s.length);
            const view = new Uint8Array(buf);
            for (let i = 0; i < s.length; i++) {
                view[i] = s.charCodeAt(i) & 0xFF;
            }
            return buf;
        }


        //Excel Format            
        function ExportToExcel(type, fn, dl) {
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;
            const selectedProject = document.getElementById('projectFilter').value;
            const selectedStatus = document.getElementById('statusFilter').value;
            const selectedUsername = document.getElementById('usernameFilter').value;
            const selectedClientType = document.getElementById('clientTypeFilter').value;

            if (!startDate || !endDate) {
                alert('Please select both start and end dates.');
                return;
            }

            const table = document.getElementById('customers');
            const tableRows = table.querySelectorAll('tbody tr');

            const filteredRows = Array.from(tableRows).filter(row => {
                const dateCell = row.querySelector('td:nth-child(6)');
                const projectCell = row.querySelector('td:nth-child(2)');
                const statusCell = row.querySelector('td:nth-child(10)');
                const usernameCell = row.querySelector('td:nth-child(1)');
                const clientTypeCell = row.querySelector('td:nth-child(4)');

                const rowDate = dateCell.textContent;
                const rowProject = projectCell.textContent;
                const rowStatus = statusCell.textContent;
                const rowUsername = usernameCell.textContent;
                const rowClientType = clientTypeCell.textContent;

                const dateInRange = rowDate >= startDate && rowDate <= endDate;
                const projectMatches = selectedProject === 'All' || rowProject === selectedProject;
                const statusMatches = selectedStatus === 'All' || rowStatus === selectedStatus;
                const usernameMatches = !selectedUsername || rowUsername.includes(selectedUsername);
                const clientTypeMatches = selectedClientType === 'All' || rowClientType === selectedClientType;

                return dateInRange && projectMatches && statusMatches && usernameMatches && clientTypeMatches;
            });

            if (filteredRows.length === 0) {
                alert('No logs found within the specified criteria.');
                return;
            }

            // Create a new workbook
            const workbook = XLSX.utils.book_new();
            const worksheet = XLSX.utils.json_to_sheet([]);

            // Add data to the worksheet
            const data = [];

            // Loop through filtered rows and extract cell data
            filteredRows.forEach(row => {
                const rowData = Array.from(row.querySelectorAll('td')).map(cell => cell.textContent);
                data.push(rowData);
            });

            XLSX.utils.sheet_add_aoa(worksheet, [['Employee\'s Name', 'Project', 'Activity/Task', 'ClientType', 'Reference/ID', 'Date', 'Start Time', 'End Time', 'Total Hours', 'Status', 'Remarks']]);
            XLSX.utils.sheet_add_aoa(worksheet, data, { origin: 'A2' });

            // Add the worksheet to the workbook
            XLSX.utils.book_append_sheet(workbook, worksheet, 'Logs');

            // Generate Excel data and save/download
            const excelData = XLSX.write(workbook, { bookType: type, bookSST: true, type: 'binary' });

            const blob = new Blob([s2ab(excelData)], { type: 'application/octet-stream' });

            if (dl) {
                saveAs(blob, fn || 'EmployeeLogs.xlsx');
            }

            return excelData;
        }




    </script>
</body>
</html>