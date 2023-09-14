<?php
include "config.php";

session_start();
$name =  $_SESSION["name"];
if ($_SESSION["admin"] == 1 || $_SESSION["passiveAdmin"] == 1) {
    $sql = "SELECT `project_id`, `project`, `Activity`, `ClientType`, `ClientName`, `Reference`, `Date`, `StartTime`, `EndTime`, `TotalHours`, `Status`, `ActionTaken`, `user_name` FROM project_details"; 
} else{
    $sql = "SELECT `project_id`, `project`, `Activity`, `ClientType`, `ClientName`, `Reference`, `Date`, `StartTime`, `EndTime`, `TotalHours`, `Status`, `ActionTaken`, `user_name` FROM project_details WHERE `user_name` = '$name'"; 
}
$result = $conn->query($sql);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>
