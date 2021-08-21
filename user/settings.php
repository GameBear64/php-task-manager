<?php 
    include '../include/management.php';
    //dynamic title
    function here($where) {
        if ($where == "title") {
            return $_SESSION["user_info"]["Name"] . "'s Settings";
        } elseif ($where == "nav") {
            return "Settings";
        }
    }

    //prep for user edit
    $aidi = $_SESSION["user_info"]["user_id"];
    $query = "SELECT * FROM `users` WHERE user_id = $aidi";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $_SESSION["user_info"] = $row;
    $txtname = $row["Name"];
    $txtmail = $row["Mail"];

    if (!empty($_POST["name"])) {
        $name = $_POST["name"];
        $conn->query("UPDATE `users` SET `Name`='$name' WHERE `user_id`='$aidi'");
    } 
    if (!empty($_POST["mail"])) {
        $mail = $_POST["mail"];
        $conn->query("UPDATE `users` SET`Mail`='$mail' WHERE `user_id`='$aidi'");
    }
    //when done with everything and some feild was edited go back to task page
    if (!empty($_POST["name"]) || !empty($_POST["mail"])) {
        header("Refresh:0");
    }

    if (!empty($_POST["old-pass"]) && !empty($_POST["new-pass"]) && !empty($_POST["new-pass-conf"])) {
        if ($_POST["old-pass"] == $_SESSION["user_info"]["Password"] && $_POST["new-pass"] == $_POST["new-pass-conf"]) {
            $pass = $_POST["new-pass"];
            $conn->query("UPDATE `users` SET`Password`='$pass' WHERE `user_id`='$aidi'");
        } else {
            echo "<p class='alert'> Passowrds dont match </p>";
        }
    }
    ?>

    <section class='settings'>
        <h1>Settings page</h1>
        <hr>
        <!-- <p> Current <br> Style: <?=ucfirst(substr($_SESSION["settings"][0], 0, -4))?> <br> Order: <?=$_SESSION["settings"][1]?> </p> -->
        <form method='post'>
            <h3>Style and order</h3>
            <select name='style'>
            <?php
            foreach (array_slice(scandir("../css"), 2) as $value) {
                if ($once == false) {
                    echo "<option value='none'> Select a style </option>";
                    $once = true;
                }
                echo "<option value='$value'>". ucfirst(substr($value, 0, -4)) ."</option>";
            }
            ?>
            </select>
            
            <select name="order">
                <option value='none'> Select task order </option>
                <option value='Title'> Alphabetical </option>
                <option value='Created ASC'> Oldest </option>
                <option value='Created DESC'> Newest </option>
                <option value='Due'> By Date Due </option>
            </select>
            <br><input type='submit'>
        </form>
        <hr>

        <form method='post'>
            <h3>User info</h3>
            <input type="text" name="name" placeholder="Username" value="<?=htmlspecialchars($txtname)?>"></input><br>
            <input type="text" name="mail" placeholder="E-Mail" value="<?=htmlspecialchars($txtmail)?>"></input><br>
            <input type='submit'>
        </form>
        <hr>

        <form method='post'>
            <h3>Password Reset</h3>
            <input type='password' name="old-pass" placeholder="Old Password"></input><br><br>
            <input type="text" name="new-pass" placeholder="New Password"></input><br>
            <input type="text" name="new-pass-conf" placeholder="Confirm New Password"></input><br>
            <input type='submit'>
        </form>
        <hr>

        <form method='post'>
            <h3>Delete accouunt</h3>
            <input name="delete" type="text" placeholder='Type "delete" in this box to confirm.'><br>
            <input type='submit'>
        </form>
        
    </section>
    <?php
    if (!empty($_POST["style"])) {
        if ($_POST["style"] != "none") {
            $_SESSION["settings"][0] = $_POST["style"];
            header("Refresh:0");
        }
    }
        
    if (!empty($_POST["order"])) {
        if ($_POST["order"] != "none") {
            $_SESSION["settings"][1] = $_POST["order"];
            header("Refresh:0");
        }
    }

    if (!empty($_POST["delete"]) && $_POST["delete"] == "delete") {
        $user = $_SESSION["user_info"]["user_id"];
        $conn->query("DELETE FROM users WHERE `user_id`=$user");
        header("Location: ../register.php");
    }

    include '../include/footer.php';
?>