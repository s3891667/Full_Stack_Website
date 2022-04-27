<?php
// define variables and set to empty values
$lastname = $firstname = $email = $password = "";

//quering data from the from
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $password = password_hash($_POST["password"],PASSWORD_DEFAULT );
  $email = $_POST["email"];
}

$xml = new DOMDocument();
$xml->formatOutput = true;
$xml->preserveWhiteSpace = false;
$xml->load("accounts.xml");

if(!$xml) {
    $System = $xml->createElement("system");
    $xml->appendChild($System);
}
else{
    $System = $xml->firstChild;

}

// save the data to the xml file
$user = $xml->createElement("user");
$System->appendChild($user);
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




?>