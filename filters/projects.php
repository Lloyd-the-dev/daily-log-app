<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Report | 2023</title>
    <!-- <link rel="stylesheet" href="./css/test.scss"> -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/dashboard.css">
    <style>
        body{
            font-family: "Poppins", sans-serif;
            background-image: url("../images/dark-background.jpg");
            background-size: cover;
        }
        .container {
            margin: 3rem auto;
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
        /* .btn:hover {
            background-color: #2980b9;
        } */
        #customers {
            margin: 50px auto 0 auto;
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 80%;
            color: black;
        }

        .generate{
            margin: 5rem;
            text-align: center;
            color: #fff;
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
        .active{
            color: orangered;
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
    <header class="header">
     <a href="../report.php" class="logo">Return</a>


      <input type="checkbox" id="check" />
      <label for="check" class="icons">
        <i class="bx bx-menu" id="menu-icon"></i>
        <i class="bx bx-x" id="close-icon"></i>
      </label>

        <nav class="navbar">
                <a href="date.php" style="--i: 1" class="nav-item">By Date</a>
                <a href="projects.php" class="nav-item active" style="--i: 2">By Project</a>
                <a href="name.php" class="nav-item" style="--i: 3">By Name</a>
                <a href="status.php" class="nav-item" style="--i: 4">By Status</a>
                <a href="client.php" class="nav-item" style="--i: 5">By Client</a>

        </nav>
    </header>
    <h1 class="generate">Generate reports based on Projects</h1>
    <form id="dateRangeForm" class="container">
        <label for="startDate">Start Date:</label> <br>
        <input type="date" id="startDate" autocomplete="off"><br>
        <label for="endDate">End Date:</label><br>
        <input type="date" id="endDate" autocomplete="off"><br>
        <select id="projectFilter" name="project" readonly required>
            <option value="All">All</option>
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

        <div class="btn">

            <button type="button" onclick="PrintTable()">Print Table</button>
            <button  onclick="ExportToPDF()" type="button">PDF format</button>
            <button id="btnExport" type="button" onclick="ExportToExcel('xlsx', 'EmployeeLogs.xlsx', true)">Excel format</button>
        </div>
        

    </form> 
   

    <table id="customers">
        <thead>
            <tr>
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
            </tr>
        </thead>
        <tbody></tbody>
    </table>
   


    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>

    <script>
        fetch('../admin.php')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector('#customers tbody');
    
            data.forEach(row => {
                const newRow = tableBody.insertRow();
                newRow.insertCell().textContent = row.user_name;
                newRow.insertCell().textContent = row.project;
                newRow.insertCell().textContent = row.Activity;
                newRow.insertCell().textContent = row.ClientType;
                newRow.insertCell().textContent = row.ClientName;
                newRow.insertCell().textContent = row.Reference;
                newRow.insertCell().textContent = row.Date;
                newRow.insertCell().textContent = row.StartTime;
                newRow.insertCell().textContent = row.EndTime;
                newRow.insertCell().textContent = row.TotalHours;
                newRow.insertCell().textContent = row.Status;
                newRow.insertCell().textContent = row.ActionTaken; 

            });
        })
        .catch(error => console.error('Error fetching data:', error));
        
    

        function PrintTable() {
            const selectedProject = document.getElementById('projectFilter').value;
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;

            if (!startDate || !endDate) {
                alert('Please select both start and end dates.');
                return;
            }

            const table = document.getElementById('customers');
            const tableRows = table.querySelectorAll('tbody tr');

            const filteredRows = Array.from(tableRows).filter(row => {
                const projectCell = row.querySelector('td:nth-child(2)');
                const rowProject = projectCell.textContent;
                const dateCell = row.querySelector('td:nth-child(6)');
                const rowDate = dateCell.textContent;
                const projectMatches = selectedProject === 'All' || rowProject === selectedProject;
                return projectMatches && rowDate >= startDate && rowDate <= endDate;
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
                    <h2>Employee Logs for ${selectedProject} Project</h2>
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
            const selectedProject = document.getElementById('projectFilter').value;
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;

            if (!startDate || !endDate) {
                alert('Please select both start and end dates.');
                return;
            }

            const table = document.getElementById('customers');
            const tableRows = Array.from(table.querySelectorAll('tbody tr'));

            const filteredRows = tableRows.filter(row => {
                const projectCell = row.querySelector('td:nth-child(2)');
                const rowProject = projectCell.textContent;
                const dateCell = row.querySelector('td:nth-child(6)');
                const rowDate = dateCell.textContent;
                const projectMatches = selectedProject === 'All' || rowProject === selectedProject;
                return projectMatches && rowDate >= startDate && rowDate <= endDate;
            });

            if (filteredRows.length === 0) {
                alert('No logs found within the specified date range.');
                return;
            }

            const tableBodyContent = filteredRows.map(row => {
                const columns = row.querySelectorAll('td');
                return [
                    columns[5].textContent, // Date
                    columns[0].textContent, // Employee's Name
                    columns[1].textContent, // Project
                    columns[2].textContent, // Activity/Task
                    columns[3].textContent, // ClientType
                    columns[4].textContent, // Reference/ID
                    columns[6].textContent, // Start Time
                    columns[7].textContent, // End Time
                    columns[8].textContent, // Total Hours
                    columns[9].textContent, // Status
                    columns[10].textContent,
                    columns[11].textContent // Remarks
                ];
            });

            const docDefinition = {
                content: [
                    {
                        text: `Employee Logs for ${selectedProject} Project`,
                        alignment: 'center',
                        fontSize: 18,
                        margin: [0, 0, 0, 10] // top, right, bottom, left
                    },
                    {
                        table: {
                            headerRows: 1,
                            widths: [50, 40, 40, 70, 30, 30, 60, 20, 20, 20, 30, 60],
                            body: [
                                ['Date', "Employee's Name", 'Project', 'Activity/Task', 'ClientType', 'ClientName', 'Reference/ID', 'Start Time', 'End Time', 'Total Hours', 'Status', 'ActionTaken'], // Table header
                                ...tableBodyContent
                            ]
                        }
                    }
                ],
                defaultStyle: {
                    fontSize: 10
                }
            };

            pdfMake.createPdf(docDefinition).download("EmployeesLogs.pdf");
        }





 
    function s2ab(s) {
        const buf = new ArrayBuffer(s.length);
        const view = new Uint8Array(buf);
        for (let i = 0; i < s.length; i++) {
            view[i] = s.charCodeAt(i) & 0xFF;
        }
        return buf;
    }


    function ExportToExcel(type, fn, dl) {
        const selectedProject = document.getElementById('projectFilter').value;
        const startDate = document.getElementById('startDate').value;
        const endDate = document.getElementById('endDate').value;

        if (!startDate || !endDate) {
            alert('Please select both start and end dates.');
            return;
        }

       
        const table = document.getElementById('customers');
        const tableRows = table.querySelectorAll('tbody tr');

        const filteredRows = Array.from(tableRows).filter(row => {
            const projectCell = row.querySelector('td:nth-child(2)');
            const rowProject = projectCell.textContent;
            const dateCell = row.querySelector('td:nth-child(6)');
            const rowDate = dateCell.textContent;
            const projectMatches = selectedProject === 'All' || rowProject === selectedProject;
            return projectMatches && rowDate >= startDate && rowDate <= endDate;
        });

        if (filteredRows.length === 0) {
            alert('No logs found within the specified date range.');
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

        XLSX.utils.sheet_add_aoa(worksheet, [['Employee\'s Name', 'Project', 'Activity/Task', 'ClientType', 'ClientName', 'Reference/ID', 'Date', 'Start Time', 'End Time', 'Total Hours', 'Status', 'ActionTaken']]);
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