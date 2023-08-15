<?php
include "config.php";



$sql = "SELECT `project_id`, `project`, `Activity`, `ClientType`, `Reference`, `Date`, `StartTime`, `EndTime`, `TotalHours`, `Status`, `Remarks`, `user_name` FROM project_details"; 
$result = $conn->query($sql);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>
