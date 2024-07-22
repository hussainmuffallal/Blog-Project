<?php
    session_start();
    if(!isset($_SESSION['userloggedin'])) {
        header('Location: ../login.php');
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
    <link rel="apple-touch-icon" sizes="180x180" href="../img/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
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

        
    </style>
</head>
  <body>
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="../index.php"><img src="../img/favicon_io/favicon-32x32.png" alt="logo"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link text-white" href="../blogs.php">Blogs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" aria-current="page" href="../dashboard.php">Dashboard</a>
              </li>
            </ul>
            
            <a href="../logout.php" class="btn btn-outline-danger" >Logout <img src="../img/Logout24.png"></a>

            </form>
          </div>
        </div>
      </nav>
      

      <div class="mb-2 hero-text">Create a Post</div>
        <form action="dbposts.php" method="POST" class="row g-3">
            <div class="col-8">
                <input type="text" class="form-control" id="title" onfocus="hideAlertBox()" name="title" placeholder="Title" required/>
            </div>
            <div class="col-10">
                <input type="textarea" class="form-control" id="content" onfocus="hideAlertBox()" name="content" placeholder="Content" required></input>
            </div>
            <div class="col-3">
                <button type="submit" class="btn btn-success">Create</button>
            </div>
        </form>

        <?php

        if(isset($_GET['error'])) {
          echo('
            <div id="alertbox" class="alert alert-danger mt-3" role="alert">
              This title already exists
          </div>');
        }

        ?>

        <script>
          function hideAlertBox() {
            const alertBox = document.getElementById("alertbox");
            alertBox.style.display = "none";
          }
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>