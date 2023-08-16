fetch('admin.php')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector('#customers tbody');
    
            data.forEach(row => {
                const newRow = tableBody.insertRow();

                const nameCell = newRow.insertCell();
                const nameLink = document.createElement('a');
                nameLink.textContent = row.user_name;
                nameLink.href = `employee_profile.php?name= ${row.user_name}`; // Pass employee ID as query parameter
                nameCell.appendChild(nameLink);
                
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
                newRow.insertCell().innerHTML = '<td><a href="delete_row.php?name=' + row.user_name + '"><i class="bx bx-trash" ></i></a></td>';

            });
        })
        .catch(error => console.error('Error fetching data:', error));