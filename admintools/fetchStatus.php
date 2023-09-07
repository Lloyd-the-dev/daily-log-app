<?php
include "../config.php";



$sql = "SELECT `status_id`, `status` FROM status"; 
$result = $conn->query($sql);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>
