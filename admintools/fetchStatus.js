fetch('fetchStatus.php')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector('#client tbody');
    
            data.forEach(row => {
                const newRow = tableBody.insertRow();
                newRow.insertCell().textContent = row.status;
                newRow.insertCell().innerHTML = '<td><a href="delete_status.php?id=' + row.status_id + '"><i class="bx bx-trash" ></i></a></td>';

            });
        })
    .catch(error => console.error('Error fetching data:', error));