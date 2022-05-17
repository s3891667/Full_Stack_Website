<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/login.css">
    <script src="../JS/cookies_content.js"></script>
    <title>InstaKilogram</title>
</head>
<body>
    
  <!--Login page require user to provide enough information before using our website-->
  <section class="form_box">
      <section class="container">
          <form action="../dataProcessing/data_check.php" class="form-horizontal" method="post">
              <h1 class="text-center">Login</h1>
            <div class="form-group ">
              <label for="inputEmail" class="col-form-label">Email</label>
                <input type="email"  name="useremail" class="form-control" id="inputEmail" placeholder="Email address" >
            </div>
            <div class="form-group">
              <label for="inputPassword" class=" col-form-label">Password</label>
            <input type="password" name="userpassword"   class="form-control" id="inputPassword" placeholder="Password" >
            </div>
            <div class="form-check mt-3">
              <input class="form-check-input " type="checkbox" id="autoSizingCheck">
              <label class="form-check-label" for="autoSizingCheck">
                Remember me
              </label>
            </div>
            <div class ="d-grid gap-2 mt-3">
              <button type="submit" onclick="" class="btn btn-dark button_des" name="signIn" >Sign in</button>
            </div>
            <div class="text-center mt-3">
              <a href="signUp.html" class="text_des">Sign up for InstaKilogram </a>
              <p class="d-inline"> .  </p>
              <a href="forgotpassword.html" class="text_des">Forgotten your password ?</a>
            </div>
          </form>
      </section>
    </section>
    <div class="form-horizontal button_des">
      <a href="./welcomehomepage.html" button type="button" class="btn btn-outline-secondary button_des2 form-control">Back To The Homepage</button>
    </div>
    <div class="wrapper"></div>
    <div class="cookie-container">
        <div>I use cookies</div>
        <p>My website uses cookies necessary for its basic <br>functioning. By continuing browsing, you consent <br>to
            my use of cookies and other technologies.
        </p>
        <button class="accept-button">I understand</button>
        <a href="#">Learn more</a>
    </div>
  </body>
</html>
