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
            background-image: linear-gradient(45deg, #d3d1ff, #d1ffd9);  
        }

        .hero {
            width: 100%;
            min-height: 100vh;
            padding: 10px 10%;
            overflow: hidden;
            position: relative;
        }

        .logo {
            width: 100px;  
        }

        .content {
            margin-top: 10%;
            max-width: 600px;
        }

        .content h2 {
            font-size: 70px;
            color: #222;
        }

        .content p {
            margin: 10px 0 30px;
            color: #333;
            animation-delay: 0.5s;
        }

        .cta {
            padding: .875rem 1.25rem;
            background-image: linear-gradient(45deg, #0303fc , #00ff1a );
            font-weight: 500;
            font-size: .8125rem;
            text-decoration: none;
            color: #fff;
            border-radius: 4px;
            font-family: "Roboto", sans-serif;
            animation-delay: 1s;
        }

        .cta:hover {
            background: #000;
            color: #fff;
        }

        .feature-img {
            width: 530px;
            position: absolute;
            bottom: 40px;
            right: 10%;
        }

        .feature-img.anim {
            animation-delay: 0.7s;
        }

        .anim {
            opacity: 0;
            transform: translateY(40px);
            animation: fadeIn .5s forwards;  
        }

        @keyframes fadeIn {
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .start-hero {
            margin-top: 5%;
            margin-bottom: 8%;
            width: 100%;
            min-height: 80vh;
            padding: 10px 10%;
            overflow: hidden;
            position: relative;
        }

        .start-content {
            margin-top: 25%;
            max-width: 600px;
            
        }

        .start-content h3 {
            font-size: 30px;
            color: #222;
        }

        .start-content p {
            margin: 10px 0 30px;
            color: #333;
            animation-delay: 0.5s;
        }

       .start-img {  
            width: 300px;
            height: 400px;
            position: absolute;
            bottom: 0;
            right: 10%;
            border-radius: 15px;
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
          margin-left: 25px;
          margin-right: 20px;
          padding: 20px;
          border-radius: 15px;
          align-items: center;
          background-color: white;
          transition: all 0.5s;
          position: relative;
        }

        .card p {
          margin-bottom: 10px;
          flex-grow: 1; /* Allow the paragraph to grow and fill the remaining space */
        }

        .card:hover {
            transform: scale(1.01);
            box-shadow: 0 0 20px rgba(0, 0, 255, 0.5);
            cursor: pointer;

        }

        .card-date {
            position: absolute;
            bottom: 30px;
            color: #999;
        }

        .end-hero {
            margin-bottom: 5%;
            width: 100%;
            min-height: 80vh;
            padding: 10px 10%;
            overflow: hidden;
            position: relative;
        }

        .end-content {
            margin-top: 25%;
            max-width: 600px;
            
        }

        .end-img {
            width: 500px;
            height: 400px;
            position: absolute;
            bottom: 0;
            right: 10%;
            border-radius: 15px;
        }

        .ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
            position: fixed;
            bottom: 0;
            top: 0;
            width: 100%;
        }

        .links {
          list-style: none;
          margin: 20px;
          padding: 0;
          display: column;
        }

        .links a {
          color: #fff;
          text-decoration: none;
        }

        .links a:hover {
          color: #0390fc;
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
      
    
  <div class="hero">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php"><img src="img/blogicon.png" class="logo" alt="logo"></a>
          <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav nav-underline ">
              <li class="nav-item">
                <a class="nav-link text-black" href="blogs.php">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-black" href="dashboard.php">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-black" href="#">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-black" href="#">Contact Us</a>
              </li>&nbsp;
            </ul> 
              <a class="btn btn-outline-success text-black" href="login.php">Login</a>
          </div>
        </div>
      </nav>
      <div class="content">
        <h2 class="anim">Publish your passions,<br> your way</h2>
        <p class="anim">Start creating your own blog with us and share your ideas.<br>
        Take it to the global community with us.</p>
        <a class="cta ga-hero-cta anim" href="register.php">CREATE YOUR BLOG</a>
      </div>
      <img src="img/indexbg1.jpg" class="feature-img anim">
    </div>
     

    <div class="start-hero">
      <div class="start-content">
        <h3 class="anim">Choose the perfect design</h3>
        <p class="anim">Create what you want and design what you need for your blog</p>
      </div>
        <img src="img/img1.png" class="start-img anim">
    </div>


    <div class="fs-2 fw-bold text-center">OUR BLOGS</div>
      <div class="card-container">
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
          $sql = "SELECT * FROM post ORDER BY CreatedDate DESC LIMIT 3";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              // Output data of each row
              while($row = $result->fetch_assoc()) {
                echo "<div class='card-container'>";
                echo "<a href='viewBlog.php?PostId=" . $row['PostId'] . "'style='text-decoration: none; color: #333'><div class='card'>";
                echo "<h3>" . $row['Title'] . "</h3>";
                echo "<div class='content' style='overflow: hidden;'>";
                echo "<p>" . substr($row["Content"], 0, 300) . "...<a href='viewBlog.php?PostId=" . $row['PostId'] . "'>Read More</a></p>";
                echo "</div>";
                echo "<div class='card-date'>Posted on " . date('Y-m-d', strtotime($row['CreatedDate'])) . "</div>";
                echo "</div></a>";
                echo "</div>";
              }
              echo "</div>";
          } else {
              echo "No blogs found.";
          }

          $conn->close();
        ?>
      </div>
    </div>

    <div class="end-hero">
      <div class="end-content">
        <h3>Join millions of others</h3>
      </div>
      <img src="img/cardimg4.jpg" class="end-img" alt="image">
    </div>

    <div class="mt-5 fs-3 fw-bold text-center mb-5 ">
      More exciting features coming soon...
    </div>


    <footer>
        <div class="footer">
          <section>
            <ul class="links mb-5">
              <li class="mb-2"><img src="img/favicon_io/favicon-32x32.png" alt="logo"></li>
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