

// Get references to the start time, end time, and remarks input elements
// Get references to the start time, end time, and remarks input elements
const startTimeInput = document.getElementById("start-time");
const endTimeInput = document.getElementById("end-time");
const remarksInput = document.getElementById("remarks");

// Get reference to the total hours span element
const totalHoursSpan = document.getElementById("total-hours");

// Add event listeners to the input elements
startTimeInput.addEventListener("input", calculateTotalHours);
endTimeInput.addEventListener("input", calculateTotalHours);

function calculateTotalHours() {
    const startTime = new Date(`2000-01-01T${startTimeInput.value}:00`);
    const endTime = new Date(`2000-01-01T${endTimeInput.value}:00`);

   

 
    if (!isNaN(startTime) && !isNaN(endTime)) {
        let timeDiff = endTime - startTime;
        if (timeDiff < 0) {
            timeDiff += 24 * 60 * 60 * 1000; // Add 24 hours if end time is before start time
        }

        const totalHours = Math.floor(timeDiff / (60 * 60 * 1000));
        const totalMinutes = Math.floor((timeDiff % (60 * 60 * 1000)) / (60 * 1000));

        const totalHoursInput = document.getElementById("total-hours");
        const totalHoursDisplay = document.getElementById("total-hours-display");

        totalHoursDisplay.textContent = `${totalHours.toString().padStart(2, "0")}:${totalMinutes.toString().padStart(2, "0")}`;
        totalHoursInput.value = `${totalHours.toString().padStart(2, "0")}:${totalMinutes.toString().padStart(2, "0")}`;

    } else {
        totalHoursSpan.textContent = "00:00";
    }
}

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