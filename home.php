<!DOCTYPE html>
<html lang="en">
<?php
session_start();

if (!isset($_SESSION['user'])) {
    echo "<SCRIPT>
    alert('Please login your account !');
    window.location.href='index.html';
    </SCRIPT>";
    die();
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
    <title>Homepage</title>
</head>
<body>
    <header id = "header">
        <div>
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">InstaKilogram</a>
                    </div>
                    <ul class="nav navbar-nav">

                        <li><a href="#">TRENDING POST</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="./user_profile.php"><span class="glyphicon glyphicon-log-in"></span> Profile</a></li>
                        <li><a href="./logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="container">
            <form action="/action_page.php">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="search">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
            </form>
        </div>

        <div class="img_dess">
            <img class="img_des" src="./picture/imgconnect.jpeg" alt="intropic">
        </div>
    </header>
    <main>
    <section >
    <div class="content2" >
                <div class="content2_pad">
                    
                        <div class="content2-first-1">
                            <img class="images1" src="./picture/ava.jpeg" alt="avatarimage">
                        </div>

                        <div class="content2-first-2">
                            <p class="content2-text" href="">Millionaire</p>
                            <img class="dots" src="https://img.icons8.com/material-outlined/50/000000/dots-loading--v7.png">
                        </div>

                       
                        <div class="imgdiv">
                            <img class="imgdiv-style" src="./picture/welcomehomepage.jpg" alt="">
                        </div>

                        <div class="icons">
                            <img class="icons1" src="./picture/heart.png" alt="">
                            <img class="icon2" src="./picture/network.png" alt="">
                        </div>


                        <div class="likes">
                            <h5 class="time-text">7 HOURS AGO</h5>
                        </div>
                </div>
    </div>
    </section>

    <section >
    <div class="content2" >
                <div class="content2_pad">
                    
                        <div class="content2-first-1">
                            <img class="images1" src="./picture/ava.jpeg" alt="avatarimage">
                        </div>

                        <div class="content2-first-2">
                            <p class="content2-text" href="">Millionaire</p>
                            <img class="dots" src="https://img.icons8.com/material-outlined/50/000000/dots-loading--v7.png">
                        </div>

                       
                        <div class="imgdiv">
                            <img class="imgdiv-style" src="./picture/welcomehomepage.jpg" alt="">
                        </div>

                        <div class="icons">
                            <img class="icons1" src="./picture/heart.png" alt="">
                            <img class="icon2" src="./picture/network.png" alt="">
                        </div>


                        <div class="likes">
                            <h5 class="time-text">7 HOURS AGO</h5>
                        </div>
                </div>
    </div>
    </section>
    

    
    
    </main>
     <aside>
    </aside> 
    
    <!--Cookie javascript file-->
    <script src="cookies_content.js"></script>
</body>
</html>
