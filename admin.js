fetch('admin.php')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector('#customers tbody');
    
            data.forEach(row => {
                const newRow = tableBody.insertRow();

                newRow.insertCell().innerHTML = '<td><a href="edit_row.php?name=' + row.user_name + '&row='+ row.project_id + '"><i class="bx bx-edit-alt" ></i></a></td>';
                
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
                newRow.insertCell().innerHTML = '<td><a href="delete_row.php?name=' + row.user_name + '&row='+ row.project_id + '"><i class="bx bx-trash" ></i></a></td>';

            });
        })
        .catch(error => console.error('Error fetching data:', error));