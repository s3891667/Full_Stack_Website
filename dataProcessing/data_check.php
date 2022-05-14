<?php
session_start();
$check = 1;
$xml = simplexml_load_file("../database/accounts.xml");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["useremail"];
    $inputpassword = $_POST["userpassword"];
    foreach ($xml->user as $user) {
        if (($email == ($user->email)) && password_verify($inputpassword, $user->password)) {
            $_SESSION['user'] = "$user->firstname";
            $_SESSION['avatar'] = "$user->avatar";
            $id = $user['id'];
            $_SESSION['id'] = "$id";
            $_SESSION['checker'] = true;
            $check = 1;
            header("location: ../www/home.php");
            break;
        } else {
            $check = 0;
            continue;
        }
    }
    if ($check == 0) {
        $message = "Wrong email or Password";
        echo "<SCRIPT>
        alert('$message');
        window.location.href='login.php?error';
        </SCRIPT>";
    }
}
