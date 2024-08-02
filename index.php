<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--Favicons-->
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <style>
        body {
            background-color: white;
        }

        .cta {
            padding: .875rem 1.25rem;
            background: #ff8000;
            font-weight: 500;
            font-size: .8125rem;
            text-decoration: none;
            color: #fff;
            border-radius: 4px;
            border: 1px solid #ff8000;
            font-family: "Roboto", sans-serif;
        }

        .cta:hover {
            background: #000;
            color: #ff8000;
        }

        .start-card {
            height: 400px; /* Set the desired height for the cards */
            background-color: lightblue;
            
        }

        .card-container {
          display: inline-block;
          flex-wrap: wrap;
          justify-content: center;
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
          background-color: #fab6cd;
          transition: all 0.5s;
          
        }

        .card:hover {
            transform: scale(1.01);
            box-shadow: 0 0 20px rgba(255, 0, 0, 0.5);
            cursor: pointer;

        }

        .middle-card {
            height: 400px; /* Set the desired height for the cards */
            background-color: #eab0f7;
        }

        .end-card {
            height: 400px; /* Set the desired height for the cards */
            background-color: lightgreen;
        }

        
        .ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
            position: fixed;
            top: 0;
            width: 100%;
        }

        .social-icons {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        .social-icons li {
            margin: 0 10px;
        }

        .social-icons a {
            color: #333;
            text-decoration: none;
        }

        .social-icons i {
            font-size: 24px;
        }

        .links {
          list-style: none;
          margin: 0;
          padding: 0;
          display: column;
        }

        .links li {
          margin-right: 20px;
        }

        .links li:last-child {
          margin-right: 0;
        }

        .links a {
          color: #fff;
          text-decoration: none;
        }

        .links a:hover {
          color: #ff8000;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: relative;
            width: 100%;
            bottom: 0;
        }

    </style>
</head>
  <body>
    
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php"><img src="img/favicon_io/favicon-32x32.png" alt="logo"></a>
          <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
              <li class="nav-item">
                <a class="nav-link text-black" href="blogs.php">Blogs</a>
              </li>
            </ul>
              <a class="btn btn-outline-success text-black" href="login.php">Login</a>

            </form>
          </div>
        </div>
      </nav>


    <div class="fs-1 text-center mt-5 text-black">Publish your passions, your way</div>


    <div class="text-center mt-5">
    <a class="cta ga-hero-cta" href="register.php">CREATE YOUR BLOG</a>
    </div>

    <div class="start-card fs-3 text-left mt-5  text-black">
      &nbsp;&nbsp;&nbsp;&nbsp;Choose the perfect design
      <div class="fs-4 text-left mt-5 text-black">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Create what you want and design what you need for your blog
      </div>
    </div>



    <?php
      // Connect to the MySQL database
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "blog_project";

      $conn = new mysqli($servername, $username, $password, $dbname);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // Retrieve the last four blogs from the database
      $sql = "SELECT * FROM post ORDER BY CreatedDate DESC LIMIT 4";
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
          echo "</div>";
      } else {
          echo "No blogs found.";
      }

      $conn->close();
    ?>

    <div class="middle-card fs-3 text-center mt-5 mb-5 text-black">
      Know your audience
    </div>

    <div class="end-card fs-3 text-center mt-5 mb-5 text-black">
      Join million of others  <img src="img/cardimg4.jpg" alt="image" style="width: 500px; height: 400px;">
    </div>

    <div class="mt-5 fs-3 fw-bold text-center mb-5 ">
      More exciting features coming soon...
    </div>


    <footer>
        <div class="footer">
          <section>
            <ul class="links mb-5">
              <li><img src="img/favicon_io/favicon-32x32.png" alt="logo"></li>
              <li><a href="index.php">Home</a></li>
              <li><a href="blogs.php">Blogs</a></li>
              <li><a href="login.php">Login</a></li>
              <li><a href="register.php">Register</a></li>
            </ul>
            <ul class="social-icons mb-2">
              <li><a href="https://twitter.com/"><img src="img/twitter.png" alt="twitter" style="width: 32px; height: 32px;"></a></li>
              <li><a href="https://www.facebook.com/"><img src="img/facebook.png" alt="facebook" style="width: 32px; height: 32px;"></a></li>
              <li><a href="https://www.instagram.com/"><img src="img/instagram.png" alt="instagram" style="width: 32px; height: 32px;"></a></li>
              <li><a href="https://www.linkedin.com/"><img src="img/linkedin.png" alt="linkedin" style="width: 32px; height: 32px;"></a></li>
            </ul>
          </section>
            © 2024 Blog Platform. All rights reserved.
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>