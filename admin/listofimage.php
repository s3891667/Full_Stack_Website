<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!--CSS and javascript used in this html-->
    <link rel="stylesheet" href="listofimage.css">
    <script src="listofimage.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body onload="loadXMLDoc()">
    <!--Sidebar menu-->
    <div class="sidebar">
        <!--Logo-->
        <div class="profile">
            <div class="logo">
                <img src="picture/logo_picture.png" alt="logo_pic">
            </div>
        </div>
        <div class="title">ADMIN</div>
        <div class="message">Welcom to InstaKilogram!</div>
        <input type="image" src="picture/menu-alt-right-regular-24.png" class="menu_btn" id="btn" onclick="menuFunction()">

        <!--Navigator list-->
        <ul class="nav_list">
            <li>
                <a href="listofaccount.html">
                    <img src="picture/user-account-solid-24.png" alt="user-account">
                    <span class="link">User-account</span>
                </a>
            </li>

            <li>
                <a href="listofimage.php">
                    <img src="picture/image-solid-24.png" alt="image-list">
                    <span class="link">List of image</span>
                </a>
            </li>

            <!--Log out-->
            <li class="log_out">
                <a href="https://google.com">
                    <img src="picture/log-out-regular-24.png" alt="log-out">
                    <span class="link">Log out</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="user_content">
        <div class="text">List of image</div>
        <table id="myTable">
            <tr>
                <th>File name</th>
                <th>File size</th>
                <th>Action</th>
            </tr>

            <?php
            $total_user = count(glob("../resources/*", GLOB_ONLYDIR));
            for ($x = 2; $x <= 3; $x++) {
                $files = glob("../resources/user" . $x . "/posts/*");
                for ($i = 0; $i < count($files); $i++) {
                    echo "<tr>";
                    $image = $files[$i];
                    $supported_file = array(
                        'gif',
                        'jpg',
                        'jpeg',
                        'png'
                    );
                    $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
                    if (in_array($ext, $supported_file)) {
                        echo "<form method='post' action='delete_file.php'>";
                        echo "<td><a href='{$image}'><div name='file_name'>  $image  </div></a></td>";
                        echo '<td><div>' . filesize($image) . ' bytes</div></td>';
                        echo "<input type='hidden' name='file_name' value='$image'>";
                        echo "<td><input type='submit' name='delete_file' value='Delete File'></td>";
                        echo "</form>";
                    }
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </div>

</body>

</html>