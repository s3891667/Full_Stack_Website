<?php
//start the session for user
session_start();
//for throwing exception
$check = 1;
//looping the accounts.xml for login
$xml = simplexml_load_file("../database/accounts.xml");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //take value from form
    $email = $_POST["useremail"];
    $inputpassword = $_POST["userpassword"];
    foreach ($xml->user as $user) {
        //check if the account is valid 
        if (($email == ($user->email)) && password_verify($inputpassword, $user->password)) {
            // set the session value for the specific user
            $_SESSION['user'] = "$user->firstname";
            $_SESSION['avatar'] = "$user->avatar";
            $id = $user['id'];
            $_SESSION['id'] = "$id";
            $_SESSION['checker'] = true;

            $check = 1;
            //direct user homepage;
            header("location: ../www/home.php");
            break;
        } else {
            $check = 0;
            continue;
        }
    }
    if ($check == 0) {
        //if the information is wrong
        $message = "Wrong email or Password";
        echo "<SCRIPT>
        alert('$message');
        window.location.href='../www/login.php?error';
        </SCRIPT>";
    }
}
