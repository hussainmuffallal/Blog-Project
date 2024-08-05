<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blogs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--Favicons-->
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <style>
      body {
          background-image: linear-gradient(45deg, #d3d1ff, #d1ffd9);  
      }

      .hero-text {
          text-align: center;
          color: #000;
          font-size: 4rem;
          margin-top: 5vh;
          font-weight: 100;
      }

      .logo {
          width: 100px;
      }

      .navbar {
          padding: 10px 10%;
          display: flex;
          justify-content: space-between;
      }

      .btn {
          margin-left: 20px;
      }

      .card-container {
          display: flex;
          flex-wrap: wrap;
          justify-content: center;
      }

      .card {
          width: 300px; /* Set the desired width for the cards */
          height: 500px; /* Set the desired height for the cards */
          margin-top: 60px;
          margin-bottom: 10px;
          margin-left: 30px;
          margin-right: 30px;
          padding: 20px;
          border-radius: 15px;
          align-items: center;
          background-color: #fff;
          transition: all 0.5s;
        
      }

      .card p {
          margin-bottom: 10px;
          flex-grow: 1; /* Allow the paragraph to grow and fill the remaining space */
      }


      .card:hover {
          box-shadow: 0 0px 20px 0 rgba(0, 0, 255,0.5);
          transform: scale(1.01);
          cursor: pointer;
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
                  <a class="nav-link active" href="blogs.php">Blogs</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="createPost.php">Create a Post</a>
                </li>
              </ul>
              <a class="btn btn-outline-primary" href="register.php">Sign Up</a>&nbsp;&nbsp;
              <a class="btn btn-outline-success" href="login.php">Login</a>
            </div>
              
          </div>
        </nav>
      
      
      <div class="text-center hero-text">The Blogs</div>
        <div class="card-container">
      

          <?php
          // Connect to the MySQL database
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "blog_project";

          
          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);

          // Check connection
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }

          // Retrieve all posts from the database
          $sql = "SELECT * FROM post ORDER BY CreatedDate DESC";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              // Output data of each row
              while($row = $result->fetch_assoc()) {
                echo "<div class='card-container'>";
                echo "<a href='viewBlog.php?PostId=" . $row['PostId'] . "'style='text-decoration: none; color: #333'><div class='card'>";
                echo "<h2>" . $row['Title'] . "</h2>";
                echo "<div class='content' style='overflow: hidden;'>";
                echo "<p>" . substr($row["Content"], 0, 300) . "...<a href='viewBlog.php?PostId=" . $row['PostId'] . "'>Read More</a></p>";
                echo "</div>";
                echo "<p>Posted on " . date('Y-m-d', strtotime($row['CreatedDate'])) . "</p>";
                echo "</div></a>";
                echo "</div>";
              }
            } else {
              echo "There are no posts available.Start creating some!";
            } 

          $conn->close();
          ?>
        </div>
      </div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>