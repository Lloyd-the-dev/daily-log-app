<?php
include "../config.php";



$sql = "SELECT `project_id`, `project_name` FROM projects"; 
$result = $conn->query($sql);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>
