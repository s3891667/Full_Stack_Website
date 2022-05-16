<?php

$xml = simplexml_load_file('../database/accounts.xml');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userEmail = $_POST["userEmail"];
    $newPass =  $_POST["newPass"];
    $reTypepass = $_POST["retypeNewPass"];
    $hashed = password_hash($newPass, PASSWORD_DEFAULT, ['cost' => 15]);
    foreach ($xml->user as $user) {
        if (($newPass == $reTypepass) && ($user->email == $userEmail)) {
            $user->password = $hashed;
            header("location:./listofaccount.html");
            break;
        } else {
            echo "<SCRIPT> 
            window.location.href = 'listofaccount.html?invalidPass';
            alert('Please check the again the retype password');
            </SCRIPT>";
        }
    }
    $xml->asXML('../database/accounts.xml');
}
