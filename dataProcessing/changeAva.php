<?php 
session_start();

$picAddress = "";
$id = $_SESSION['id'];

// update

$xml = simplexml_load_file('../database/accounts.xml');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newAvatar = $_FILES["newAvatar"]["name"];
    foreach ($xml->user as $user) {
        if ($id == $user['id'] ) {
            resources_handling($id, $newAvatar);
            $_SESSION['avatar'] = $picAddress;
            $user->avatar = $_SESSION['avatar'];
            header("location:../www/user_profile.php");
            break;
        }
    }
    $xml->asXML('../database/accounts.xml');
}


function resources_handling($id, $newAvatar)
{
    if ($newAvatar != "") {
        global $picAddress;
        // Where the file is going to be stored
        $target_dir = "../resources/user{$id}/avatar/";
        $file = $newAvatar;
        $path = pathinfo($file);
        $filename = $path['filename'];
        $ext = $path['extension'];
        if ($ext != 'jpg' || $ext != 'jpeg' || $ext != 'png' || $ext != 'gif') {
            echo "<SCRIPT>
            window.location.href = 'user_profile.php?img=invalidType';
            alert('Please check for file type');
            </SCRIPT>";
        }
        $temp_name = $_FILES['newAvatar']['tmp_name'];
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




