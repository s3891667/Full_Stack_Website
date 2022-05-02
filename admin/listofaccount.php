<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin test</title>
    <link rel="stylesheet" href="admin_content.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    include 'list_of_account'
</head>

<body>
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
        
        <!--Navigator list-->
        <ul class="nav_list">
            <li class="searchbar">
                <input type="text" placeholder="Search..">
            </li>
            
            <li>
                <a href="listofaccount.html">
                    <img src="picture/user-account-solid-24.png" alt="user-account">
                    <span class="link">User-account</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <img src="picture/image-solid-24.png" alt="image-list">
                    <span class="link">List of image</span>
                </a>
            </li>
            
            <!--Log out-->
            <li class ="log_out">
                <a href="#">
                    <img src="picture/log-out-regular-24.png" alt="log-out">
                    <span class="link">Log out</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="user_title">
        <div class="text">List of account</div>
        <?php include 'list_of_account.php';?>
    </div>
</body>
</html>