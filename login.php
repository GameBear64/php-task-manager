<?php 
    include 'include/management.php';
    //dynamic title
    function here($where) {
        if ($where == true) {
            return "LogIn";
        }
    }
?>
<section class="login">
    <?php 
        //if user is here from register form, show this
        if (!empty($_GET["register"]) && $_GET["register"] == true) {
            echo "<p class='alert'> Now log in into your newly made account! </p>";
        }
        if (!empty($_GET["logout"]) && $_GET["logout"] == true) {
            //clrearing the previous session
            session_destroy();
            session_start();
            echo "<p class='alert'> You have logged out of your account! </p>";
        }

        //query
        $read_query = "SELECT * FROM users";
        $result = mysqli_query($conn, $read_query);

        //make post into session if it all goes well itll be used
        if (empty($_SESSION)) {
            $_SESSION = $_POST;
        }

        //check mail and pass with a loop that stops when it finds a match
        if (!empty($_POST["name"]) && !empty($_POST["pass"])) {
            $wrong = true;
            if( mysqli_num_rows($result) > 0 ){
                while ($row = mysqli_fetch_assoc($result)) {
                    //echo json_encode($row);
                    if ($row["Name"] == $_POST['name']) {
                        $wrong = false;
                        if ($row["Password"] == $_POST['pass']) {
                            $_SESSION["user_info"] = $row;
                            header("Location: main.php");
                        } else {
                            echo "<p class='alert'> Wrong Pasword </p>";
                        }
                    }
                }
                //if no such name is found then this pops up
                if($wrong == true) {
                    echo "<p class='alert'> New User? <a href='./register.php'>Make an account!</a></p>";
                }
            }
        //if no name in form
        } elseif (empty($_POST["name"]) && !empty($_POST["pass"])) {
            echo "<p class='alert'> No name provided </p>";
        //if no pass in form
        } elseif (!empty($_POST["name"]) && empty($_POST["pass"])) {
            echo "<p class='alert'> No password provided </p>";
        }
    ?>
    <h1>Login</h1>
    <form action="" method="post" class="log">
        <input type="text" name="name" placeholder="Name"><br>
        <input name="pass" type="password" placeholder="Password"><br>
        <input type="submit">
    </form> 
</section>
<?php 
    include 'include/footer.php';
?>