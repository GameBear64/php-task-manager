<?php 
    include '../include/management.php';
    //dynamic title
    function here($where) {
        if ($where == true) {
            return "Task № " . $_GET["task_id"]; 
        }
    }
?>
<div style="height: 5%"> </div>
<section>
<?php    
    //get the selected task
    $task = $_GET["task_id"];
    $read_query = ("SELECT * FROM tasks WHERE task_id = $task");
    $result = mysqli_query($conn, $read_query);
    $row = mysqli_fetch_assoc($result);

    //display function on a seperate file
    include '../include/display.php';

    switch ($_GET["type"]) {
        case 'done':
            if (taging($row) == "Done" || taging($row) == "Done Late") {
                display($row, true);
            }
            break;
        case 'missed':
            if (taging($row) == "Missing") {
                display($row, true);
            }
            break;
        case 'upcoming':
            if (taging($row) == "For Today" || taging($row) == "Within A Week" || taging($row) == "Upcoming") {
                display($row, true);
                $none++;
            }
            break;
        default:
            display($row, true);
        break;
    }

    //task options
    echo "<div class='options'>";
    if ($row["Done"] == 0) {
        echo "<p class='markdone'><a href='./done.php?task_id=". $row["task_id"] ."&done=".$row["Done"] ."'> Mark as Done </a></p>";
    } else {
        echo "<p class='markundone'><a href='./done.php?task_id=". $row["task_id"] ."&done=".$row["Done"] ."'> Mark as Undone </a></p>";
    }
    echo "<p class='edit'><a href='./edit.php?task_id=". $row["task_id"] ."'> Edit </a></p>";
    echo "<p class='delete'><a href='./delete.php?task_id=". $row["task_id"]."'> Delete </a></p>";
    echo "</div></article>";
?>
</section>
<div style="height: 5%"> </div>
<?php 
    include '../include/footer.php';
?>
