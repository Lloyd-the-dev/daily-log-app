<?php
include "../config.php";



$sql = "SELECT `client_id`, `Client_type` FROM clients"; 
$result = $conn->query($sql);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>
