<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Report | 2023</title>
    <link rel="stylesheet" href="./css/test.scss">
    <style>
        body{
            font-family: "Poppins", sans-serif;
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
<form id="dateRangeForm" class="container">
        <label for="startDate">Start Date:</label> <br>
        <input type="date" id="startDate" autocomplete="off"><br>
        <label for="endDate">End Date:</label><br>
        <input type="date" id="endDate" autocomplete="off"><br>
        <div class="btn">
            <button type="button" onclick="printTable()">Print Table</button>
            <button onclick="ExportToPDF()" type="button">PDF format</button>
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
        //Print The Table
        function printTable() {
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;
     

            if (!startDate || !endDate) {
                alert('Please select both start and end dates.');
                return;
            }
            const printWindow = window.open('', '_blank');
            printWindow.document.write('<html><head><title>Printable Table</title>');
            printWindow.document.write('<style>' + document.querySelector('style').innerHTML + '</style>');
            printWindow.document.write('</head><body>');
            printWindow.document.write('<h2>Logs for ' + startDate + ' to ' + endDate + '</h2>');
            printWindow.document.write('<table>');
            printWindow.document.write('<tr><th>Date</th><th>Log</th></tr>');

            // Loop through table rows and include only logs within the selected date range
            const tableRows = document.querySelectorAll('#customers tr');
            for (const row of tableRows) {
                const dateCell = row.querySelector('td:nth-child(6)');
                if (dateCell) {
                    const rowDate = dateCell.textContent;
                    if (rowDate >= startDate && rowDate <= endDate) {
                        printWindow.document.write(row.outerHTML);
                    }
                }
            }

            printWindow.document.write('</table>');
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        }

        //PDF format

        function ExportToPDF() {
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;

            if (!startDate || !endDate) {
                alert('Please select both start and end dates.');
                return;
            }

            const table = document.getElementById('customers');
            const tableRows = table.querySelectorAll('tbody tr');

            const filteredRows = Array.from(tableRows).filter(row => {
                const dateCell = row.querySelector('td:nth-child(6)');
                if (dateCell) {
                    const rowDate = dateCell.textContent;
                    return rowDate >= startDate && rowDate <= endDate;
                }
                return false;
            });

            if (filteredRows.length === 0) {
                alert('No logs found within the specified date range.');
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




        //Excel Format            
        function ExportToExcel(type, fn, dl) {
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;

            if (!startDate || !endDate) {
                alert('Please select both start and end dates.');
                return;
            }

            const tableBody = document.querySelector('#customers tbody');
            const tableRows = Array.from(tableBody.querySelectorAll('tr'));

            const filteredRows = tableRows.filter(row => {
                const dateCell = row.querySelector('td:nth-child(6)');
                if (dateCell) {
                    const rowDate = dateCell.textContent;
                    return rowDate >= startDate && rowDate <= endDate;
                }
                return false;
            });

            if (filteredRows.length === 0) {
                alert('No logs found within the specified date range.');
                return;
            }

            const filteredTable = document.createElement('table');
            const tbody = document.createElement('tbody');

            filteredRows.forEach(row => {
                tbody.appendChild(row.cloneNode(true));
            });

            filteredTable.appendChild(tbody);

            const workbook = XLSX.utils.book_new();
            const worksheet = XLSX.utils.table_to_sheet(filteredTable, { sheet: 'sheet1' });

            XLSX.utils.book_append_sheet(workbook, worksheet, 'Logs');

            const excelData = XLSX.write(workbook, { bookType: type, bookSST: true, type: 'binary' });

            const blob = new Blob([s2ab(excelData)], { type: 'application/octet-stream' });

            if (dl) {
                saveAs(blob, fn || 'EmployeeLogs.xlsx');
            }

            return excelData;
        }

        function s2ab(s) {
            const buf = new ArrayBuffer(s.length);
            const view = new Uint8Array(buf);
            for (let i = 0; i < s.length; i++) {
                view[i] = s.charCodeAt(i) & 0xFF;
            }
            return buf;
        }


    </script>
</body>
</html>