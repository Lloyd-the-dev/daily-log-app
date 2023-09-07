fetch('fetchProject.php')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector('#client tbody');
    
            data.forEach(row => {
                const newRow = tableBody.insertRow();
                newRow.insertCell().textContent = row.project_name;
                newRow.insertCell().innerHTML = '<td><a href="delete_project.php?id=' + row.project_id + '"><i class="bx bx-trash" ></i></a></td>';

            });
        })
    .catch(error => console.error('Error fetching data:', error));