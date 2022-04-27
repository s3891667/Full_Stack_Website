<?php
// define variables and set to empty values
$lastname = $firstname = $email = $password = "";


$xml = new DOMDocument();
$xml->formatOutput = true;
$xml->preserveWhiteSpace = false;
$xml->load("accounts.xml");

if(!$xml) {
    $system = $xml->createElement("system");
    $xml->appendChild($system);
}
else {
    $system = $xml->firstChild;
}

//saving data to the xml file 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $password = $_POST["password"];
    $hashed_password = password_hash($password,PASSWORD_DEFAULT);
    // $password = $_POST["password"];
    $email = $_POST["email"];
    storing_data($system,$xml,$firstname,$lastname,$hashed_password,$email);
    header("Location:index.html");
}


// function that help create a database
function storing_data($system,$xml,$firstname,$lastname,$password,$email) {
    $user = $xml->createElement("user");
    $system->appendChild($user);
    $fname = $xml->createElement("firstname",$firstname);
    $user->appendChild($fname);
    $lname = $xml->createElement("lastname",$lastname);
    $user->appendChild($lname);
    $pw = $xml->createElement("password",$password);
    $user->appendChild($pw);
    $em = $xml->createElement("email",$email);
    $user->appendChild($em);
    echo "<xmp>".$xml->saveXML(). "</xmp>";
    $xml->save("./accounts.xml");
}
?>