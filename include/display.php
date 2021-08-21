<?php

    if (empty($_GET["type"])) {
        $_GET["type"] = "all";
    }

    function display($row, $single) {
        switch (taging($row)) {
            case taging($row) == "Done" || taging($row) == "Done Late":
                echo "<article class = 'done'>";
                break;
            case taging($row) == "Missing":
                echo "<article class = 'missing'>";
                break;
            case taging($row) == "For Today" || taging($row) == "Within A Week" || taging($row) == "Upcoming":
                echo "<article class = 'coming'>";
                break;
        }

        if ($single) {
            echo "<h3>". $row["Title"] ."</h3>";
            echo "<p class='tag'>". taging($row) ."</p>";
            echo "<p class='dates'> Created: ". $row["Created"] . " Due: " . $row["Due"] ."</p>";
            
            echo "<p class='description'>". nl2br($row["Description"]) ."</p>";
            echo "</article>";
        } else {
            echo "<h3><a href='./task/task.php?task_id=". $row["task_id"] ."'>".mb_strimwidth($row["Title"], 0, 80, '...') ."</a></h3>";
            echo "<p class='tag'>". taging($row) ."</p>";
            echo "<p class='dates'> Created: ". $row["Created"] . " Due: " . $row["Due"] ."</p>";
            
            echo "<p class='description'>". nl2br(mb_strimwidth($row["Description"], 0, 300, '...')) ."</p>";
            echo "</article>";
            echo "<hr>";
        }
        
    }

    function taging($row) {
        if (strtotime(date('Y-m-d')) > strtotime($row["Due"]) && $row["Done"] == 0) {
            return "Missing";
        } else {
            if (strtotime(date('Y-m-d')) == strtotime($row["Due"]) && $row["Done"] == 0) {
                return "For Today";
            } elseif (strtotime($row["Due"]) - strtotime(date('Y-m-d')) < 604800 && $row["Done"] == 0) {
                return "Within A Week";
            } elseif ($row["Done"] == 0) {
                return "Upcoming";
            } else {
                return "Done";
            }
        }
    }
?>