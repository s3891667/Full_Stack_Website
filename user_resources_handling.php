<?php
session_start();
$id = $_SESSION['id'];
$user = $_SESSION['user'];
$xml = new DOMDocument();
$xml->formatOutput = true;
$xml->preserveWhiteSpace = false;
$xml->load("./posts.xml");
$picAddress = "";

if (!$xml) {
    $posts = $xml->createElement("posts");
    $xml->appendChild($posts);
} else {
    $posts = $xml->firstChild;
}
//one default , two global

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $content = $_POST['contents'];
    $status = $_POST['checker'];
    $attachment = $_FILES["picture"]["name"];
    if ($status == "1") {
        $status = "Internal";
    } else if ($status == "2"){
        $status = "Public";
    } else {
        $status = "Private";
    }
    $users = $xml->getElementsByTagName("user");
    foreach ($users as $user) {
        storing_data($posts, $xml, $content, $status, $attachment, $id);
        header("Location:user_profile.php");
        break;
    }
}

// function that help create a database
function storing_data($posts, $xml, $content, $status, $attachment, $id)
{
    //Creating directory and save images for users.
    $registerd_date = date("Y-m-d");
    $registerd_time = date("h:i:sa");
    $user = $xml->createElement("user");
    $user->setAttribute("id", "user{$id}");
    $posts->appendChild($user);
    if (!file_exists("resources/user{$id}/posts")) {
        mkdir("resources/user{$id}/posts", 0777, true);
        resources_handling($id, $attachment);
    } else if (file_exists("resources/user{$id}/posts")) {
        resources_handling($id, $attachment);
    }

    global $picAddress;
    $contents = $xml->createElement("content", $content);
    $user->appendChild($contents);
    $attachment = $xml->createElement("attachment", $picAddress);
    $user->appendChild($attachment);
    $status = $xml->createElement("status", $status);
    $user->appendChild($status);
    $date = $xml->createElement("date", $registerd_date);
    $user->appendChild($date);
    $time = $xml->createElement("time", $registerd_time);
    $user->appendChild($time);
    echo "<xmp>" . $xml->saveXML() . "</xmp>";
    $xml->save("./posts.xml");
}

function resources_handling($id, $attachment)
{
    if ($attachment != "") {
        global $picAddress;
        // Where the file is going to be stored
        $target_dir = "resources/user{$id}/posts/";
        $file = $attachment;
        $path = pathinfo($file);
        $filename = $path['filename'];
        $ext = $path['extension'];
        if ($ext != 'jpg' || $ext != 'jpeg' || $ext != 'png' || $ext != 'gif') {
            echo "<SCRIPT> //not showing me this
            window.location.href = 'user_profile.php?img=invalidType';
            alert('Please check for file type');
            </SCRIPT>";
        }
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


function time_check($check, $dateDiff, $timeDiff)
{
    //day check
    if ($check >= 1) {
        if ($check == 1) {
            echo $dateDiff->format('%a day ago');
        } else {
            echo $dateDiff->format('%a days ago');
        }
    } else {
        // hour check
        if ((int)$timeDiff->format('%h') == 0) {
            //minutes check
            if ((int)$timeDiff->format('%i') <= 0) {
                echo "recently";
            } else {
                echo $timeDiff->format('%i minutes ago');
            }
        } else {
            echo $timeDiff->format('%h hours ago');
        }
    }
}

function reading_user_name($id)
{
    $name = "";
    $xml = simplexml_load_file("./accounts.xml");
    foreach ($xml->user as $user) {
        if ($id == "user{$user['id']}") {
            $name = $user->firstname;
        };
    }
    return $name;
}

function avatar_dir_check($id)
{
    $dir = "";
    $xml = simplexml_load_file("./accounts.xml");
    foreach ($xml->user as $user) {
        if ($id == "user{$user['id']}") {
            $dir = $user->avatar;
        };
    }
    return $dir;
}


