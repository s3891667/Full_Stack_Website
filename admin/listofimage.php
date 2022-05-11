<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin test</title>
    <link rel="stylesheet" href="admin_content.css">
    <script src="listofimage.js"></script>
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
                <a href="listofimage.html">
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

    <div class="user_content" onload="loadXMLDoc()">
        <div class="text">List of image</div>
        <table id="myTable">
            <tr>
                <th>File name</th>
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
                        // print $image ."<br />";
                        echo '<td><a href=' . $image . '><div>' . $image . '</div></a></td>';
                    }
                    echo "</tr>";
                }
            }

            ?>
        </table>
    </div>

</body>

</html>