<?php
    include "config.php";

    if (isset($_GET['name']) && isset($_POST['project'])) {
        $employeeName = trim($_GET['name']);
        $project = $_POST['project'];
        $sql = "SELECT * FROM user_details WHERE Firstname ='$employeeName'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
?>
            <!DOCTYPE html>
            <html>
            <head>
                <title>Email Link</title>
                <style>
                    body{
                        text-align: center;
                        padding: 4rem;
                    }
                    .link-btn{
                        text-decoration: none;
                        padding: 0.5rem;
                        border-radius: 5px;
                        background-color: dodgerblue;
                        color: #fff;
                        transition: 1s ease-in-out;
                    }
                    .link-btn:hover{
                        background-color: #0096FF;
                    }
                </style>
            </head>
            <body style="font-family: 'Poppins', sans-serif;">
                <!-- The anchor tag with mailto link -->
                <h1>Email for Project assignment sent</h1>
                <h3>You can resend it below</h3>
                <a class="link-btn" href="mailto:<?php echo $row['Email'] ?>?subject=Project%20Assignment&body=You%20have%20been%20assigned%20to%20the%20project:%20<?php echo $project ?>">Send Email</a>
                
                <!-- JavaScript to automatically click the link -->
                <script>
                    // Automatically click the link once the page loads
                    window.onload = function() {
                        document.querySelector('a').click();
                    };
                </script>
            </body>
            </html>
<?php
        } else {
            echo "Employee not found.";
        }
    } else {
        echo "Invalid request.";
    }
?>
