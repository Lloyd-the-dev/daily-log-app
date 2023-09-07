fetch('fetchUsers.php')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector('#client tbody');
    
            data.forEach(row => {
                const newRow = tableBody.insertRow();
                newRow.insertCell().textContent = row.Firstname
                newRow.insertCell().textContent = row.Lastname; 
                newRow.insertCell().textContent = row.Email; 
                newRow.insertCell().textContent = row.Password; 
                newRow.insertCell().textContent = row.Phonenumber; 
                newRow.insertCell().textContent = row.Address; 
                newRow.insertCell().innerHTML = '<td><a href="delete_user.php?id=' + row.user_id + '"><i class="bx bx-trash" ></i></a></td>';

            });
        })
    .catch(error => console.error('Error fetching data:', error));