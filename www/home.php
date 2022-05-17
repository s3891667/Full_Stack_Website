<!DOCTYPE html>
<html lang="en">
<?php
//start session
session_start();
//alert to avoid guest users from access to homepage
if (!isset($_SESSION['user'])) {
    echo "<SCRIPT>
    alert('Please login your account !');
    window.location.href='index.php';
    </SCRIPT>";
    die();
}

//this function will display when user first logged in
function welcome()
{   //$_SESSION['checker] will ensure the welcome banner only display once
    if ($_SESSION['checker']) {
        echo "
      <div id= 'alert' class='alert alert-success' role='alert'>
      <strong>Welcome </strong>";
        echo $_SESSION['user'];
        echo " to InstaKilogram !
      <a href='#' onclick = 'hide_alert()'; id= 'icon'
      class='close' data-dismiss='alert' aria-label='close'>&#10005;</a>
      </div>
      ";
        $_SESSION['checker'] = false;
    }
}

?>
<script>
    //close the welcome banner
    function hide_alert() {
        document.getElementById("alert").style.visibility = "hidden";
        location.reload();
    }
</script>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/carousel.css">
    <script src="../JS/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/cookies_content.css">
    <title>Homepage</title>
</head>

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
                            <a class="nav-link text-white" href="./user_profile.php">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="./logout.php">Logout</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn  btn-light" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        <?php welcome();  ?>


    </header>
    <main>
        
            <div class="container d-flex justify-content-center ">
                <div class="card">
                    <img class="pic-des" src="../picture/caro1.png" alt="">
                </div>
                <div class="card">
                    <img class="pic-des" src="../picture/caro2.png" alt="">
                </div>
                <div class="card">
                    <img class="pic-des" src="../picture/caro3.png" alt="">
                </div>
                <div class="card">
                    <img class="pic-des" src="../picture/caro4.png" alt="">
                </div>
            </div>
                    <?php
                    include "../dataProcessing/user_resources_handling.php";
                    $xml = simplexml_load_file("../database/posts.xml");
                    foreach ($xml->user as $user) {
                        //check type to display protect the private posts and display public + internal posts
                        if ("$user->status" == "Public" || "$user->status" == "Internal") {
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
    <section  class = 'posts'>
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
    <div class="empty_box">
        <h1>EMPTYBOX</h1>
        <h1>EMPTYBOX</h1>
    </div>
    <footer>
    <div>
      <a class="footer_tab" href="Menu.html">About Us</a>
      <a class="footer_tab" href="Menu.html">Copyright</a>
      <a class="footer_tab" href="Menu.html">Privacy</a>
      <a class="footer_tab" href="Menu.html">Contact Information</a>
    </div>
    <script src="../JS/cookies_content.js"></script>
</body>

</html>
