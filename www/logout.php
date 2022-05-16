<!--when users exits the account-->
<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["user"]);
//unset session the redirect to login page
session_destroy();
header("Location:login.php");
?>
