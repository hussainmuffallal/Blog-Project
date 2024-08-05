<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--Favicons-->
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <style>
        body {
            background-image: linear-gradient(45deg, #8bd8fc, #b1ff8a);
            min-height: 100vh;
        }

        .hero-text {
            text-align: center;
            color: #000;
            font-size: 3rem;
            margin-top: 5vh;
            font-weight: 50;
        }

        .navbar {
            padding: 10px 10%;
            display: flex;
            justify-content: space-between;
        }
        
        .logo {
            width: 100px;
        }
        
        .btn {
            margin-left: 20px;
        }
        
    </style>
  </head>
  <body>


      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php"><img src="img/blogicon.png" class="logo" alt="logo"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav nav-underline">
              <li class="nav-item">
                <a class="nav-link" href="blogs.php">Blog</a>
              </li>
            </ul>
              <a class="btn btn-outline-primary" href="register.php">Sign Up</a>
              <a class="btn btn-outline-success active" href="login.php">Login</a>
            </form>
          </div>
        </div>
      </nav>

      <div class="container-md text-center mt-5" style="max-width: 400px;">
        <div class="mb-4 hero-text">Log In</div>
        <form action="dblogin.php" method="POST">
          <div class="mb-3">
              <input type="email" name="email" class="form-control text-center fs-5 fw-light" id="exampleInputEmail1" onfocus="hideAlertBox()" aria-describedby="emailHelp" placeholder="Email address" required>
          </div>
          <div class="mb-3">
              <input type="password" name="pass" class="form-control text-center fs-5 fw-light" id="password" onfocus="hideAlertBox()" placeholder="Password" required>
          <div class="mt-1 mb-3">
              <a href="#">Forgot Password?</a>
          </div>

          <button type="submit" class="btn btn-primary fs-5 fw-light">Login</button> 
        </form>
        <div class="text-center">
          Don't have an account? <a href="register.php">Register</a>
        </div>

        <?php

        if(isset($_GET['error1'])) {
          echo('
            <div id="alertbox" class="alert alert-danger mt-3" role="alert">
              Invalid email or user does not exist.
          </div>');
        }
        
        if(isset($_GET['error2'])) {
          echo('
            <div id="alertbox" class="alert alert-danger mt-3" role="alert">
              Invalid password. Please try again.  
          </div>');
        }
        
        ?>

      </div>
      
      <script>
        function hideAlertBox() {
          const alertBox = document.getElementById("alertbox");
          alertBox.style.display = "none";
        }
      </script>
    
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>