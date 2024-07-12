<?php
    session_start();
    if(!isset($_SESSION['userloggedin'])) {
        header('Location: login.php');
        exit();
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>One Stop. Employee Cloud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--Favicons-->
    <link rel="apple-touch-icon" sizes="180x180" href="img/fav/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="img/fav/site.webmanifest">
    <style>

      body {
            background-color: #fcf9cd;  
      }

      .hero-text {
            text-align: center;
            color: #333;
            font-size: 4rem;
            margin-top: 5vh;
            font-weight: 100;
        }

        .navbar-brand img {
            border-radius: 5px;
        }
        
        .dash-card-text {
            text-align: center;
            color: #333;
            font-size: 2rem;
            margin-top: 1vh;
            font-weight: 100;
            text-decoration: none;
        }

        .dash-card-1, .dash-card-2 {
            text-decoration: none;
            transition:all 0.5s;
        }

        .dash-card-1:hover {
            box-shadow: 0 0 10px rgba(0, 172, 255, 0.5);
            transform: scale(1.02);
        }

        .dash-card-2:hover {
            box-shadow: 0 0 10px rgba(2, 2, 136, 0.5);
            transform: scale(1.02);
        }

    </style>
</head>
  <body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php"><img src="img/favicon_io/favicon-32x32.png" alt="logo"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <a href="logout.php" class="btn btn-outline-danger" >Logout <img src="img/Logout24.png"></a>
            </form>
          </div>
        </div>
      </nav>
      
      <div class="container-md text-center mt-5" style="max-width: 700px;">
        <div class="mb-4 hero-text">My Blogs</div>

        <div class="row">
            <a class="col-4 dash-card-1 card p-3 rounded-5" style="width: 175px;" href="#">
            <img src="img/dashimg/favicon_io (4)/android-chrome-192x192.png" class="card-img-top" alt="..."/>
            <h3 class="dash-card-text">Notepad</h3>
            </a>
            <a class="col-4 dash-card-2 card p-3 rounded-5" style="width: 175px; margin-left: 20px" href="#">
            <img src="img/Task.png" class="card-img-top" alt="..."/>
            <h3 class="dash-card-text">Tasks</h3>
            </a>   
      </div>
    </div>

   

    
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  

    </body>
</html>