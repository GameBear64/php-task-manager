<?php 
    include '../include/management.php';
    function here($where) {
        if ($where == true) {
            return "Editing Task № " . $_GET["task_id"];  
        }
    }
?>
<div style="height: 15%"> </div>
<section>
    <?php

        //get and sort the task
        $task = $_GET["task_id"];
        $read_query = ("SELECT * FROM tasks WHERE task_id = $task");
        $result = mysqli_query($conn, $read_query);

        //get contents
        $row = mysqli_fetch_assoc($result);
        $txttitle = $row["Title"];
        $txtdue = $row["Due"];
        $txtdesc = $row["Description"];

        //3 ifs so each feild can be eddited seperatly
        if (!empty($_POST["title"])) {
            $title = $_POST["title"];
            $conn->query("UPDATE `tasks` SET `Title`='$title' WHERE task_id='$task'");
        }
        if (!empty($_POST["due"])) {
            $due = $_POST["due"];
            $conn->query("UPDATE `tasks` SET `Due`='$due' WHERE task_id='$task'");
        } 
        if (!empty($_POST["desc"])) {
            $desc = $_POST["desc"];
            $conn->query("UPDATE `tasks` SET `Description`='$desc' WHERE task_id='$task'");
        }
        //when done with everything and some feild was edited go back to task page
        if (!empty($_POST["title"]) || !empty($_POST["due"]) || !empty($_POST["desc"])) {
            header("Location: task.php?task_id=$task");
        }
        
    ?>
    <form action="" method="post" class="post">
        <h1>Edit "<?=mb_strimwidth($row["Title"], 0, 15, '...')?>":</h1>
        <input type="text" name="title" placeholder="Title" value="<?=htmlspecialchars($txttitle)?>">
        <input type="date" name="due" placeholder="Due" value=<?=$txtdue?>>
        <textarea name="desc" placeholder="Description"><?=htmlspecialchars($txtdesc)?></textarea>
        <input type="submit"> <br>
    </form> 
</section>
<?php 
    include '../include/footer.php';
?>