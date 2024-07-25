<?php
    session_start();
    if(!isset($_SESSION['adminloggedin'])) {
        header('Location: login.php');
        exit();
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
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

        .card {
            display: inline-block;
            width: 30%; /* Adjust the width as needed */
            margin: 10px; /* Adjust the margin as needed */
        }

        .card-body {
            text-align: center;
        }
        
        .card-title {
            font-weight: bold;
            font-size: 1.5rem;
        }
        
    </style>
</head>
  <body>

    <nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
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
            
              <a href="logout.php" class="btn btn-outline-danger" >Logout <img src="img/Logout24.png"></a>
            
          </div>
        </div>
      </nav>
      
      <div class="container-md text-center mt-5" style="max-width: 700px;">


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

          // Get the user's email from the request or session
          $userEmail = $_GET['email']; // Replace with the appropriate method to get the user's email

          // Query the database to retrieve the user's firstname
          $query = "SELECT firstname FROM user WHERE email = ?";
          $stmt = $conn->prepare($query);
          $stmt->bind_param("s", $userEmail);
          $stmt->execute();
          $result = $stmt->get_result();

          // Check if a row was returned
          if ($result->num_rows > 0) {
              // Fetch the firstname from the result
              $row = $result->fetch_assoc();
              $firstname = $row['firstname'];
              
              // Display the user's firstname on top of the page
              echo '<h1> ' . $firstname . '\'s Posts</h1>';
          }


          // Get the user's email from the request or session
          $userEmail = $_GET['email']; // Replace with the appropriate method to get the user's email

          // Query the database to retrieve the user's posts
          $query = "SELECT * FROM post WHERE email = ?";
          $stmt = $conn->prepare($query);
          $stmt->bind_param("s", $userEmail);
          $stmt->execute();
          $result = $stmt->get_result();

          // Check if any posts were found
          if ($result->num_rows > 0) {
              // Display the posts
              while ($row = $result->fetch_assoc()) {
                echo '<div class="card">';
                echo '<h2 class="card-title">' . $row['Title'] . '</h2>';
                echo '<p class="card-content">' . $row['Content'] . '</p>';
                echo '<p class="card-date">Posted on: ' . $row['CreatedDate'] . '</p>';
                echo '</div>';
              }
          } 

    // Close the database connection    
          $conn->close();
          ?>
            </tbody>
        </table>  
      </div>

      

    </div>

   

    
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  

    </body>
</html>