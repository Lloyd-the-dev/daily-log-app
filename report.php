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
    <form id="dateRangeForm" class="container">
        <label for="startDate">Start Date:</label> <br>
        <input type="date" id="startDate" autocomplete="off"><br>
        <label for="endDate">End Date:</label><br>
        <input type="date" id="endDate" autocomplete="off"><br>
        <div class="btn">
            <button type="button" onclick="printTable()">Print Table</button>
            <button id="btnExport" onclick="ExportToExcel('xlsx')">Excel format</button>
            <button onclick="Export()" type="button">PDF format</button>
        </div>
        
    </form>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
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
    </script>
</body>
</html>