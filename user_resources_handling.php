<?php
session_start();


//this file will store the post contents to posts.xml (Picture will be saved in the resources
//in the folder of that specific user.


// echo $_SESSION['id'];

$id = $_SESSION['id'];
$user = $_SESSION['user'];
$xml = new DOMDocument();
$xml->formatOutput = true;
$xml->preserveWhiteSpace = false;
$xml->load("./posts.xml");


if (!$xml) {
    $posts = $xml->createElement("posts");
    $xml->appendChild($posts);
} else {
    $posts = $xml->firstChild;
}


//one default , two global

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $content = $_POST['content'];
    $status = $_POST['checker'];
    $attachment = $_FILES["picture"]["name"];
    $users = $xml->getElementsByTagName("user");
    if ($status == "1") {
        $status = "default";
    }
    else {
        $status = "global";
    }
    foreach ($users as $user) {
        storing_data($posts,$xml,$content,$status,$attachment,$id);
        header("Location:user_profile.php");
    }
}


// function that help create a database
function storing_data($posts,$xml,$content,$status,$attachment,$id) {
    //Creating directory and save images for users.
    $user = $xml->createElement("user");
    $user->setAttribute("id", "user{$id}");
    $posts->appendChild($user);
    $picAddress="";
    if (!file_exists("resources/user{$id}/pictures")) {
        mkdir("resources/user{$id}/pictures", 0777, true);
        resources_handling($id, $attachment,$picAddress);
    }


    $contents = $xml->createElement("content", $content);
    $user->appendChild($contents);
    $attachment = $xml->createElement("attachment",$attachment);
    $user->appendChild($attachment);
    $status= $xml->createElement("status",$status);
    $user->appendChild($status);
    echo "<xmp>" . $xml->saveXML() . "</xmp>";
    $xml->save("./posts.xml");
}


function resources_handling($id, $attachment,$picAddress)
{
    if ($attachment != "") {
        // Where the file is going to be stored
        $target_dir = "resources/user{$id}/pictures/";
        $file = $attachment;
        $path = pathinfo($file);
        $filename = $path['filename'];
        $ext = $path['extension'];
        $temp_name = $_FILES['picture']['tmp_name'];
        $path_filename_ext = $target_dir . $filename . "." . $ext;
        $picAddress = $path_filename_ext;
        // Check if file already exists
        if (file_exists($path_filename_ext)) {
            echo "Sorry, file already exists.";
        } else {
            move_uploaded_file($temp_name, $path_filename_ext);
            echo "Congratulations! File Uploaded Successfully.";
        }
    }
}
