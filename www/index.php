<!DOCTYPE html>
<html lang="en">

<?php
//if the user have already logged in , they will redirect to home page
if (isset($_SESSION['user'])) {
  header("location: home.php");
}
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <script src="../JS/bootstrap.min.js"></script>
  <script src="../JS/bootstrap.js"></script>
  <script src="../JS/cookies_content.js"></script>
  <title>Homepage</title>
</head>

<script>
  // this js will display text on scroll 
  window.onscroll = function() {
    myFunction()
  };

  function myFunction() {
    if (document.documentElement.scrollTop > 300) {
      document.getElementById("welcome").className = "show";
    } else {
      document.getElementById("welcome").className = "hide";
    }
  }
</script>



<body>
  <header>
    <nav id="colorsetup1" class="navbar navbar-expand-lg navbar-light">
      <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">InstaKilogram</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link text-white" href="./signUp.html">Sign Up</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="./login.php">Login</a>
            </li>
          </ul>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn  btn-light" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>

  </header>
  <main>
    <img src="../picture/welcomehomepage.jpg" class="img-fluid" alt="welcome_image">
    <hr>
    <div id="welcome">
      <div class=" container d-flex badge bg-secondary justify-content-center">
        <span class="  fs-3 rounded-pill">
          Sign up to explore InstaKilogram with us
        </span>
      </div>
    </div>

    <?php
    include "../dataProcessing/user_resources_handling.php";
    //reading posts.xml to display for guest user
    $xml = simplexml_load_file("../database/posts.xml");
    foreach ($xml->user as $user) {
      //only display Public posts
      if ("$user->status" == "Public") {
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
    <section class = 'posts' >
    <div  class='user-profile-box'  >
                <div class='content2_pad'>

            <div class='content2-first-1'>";
        $ava = avatar_dir_check($user['id']);
        echo "
                            <img class='images1' src='$ava' alt='Hoang_avatar'>
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
                            <img class='icons1' src='../picture/heart.png' alt='Love'>
                            <img class='icon2' src='../picture/network.png' alt='Connection'>
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
  <?php
  echo "<div class='wrapper'></div>";
  echo "<div class='cookie-container'>";
  echo     "<div>I use cookies</div>";
  echo   "<p>My website uses cookies necessary for its basic <br>functioning. By continuing browsing, you consent <br>to
            my use of cookies and other technologies.
        </p>";
  echo "<button class='accept-button'>I understand</button>";
  echo "<a href='#'>Learn more</a>";
  echo "</div>";
  ?>
</body>

</html>