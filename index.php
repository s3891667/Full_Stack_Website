<!DOCTYPE html>
<html lang="en">

<?php 
  session_start();
  if (isset($_SESSION['user'])) {
    header("location: home.php");
  }
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="./css/bootstrap.css">
  <title>Homepage</title>
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
              <a href="./signUp.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
            </li>
            <li>
              <a href="./login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>
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

    <div class="img_dess">
      <img class="img_des" src="./picture/imgconnect.jpeg" alt="intropic">
    </div>

  </header>
  <main>
    <?php
    include "./user_resources_handling.php";
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
                    
            <div class='content2-first-1'>";
        $ava = avatar_dir_check($user['id']);
        echo "
                            <img class='images1' src='$ava' alt='avatarimage'>
                        </div>
                         
                        <div class='content2-first-2'> ";

        echo "                <p class='content2-text' href=''>";
        echo  reading_user_name($user['id']);
        echo "               
                            </p>
                            
                            </div> 
                            <div class='imgdiv'>
                            
                            <p class='content2-text' href=''> $user->content</p>";
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
  </main>
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