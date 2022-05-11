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
    <title>User Profile</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
<header>
    <div>
    <nav id="colorsetup1" class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="#">InstaKilogram</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-white" href="#">Sign Up</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">Log In</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn  btn-light" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
</div>
  </header>

  <main>
    <div class="user-profile-box"> 
      <!-- edit this fucking class -->
        <form action="./user_resources_handling.php" method="post" enctype="multipart/form-data">
            <div class="ava-box">
            <?php
            echo " <div>
            <img class='images1' src='{$_SESSION['avatar']}' alt='avatarimage'>
            </div>";
            ?>
            </div>
            <div class="box-des">
            <div id="col-auto" class="form-floating mb-3  ">
                <textarea class="form-control" placeholder="Leave a comment here" id="text" name="contents"></textarea>
                <label for="floatingTextarea">How do you feel today ?</label>
            </div>
</div>
            <div class="box-des">
            <div class="col-auto form-check">
                <input class="form-check-input" type="radio" id="flexRadioDefault2" name="checker" value="1">
                <label class="form-check-label" for="flexRadioDefault2">
                    Internal mode
                </label>
            </div>
            <div class=" col-auto form-check">
                <input class="form-check-input" type="radio" id="flexRadioDefault1" name="checker" value="2">
                <label class="form-check-label" for="flexRadioDefault1">
                    Public mode
                </label>
            </div>
            <div class="col-auto form-check">
                <input class="form-check-input" type="radio" id="flexRadioDefault2" name="checker" value="3">
                <label class="form-check-label" for="flexRadioDefault2">
                    private mode
                </label>
            </div>
</div>
          
    
            
                    <label id="avatar_label"  class="box-des2" for="customFile"></label>
                    <input name="picture" class="custom-file-input" type="file" id="avatar">
                
          
            <div class="box-des">
            <button type='submit' class="btn btn-secondary">Post</button>
</div>
          </form>
    </div>
    <hr>
    </main>

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
    <div class="empty_box">
        <h1>EMPTYBOX</h1>
        <h1>EMPTYBOX</h1>
    </div>
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