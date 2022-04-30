<?php
 session_start();
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="cookies_content.css">   
    <title>Document</title>
</head>
<body>
    <header>
        <!-- Logo Image  -->
        <div>
            <img class="img" src="picture/Logo_picture.jpg" alt="logo">
        </div> 
        <div class="webheading">
            <!-- Website Heading -->
            <h1>InstaKilogram</h1>
            <p>Welcome <?php echo $_SESSION['user']; ?> to InstaKilogram</p>
            <p> <?php echo $_SESSION['id'];  ?> </p>
            <span>Inspire The World By Yourself</span>
        </div>
        <div class="nav_background">
            <!-- Navigation Bar -->
            <a class="nav nav_setcolor" href="./index.html">Homepage</a>
            <a class="nav nav_setcolor" href="#">Trending Post</a>
            <a class="nav nav_setcolor" href="./login.html">Log In</a>
            <a class="nav nav_setcolor" href="./logout.php">Logout</a>
        </div>
            <!-- Search Bar -->
        <div>
            <input class="searchbar" type="text" placeholder="Search here...">
        </div>
    </header>
    <main>
        <div class="overallpost">
            <!-- Overall Post -->
            <div class="ava_user">
                <!-- icon and user name -->
                <img src="picture/ava.jpeg" alt="Avatar" class="avatar">
                <span class="username">
                    Dang Khoa
                </span>
            </div>
            <div class="picture_post">
                <!-- Picture -->
                <img src="picture/image1.jpeg" alt="post">
            </div>
            <div>
                <!-- Icon: like, comment -->
                <span>
                    <!-- Like -->
                    <img src="picture/likeicon.png" alt="likeicon" class="avatar">
                </span>
                <span>
                    <!-- Comment -->
                    <img src="picture/commenticon.webp" alt="comment" class="avatar2">
                </span>
            </div>
            <div>
                <!-- Number of like -->
                <div>
                    <p>
                        <qoute>Today is not an easy day</qoute>
                    </p>
                </div>
            </div>
            <div>
                <!-- Caption -->
            </div>
            <div>
                <!-- View comment -->
            </div>
            <div>
                <!-- Data time -->
            </div>
        </div>
    </main>
    <aside>
        
    </aside>
    <footer>
    <div>
        <a class="footer_tab" href="#">About Us</a>
        <a class="footer_tab" href="#">Copyright</a>
        <a class="footer_tab" href="#">Privacy</a>
        <a class="footer_tab" href="#">Contact Information</a>
    </div>
    </footer>
    
    <!--Cookie black screen-->
    <div class="wrapper"></div>

    <!--Cookie consent popup-->
    <div class="cookie-container">
        <div>I use cookies</div> 
        <p>My website uses cookies necessary for its basic <br>functioning. By continuing browsing, you consent <br>to my use of cookies and other technologies.
        </p>
        <button class="accept-button">I understand</button>
        <a href="#">Learn more</a>
    </div>

    <!--Cookie javascript file-->
    <script src="cookies_content.js"></script>
</body>
</html>