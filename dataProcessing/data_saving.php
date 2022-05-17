<?php

// define variables and set to empty values
$lastname = $firstname = $email = $password = $avatar_dir  = "";
$flag = 0;
$xml = new DOMDocument();
$xml->formatOutput = true;
$xml->preserveWhiteSpace = false;
//Read the xml file from the database
$xml->load("../database/accounts.xml");
$imgCheck = 1;

if (!$xml) {
    $system = $xml->createElement("system");
    $xml->appendChild($system);
} else {
    $system = $xml->firstChild;
}

//saving data to the xml file 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //get value from the form from signUp.html
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $avatar = $_FILES["avatar"]["name"];
    //hashing the password
    $hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT, ['cost' => 15]);
    $users = $xml->getElementsByTagName("user");
    //looping through the xml file to check 
    foreach ($users as $user) {
        $emails = $user->getElementsByTagName("email");
        $email_data = $emails->item(0)->nodeValue;
        //This statement will check if the email has registered or not.
        if ($email == $email_data) {
            $flag = 0; // this is used for throwing exception
            break;
        } else {
            $flag = 1;
        }
    }
    //Throw errors when the email has already registed by someone else
    if ($flag == 0) {
        $message = "Your email has been registed !";
        echo "<SCRIPT> //not showing me this
        window.location.href = '../www/signUp.html?email=used';
        alert('$message');
        </SCRIPT>";
        //If everything are clear then start storing data in xml file
    } else if ($flag == 1) {
        storing_data($system, $xml, $firstname, $lastname, $hashed_password, $email, $avatar);
        if ($imgCheck == 0) {
            echo "<SCRIPT> //not showing me this
            window.location.href = '../www/signUp.html?invalidType';
            alert('Please check for file type');
            </SCRIPT>";
        } 
            //redirect users to the index in order to login the system.
        header("Location:../www/index.php");
        
    }
}

//function to store pictures for users;
function resources_handling($totalAffiliates, $avatar)
{
    //dir address to store files
    $target_dir = "../resources/user{$totalAffiliates}/avatar/";
    $file = $avatar;
    $path = pathinfo($file);
    $filename = $path['filename'];
    $ext = "{$path['extension']}";
    global $avatar_dir;
    // check image types;
    if ($avatar != "" && ($ext == "jpg" || $ext == "jpeg" || $ext == "png" || $ext == "gif")) {
        $temp_name = $_FILES['avatar']['tmp_name'];
        $path_filename_ext = $target_dir . $filename . "." . $ext;
        $avatar_dir = $path_filename_ext;
        //save files in the directory
        move_uploaded_file($temp_name, $path_filename_ext);
    } else if ($avatar == "") {
        // if user hasn't choosen any image yet -> choose the avatar icon for the user
        $avatar_dir = "../resources/avatar.png";
    } else {
        global $imgCheck;
        $imgCheck = 0;
    }
}

// function that help create a database
function storing_data($system, $xml, $firstname, $lastname, $password, $email, $avatar)
{
    global $avatar_dir;
    //generate current to calculate the registered time
    $registerd_date = date("Y-m-d");
    $registerd_time = date("h:i:sa");
    $root = $xml->documentElement;
    //automatically increase the users' ids
    $totalAffiliates = ($root->childNodes->length) + 1;

    $user = $xml->createElement("user");
    $user->setAttribute("id", $totalAffiliates);
    $system->appendChild($user);


    //Creating directory and save images for users.
    if (!file_exists("../resources/user{$totalAffiliates}")) {
        // create a folder for each user
        mkdir("../resources/user{$totalAffiliates}/avatar", 0777, true);
        resources_handling($totalAffiliates, $avatar);
    }
    global $imgCheck;

    if ($imgCheck == 0) {
        return false;
    }
    // storing information
    $fname = $xml->createElement("firstname", $firstname);
    $user->appendChild($fname);
    $lname = $xml->createElement("lastname", $lastname);
    $user->appendChild($lname);
    $pw = $xml->createElement("password", $password);
    $user->appendChild($pw);
    $em = $xml->createElement("email", $email);
    $user->appendChild($em);
    $date = $xml->createElement("date", $registerd_date);
    $user->appendChild($date);
    $time = $xml->createElement("time", $registerd_time);
    $user->appendChild($time);
    $ava = $xml->createElement("avatar", $avatar_dir);
    $user->appendChild($ava);

    echo "<xmp>" . $xml->saveXML() . "</xmp>";
    //saving the file
    $xml->save("../database/accounts.xml");
}
