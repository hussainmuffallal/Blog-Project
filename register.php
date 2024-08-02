<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--Favicons-->
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <style>
        body {
            background-image: url("img/2.png");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .hero-text {
            text-align: center;
            color: #333;
            font-size: 3rem;
            margin-top: 5vh;
            font-weight: 50;
        }

        .container-md {
            backdrop-filter: blur(25px);
            border-radius: 25px;
        }

    </style>
</head>
  <body>
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php"><img src="img/favicon_io/favicon-32x32.png" alt="logo"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link text-white" href="blogs.php">Blogs</a>
              </li>
            </ul>
            
              <a class="btn btn-outline-primary text-white active" href="register.php">Sign Up</a>&nbsp;&nbsp;
              <a class="btn btn-outline-success text-white" href="login.php">Login</a>

            </form>
          </div>
        </div>
      </nav>
      
      <div class="container-md text-center mt-5" style="max-width: 400px;">
        <div class="mb-4 hero-text text-white">Sign Up</div>
        <form action="dbregister.php" method="POST" onsubmit="return checkPasswordMatch()">
            <div class="mb-3 ">
                <input type="email" class="form-control text-center fs-5 fw-light" id="exampleInputEmail1" onfocus="hideAlertBox()" aria-describedby="emailHelp" name="email" placeholder="Email address" required>
                <div id="emailHelp" class="form-text text-white">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control text-center fs-5 fw-light" id="firstName" name="firstName" placeholder="First Name" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control text-center fs-5 fw-light" id="lastName" name="lastName" placeholder="Last Name" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control text-center fs-5 fw-light" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control text-center fs-5 fw-light" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password" required>
            </div>
            
            <button type="submit" class="btn btn-primary fs-5 fw-light mb-2">Register</button><br>
            <button type="reset" class="btn2 btn-primary">Clear</button>
        </form>
        <div class="text-center text-white">
          Already have an account? <a href="login.php">Login</a>
        </div>

        <?php

        if(isset($_GET['error1'])) {
          echo('
            <div id="alertbox" class="alert alert-danger mt-3" role="alert">
              User with this email already exists
          </div>');
        }

        if(isset($_GET['error2'])) {
          echo('
            <div id="alertbox" class="alert alert-danger mt-3" role="alert">
              Passwords do not match. Please re-enter.
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