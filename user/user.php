<?php 
    include '../include/management.php';
    //dynamic title
    function here($where) {
        if ($where == "title") {
            return $_SESSION["user_info"]["Name"] . "'s Porfile";
        } elseif ($where == "nav") {
            return "Your Porfile";
        }
    }

    $aidi = $_SESSION["user_info"]["user_id"];
    //task read
    $read_query = ("SELECT * FROM tasks WHERE user_id = $aidi");
    $read_result = mysqli_query($conn, $read_query);
?>
<section class='profile'>
    <h2><?=$_SESSION["user_info"]["Name"]?>'s profile</h2>  
    <div class="info">                 
        <p> Name: <?=$_SESSION["user_info"]["Name"]?></p>
        <p> E-mail: <?=$_SESSION["user_info"]["Mail"]?></p>
        <p> Date Created: <?=$_SESSION["user_info"]["Created"]?></p>
        <p> Total tasks: <?=mysqli_num_rows($read_result)?></p>
    </div>
    <div class='options'>
        <p class='psettings' ><a href='./settings.php'> Settings </a></p>
        <p class='logout' ><a href="../login.php?logout=true"> LogOut </a></p>
    </div>
</section>

<?php
    include '../include/footer.php';
?>