<?php
$xml = simplexml_load_file("./accounts.xml");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["useremail"];
        $inputpassword = $_POST["userpassword"];
        foreach($xml->user as $user) {
            if ($email==$user->email && password_verify($inputpassword,$user->password)) {
            header("location: index.html");
            }
        }
}

?>