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
    <header id="header">
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
        <?php

        $xml = simplexml_load_file("./posts.xml");
        foreach ($xml->user as $user) {
            if ("$user->status" == "global") {
                $image = $user->attachment;
                //generate current time to compare the posts upload time
                $currentDate = date_create(date("Y-m-d"));
                $currentTime = date_create(date("h:i:sa"));
                //query time from the xml file
                $postDate = date_create($user->date);

                $dateDiff = date_diff($postDate, $currentDate);
                //check to choose display method time or date
                $check = (int)$dateDiff->format('%a');
                $postTime = date_create($user->time);
                $timeDiff = date_diff($postTime, $currentTime);
                echo "
            <section >
            <div class='content2' >
                        <div class='content2_pad'>
                            
                    <div class='content2-first-1'>
            ";
                $ava = avatar_dir_check($user['id']);
                echo "
                                    <img class='images1' src='$ava' alt='avatarimage'>
                                </div>

                                <div class='content2-first-2'>";

                echo "                <p class='content2-text' href=''>";
                echo  reading_user_name($user['id']);
                echo "               
                                    </p>
                    
                                    <img class='dots' src='https://img.icons8.com/material-outlined/50/000000/dots-loading--v7.png'>
                                </div> 
                                <div class='imgdiv'>

                    <p class='content2-text' href=''> $user->content</p> 
                    ";
                printf('<img src="%s" class="imgdiv-style" alt="">', $image);

                echo "
                                </div>

                                <div class='icons'>
                                    <img class='icons1' src='./picture/heart.png' alt=''>
                                    <img class='icon2' src='./picture/network.png' alt=''>
                                </div>
                            

                    
                                <div class='likes'>
                ";
                echo      time_check($check, $dateDiff, $timeDiff);

                echo '
                                </div>
                        </div>
            </div>
            </section> ';
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

        ?>


    </main>
    <aside>
    </aside>

    <!--Cookie javascript file-->
    <script src="cookies_content.js"></script>
</body>

</html>