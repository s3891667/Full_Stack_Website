<!--when users exits the account-->
<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["user"]);
session_destroy();
header("Location:login.php");
?>
