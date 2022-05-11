<?php
//print out all the posts from the xml files;
session_start();
include "./user_resources_handling.php";
$xml = simplexml_load_file("./posts.xml");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
<header>
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
            <li>
              <a href="./home.php"><span class="glyphicon glyphicon-user"></span>Home</a>
            </li>
            <li>
              <a href="./logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>

    <div class="container">
      <form action="/action_page.php">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search" name="search" />
          <div class="input-group-btn">
            <button class="btn btn-default" type="submit">
              <i class="glyphicon glyphicon-search"></i>
            </button>
          </div>
        </div>
      </form>
    </div>


  </header>
    <div class="container square-box d-flex justify-content-center">
        <form action="./user_resources_handling.php" method="post" enctype="multipart/form-data">
            <?php
            echo " <div>
            <img class='images1' src='{$_SESSION['avatar']}' alt='avatarimage'>
            </div>";
            ?>
            <div id="col-auto" class="form-floating mb-3  ">
                <textarea class="form-control" placeholder="Leave a comment here" id="text" name="contents"></textarea>
                <label for="floatingTextarea">How do you feel today ?</label>
            </div>
            <div class="col-auto form-check">
                <input class="form-check-input" type="radio" id="flexRadioDefault2" name="checker" value="one">
                <label class="form-check-label" for="flexRadioDefault2">
                    Default mode
                </label>
            </div>
            <div class=" col-auto form-check">
                <input class="form-check-input" type="radio" id="flexRadioDefault1" name="checker" value="two">
                <label class="form-check-label" for="flexRadioDefault1">
                    Global mode
                </label>
            </div>
            <div class="mb-3 form-group">
                <div class="custom-file">
                    <label id="avatar_label" class="custom-file-label" for="customFile">Choose your pics</label>
                    <input name="picture" class="custom-file-input" type="file" id="avatar">
                </div>
            </div>
            <button type='submit' class="btn btn-primary">Post</button>
        </form>
    </div>

    <?php
    foreach ($xml->user as $user) {
        $tmp = $_SESSION['id'];
        $compare = "user{$tmp}";
        if ($compare == $user['id']) {
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
                                    <img class='images1' src='{$_SESSION['avatar']}' alt='avatarimage'>
                                </div>

                                <img class='dots' src='https://img.icons8.com/material-outlined/50/000000/dots-loading--v7.png'>
                                <div class='content2-first-2'>
                
                                    <p class='content2-text' href=''>{$_SESSION['user']}</p>
                    
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
                            

                    
                                <div class='timedisplay'>
                ";

            echo      time_check($check, $dateDiff, $timeDiff);
            echo '
                                </div>
                        </div>
            </div>
            </section> ';
        }
    }
    ?>
    <footer>
        <div>
            <a class="footer_tab" href="#">About Us</a>
            <a class="footer_tab" href="#">Copyright</a>
            <a class="footer_tab" href="#">Privacy</a>
            <a class="footer_tab" href="#">Contact Information</a>
        </div>
    </footer>
</body>

</html>