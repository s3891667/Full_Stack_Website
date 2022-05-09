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
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
  
    <script src="./JS/bootstrap.min.js"></script>

    <title>Homepgae</title>
</head>

<body>
    
<nav class="navbar fixed-bottom navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">InstaKilogram</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link" href="#">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Sign Up</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Log In</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

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