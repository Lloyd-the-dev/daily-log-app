const modal = document.getElementById('yourModalId');

// Event delegation for edit icons
document.querySelector('#customers tbody').addEventListener('click', function(event) {
    if (event.target.classList.contains('bx-edit-alt')) {
        event.preventDefault();
        // Open the modal here
        modal.style.display = 'block';
        
        // Populate the modal with data from the clicked row (you can use data attributes or other methods)
        const row = event.target.closest('tr'); // Find the closest row
        const rowData = {
            // Extract data from the row, e.g., row.cells[index].textContent
        };

        // Populate your modal form fields with the rowData
    }
});
const closeButton = document.querySelector('.close-button');
closeButton.addEventListener('click', function() {
    modal.style.display = 'none';
});
fetch('admin.php')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector('#customers tbody');
    
            data.forEach(row => {
                const newRow = tableBody.insertRow();

                newRow.insertCell().innerHTML = '<td><a href="adminDashboard.php?name=' + row.user_name + '&row='+ row.project_id + '"><i class="bx bx-edit-alt" ></i></a></td>';
                const nameCell = newRow.insertCell();
                const nameLink = document.createElement('a');
                nameLink.textContent = row.user_name;
                nameLink.href = `employee_profile.php?name= ${row.user_name}`; // Pass employee ID as query parameter
                nameCell.appendChild(nameLink);

                // edit icon <i class='bx bx-edit-alt'></i>

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