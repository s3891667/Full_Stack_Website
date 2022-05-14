<!DOCTYPE html>
<html lang="en">

<?php
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
  <script src="./JS/bootstrap.min.js"></script>
  <script src="./JS/bootstrap.js"></script>
  <title>Homepage</title>
</head>

<body>
  <header>
    <div>
    <header>
    <div>
      <!--link to address that user want-->
      <nav id="colorsetup1" class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
          <a class="navbar-brand text-white" href="#">InstaKilogram</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link text-white" href="./signUp.html">Sign Up</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="./login.php">Log In</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="./Menu.html">Menu</a>
              </li>
            </ul>
            <!--Search information-->
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn  btn-light" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
  </header>
    </div>

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="./picture/3.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="./picture/ava.jpeg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

  </header>
  <main>
    <?php
    include "./user_resources_handling.php";
    $xml = simplexml_load_file("./posts.xml");
    foreach ($xml->user as $user) {
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
                            <img class='icons1' src='./picture/heart.png' alt='Love'>
                            <img class='icon2' src='./picture/network.png' alt='Connection'>
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
