fetch('fetchClient.php')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector('#client tbody');
    
            data.forEach(row => {
                const newRow = tableBody.insertRow();
                newRow.insertCell().textContent = row.Client_type; 
                newRow.insertCell().innerHTML = '<td><a href="delete_client.php?id=' + row.client_id + '"><i class="bx bx-trash" ></i></a></td>';

            });
        })
    .catch(error => console.error('Error fetching data:', error));