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
            background-color: #7474b3;  
      }

      .hero-text {
            text-align: center;
            color: #333;
            font-size: 4rem;
            margin-top: 5vh;
            font-weight: 100;
        }

        .card-container {
          display: inline-block;
          flex-wrap: wrap;
          justify-content: left;
          flex-direction: row;
        }

        

        .card {
          width: 250px; /* Set the desired width for the cards */
          height: 400px; /* Set the desired height for the cards */
          margin-top: 60px;
          margin-bottom: 10px;
          margin-left: 55px;
          margin-right: 10px;
          border-radius: 25px;
          align-items: center;
          background-color: #ccc;
          transition: all 0.5s;
          
        }


        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(255, 0, 0,0.2);
            transform: scale(1.01);
            cursor: pointer;
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
                <a class="nav-link text-white active" href="blogs.php">Blogs</a>
              </li>
            </ul>
            
              <a class="btn btn-outline-primary text-white" href="register.php">Sign Up</a>&nbsp;&nbsp;
              <a class="btn btn-outline-success text-white" href="login.php">Login</a>

            </form>
          </div>
        </div>
      </nav>
      <div class="text-center hero-text text-white">The Blogs</div>
      

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
            } 

          $conn->close();
          ?>


    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>