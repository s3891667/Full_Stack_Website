<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="data.js">
    <link rel="stylesheet" href="./login.php">
    <title>InstaKilogram</title>
</head>
<body>
  <section class="container-fluid">
    <section class="row justify-content-center">
      <section class="col-12 col-sm-6 col-md-3">  
          <form action="./login.php" class="form-container" method="post" onsubmit="" >
              <h1 class="text-center">Login</h1>
            <div class="form-group ">
              <label for="inputEmail3" class="col-form-label">Email</label>
                <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email address" >
            </div>
            <div class="form-group">
              <label for="inputPassword3" class=" col-form-label">Password</label>
            <input type="password" class="form-control" id="inputPassword3" placeholder="Password" >
            </div>
            <div class="form-check mt-3">
              <input class="form-check-input " type="checkbox" id="autoSizingCheck">
              <label class="form-check-label" for="autoSizingCheck">
                Remember me
              </label>
            </div>  
            <div class ="d-grid gap-2 mt-3">
              <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
            <div class="text-center mt-3">
              <a href="signUp.html">Sign up for InstaKilogram </a>
              <p class="d-inline">  .  </p>
              <a href="forgotpassword.html">Forgotten your password ?</a>
            </div>
          </form>
      </section>
    </section>
  </section>   
</body>
</html>