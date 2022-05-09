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
            <img class="img_des" src="./picture/imgconnect.jpeg" alt="intropic">
        </div>
    </header>
    <main>
    <section>
        <!-- Post -->
        <div>
            <!-- Logo and Username-->
            
            <span>
                <!-- Logo -->
                
            </span>
            <span>
                <!-- Username -->
            </span>
        </div>
        <div>
            <!-- Picture -->
        </div>
        <div>
            <!-- Caption -->
        </div>
        <div>
            <!-- Like -->
            <span>
                <!-- Like -->
            </span>
            <span>
                <!-- Share Button -->
            </span>
        </div>
    </section>
    <section>
    <div class="content2">
                <div class="content2_pad">
                    <div class="content2-first">
                        <div class="content2-first-1">
                            <img class="images1" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTrWxMZDuo3LPhZRj3awd8koZQH9q0RgYYbxg&amp;usqp=CAU" alt="">

                        </div>
                        <div class="content2-first-2">
                            <p class="content2-text" href="">Millionaire</p>
                            <img class="dots" src="https://img.icons8.com/material-outlined/50/000000/dots-loading--v7.png">
                        </div>
                        <hr>
                        <div class="imgdiv">
                            <img class="imgdiv-style" src="photo2.jpg" alt="">
                        </div>
                        <div class="icons">
                            <img class="icons1" src="icons1.PNG" alt="">
                            <img class="icon2" src="icon2.PNG" alt="">
                        </div>
        
                        <br>
                        <div class="likes">
                            <h5 class="time-text">7 HOURS AGO</h5>
                        </div>


                    </div>
                    
                </div>
                
    
            </div>
    </section>
    </main>
    <aside>
        <!-- People follow-->
    </aside>
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