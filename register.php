<?php 
    include 'include/management.php';
    //dynamic title
    function here($where) {
        if ($where == true) {
            return "Registration";
        }
    }
?>
<section class="login">
    <?php
        $read_query = "SELECT * FROM users";
        $result = mysqli_query($conn, $read_query);
        $patern = "^[a-zA-Z0-9.!#$%&'*+/=?`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$^";

        //checking if form is empty
        if (!empty($_POST["name"]) && !empty($_POST["mail"]) && !empty($_POST["pass"]) && !empty($_POST["pass-conf"])) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row["Name"] == $_POST['name']) {
                    $alreadyUser = true;
                }
            }
            //check if pass check checks chekcs out
            if ($_POST["pass"] == $_POST["pass-conf"] && preg_match($patern, $_POST["mail"]) && !$alreadyUser) {
                $name = $_POST["name"];
                $mail = $_POST["mail"];
                $pass = $_POST["pass"];
                $now = date('Y-m-d');

                $conn->query("INSERT INTO `users` (`Name`, `Mail`, `Password`, `Created`) VALUES ('$name', '$mail', '$pass', '$now')");
                //once the account is created it redirects to the login page
                header("Location: login.php?register=true");
            } elseif ($alreadyUser){
                echo "<p class='alert'> User already exists! </p>";
            }elseif (!preg_match($patern, $_POST["mail"])) {
                echo "<p class='alert'> Invalid email </p>";
            }else {
                echo "<p class='alert'> Pass dont match </p>";
            }

        } else { 
            $numb = 0;
            if (empty($_POST["name"])) {
                $numb++;
            }
            if (empty($_POST["mail"])) {
                $numb++;
            }
            if (empty($_POST["pass"])) {
                $numb++;
            }
            if (empty($_POST["pass-config"])) {
                $numb++;
            }
            if ($numb < 4) {
                echo "<p class='alert'> You forgot something in the form!</p>";
            } 
        } 
    ?>
    <h1>Register</h1>
    <form action="" method="post" class="log">
        <input type="text" name="name" placeholder="Name"><br>
        <input type="text" name="mail" placeholder="E-Mail"><br>
        <input name="pass" type="password" placeholder="Password"><br>
        <input name="pass-conf" type="password" placeholder="Confirm Password"><br><br>
        <input type="submit">
    </form> 
</section>
<?php 
    include 'include/footer.php';
?>