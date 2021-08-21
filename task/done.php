<?php 
include '../include/management.php'; 
function here($where) {
    if ($where == true) {
        return "Updating Task № " . $_GET["task_id"];  
    }
}

//if error
echo "<p> If you are stuck here you probably broke something... </p>";

//get task id and task status, reverse the status and uopdate the task
$task = $_GET["task_id"];
if ($_GET["done"] == 0) {
    $status = 1;
} else {
    $status = 0;
}
$conn->query("UPDATE `tasks` SET `Done`='$status' WHERE task_id='$task'");

header("Location: task.php?task_id=$task");