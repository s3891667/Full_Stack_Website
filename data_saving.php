<?php

// define variables and set to empty values
$lastname = $firstname = $email = $password = "";
$check = 0;

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
    // This is in the PHP file and sends a Javascript alert to the client
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $hashed_password = password_hash($_POST["password"],PASSWORD_DEFAULT,['cost'=>15]);   
    $users = $xml->getElementsByTagName("user");
    foreach($users as $user) {
        $emails = $user->getElementsByTagName("email");
        $email_data= $emails->item(0)->nodeValue;
        if ($email != $email_data) {
            echo $email_data;
            storing_data($system,$xml,$firstname,$lastname,$hashed_password,$email);
            header("Location:index.html");
            break;
        }    
        else {
            $message = "Your email has been registed !";
            echo "<SCRIPT> //not showing me this
            window.location.href = 'signUp.html?email=used';
            alert('$message');
            </SCRIPT>";
            break;
        }
    }
}

// function that help create a database
function storing_data($system,$xml,$firstname,$lastname,$password,$email) {
    $registerd_date = date("Y/m/d");
    $registerd_time = date("h:i:sa");
    $root = $xml->documentElement;
    $totalAffiliates = ($root->childNodes->length)+1;
    $user = $xml->createElement("user");
    $user->setAttribute("id", $totalAffiliates);
    $system->appendChild($user);
    $fname = $xml->createElement("firstname",$firstname);
    $user->appendChild($fname);
    $lname = $xml->createElement("lastname",$lastname);
    $user->appendChild($lname);
    $pw = $xml->createElement("password",$password);
    $user->appendChild($pw);
    $em = $xml->createElement("email",$email);
    $user->appendChild($em);
    $date = $xml->createElement("date",$registerd_date);
    $user->appendChild($date);
    $time =$xml->createElement("time",$registerd_time);
    $user->appendChild($time);
    echo "<xmp>".$xml->saveXML(). "</xmp>";
    $xml->save("./accounts.xml");
}

?>

