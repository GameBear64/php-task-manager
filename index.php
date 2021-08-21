<?php 
    include 'include/management.php';
    //dynamic title
    function here($where) {
        if ($where == true) {
            return "Index";
        }
	}
    session_destroy();
?>
<section class='in'>
    <h2>Welcome to the website!</h2>
	<p>Please chose an option</p>
	<div style="height: 10%"> </div>
    <div class='options'>
        <p class='opt-reg' ><a href='./register.php'> Register </a></p>
        <p class='opt-log' ><a href="./login.php"> Login </a></p>
    </div>
</section>
<?php 
    include 'include/footer.php';
?>