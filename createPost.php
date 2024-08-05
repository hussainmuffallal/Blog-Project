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
    <title>Create a Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--Favicons-->
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <style>
      body {
            background-image: linear-gradient(45deg, #d3d1ff, #d1ffd9);
            min-height: 100vh;
      }

      .hero-text {
            text-align: center;
            color: #000;
            font-size: 4rem;
            margin-top: 5vh;
            margin-bottom: 2vh;
            font-weight: 100;
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

        .container {
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 0 auto;
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
                <a class="nav-link" href="blogs.php">Blogs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="dashboard.php">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="createPost.php">Create a Post</a>
              </li>
            </ul>
            
            <a href="logout.php" class="btn btn-outline-danger" >Logout <img src="img/Logout24.png"></a>

            </form>
          </div>
        </div>
      </nav>
      
      <div class="hero-text">Create a Post</div>
      <div class="container">
        <form action="dbposts.php" method="POST">
            <div class="mt-3 mb-3">
                <input type="text" class="form-control" id="title" onfocus="hideAlertBox()" name="title" placeholder="Title" required/>
            </div>
            <div class="mb-3">
                <input type="textarea" class="form-control" id="content" onfocus="hideAlertBox()" name="content" placeholder="Content" required></input>
            </div>
            <div>
                <button type="submit" class="btn btn-success">Create</button>
            </div>
        </form>
      </div>

        <?php

        if(isset($_GET['error'])) {
          echo('
            <div id="alertbox" class="alert alert-danger mt-3" role="alert">
              This title already exists
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