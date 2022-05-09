<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
    <title>Homepgae</title>
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
                        <li><a href="./signUp.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a href="./login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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
            <img class="img_des" src="./picture/imgconnect.jpg" alt="intropic">
        </div>
    </header>
    <main>


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