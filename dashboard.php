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
            border-radius: 25px;
            border: 1px solid #ccc;
            background-color: cornsilk;
            transition: all 0.5s;
        }

        .card-body {
            text-align: center;
        }
        
        .card-title {
            font-weight: bold;
            font-size: 1.5rem;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(19, 2, 250,0.2);
            transform: scale(1.02);
            cursor: pointer;
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
              <li class="nav-item">
                <a class="nav-link text-white active" aria-current="page" href="dashboard.php">Dashboard</a>
              </li>
            </ul>
            
              <a href="posts/index.php" class="btn btn-dark" >Create a Post</a>&nbsp;&nbsp;
              <a href="logout.php" class="btn btn-outline-danger" >Logout <img src="img/Logout24.png"></a>
            
          </div>
        </div>
      </nav>
      
      <div class="container-md text-center mt-5" style="max-width: 700px;">
        <div class="mb-4 hero-text">My Blogs</div>
        <div class="card-container">



                <?php
                // Connect to the MySQL database
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "blog_project";
                $email=$_SESSION['userloggedin'];

                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                //Check if a search request is made
                if(isset($_GET['search'])){
                    $search=$_GET['search'];
                    if($search==''){
                        //All the records
                        $sql = "SELECT PostId,CreatedDate,Title,Content FROM post WHERE email = '$email' ORDER BY CreatedDate DESC";
                   }
                    $sql = "SELECT PostId,CreatedDate,Title,Content FROM post WHERE email = '$email' AND Title LIKE '%$search%' ORDER BY CreatedDate DESC";
                }else{
                    // SQL query to select the desired columns from the "post" table
                    $sql = "SELECT PostId,CreatedDate,Title,Content FROM post WHERE email = '$email' ORDER BY CreatedDate ASC";
                }

                // Execute the query
                $result = $conn->query($sql);

                // Check if the query was successful
                if ($result) {
                    // Fetch the rows
                    while ($row = $result->fetch_assoc()) {
                        $lname=$row["Title"];
                        $cdate=$row["CreatedDate"];
                        // Display the data in table rows
                        echo "<a href='viewBlog.php?Title=" . urlencode($lname) . "&cdate=" . urlencode($cdate) . "'><div class='card'>";
                        echo "<h2 class='text-decoration: none'>" . $row["Title"] . "</h2>";
                        echo "<p>" . $row["Content"] . "</p>";
                        echo "<p>" . $row["CreatedDate"] . "</p>";
                        echo "<a class='btn mb-3 btn-outline-danger' href='dbposts.php?delid=" . $row["PostId"] . "&title=" . urlencode($lname) . "&cdate=" . urlencode($cdate) . "'>Delete</a>";                        echo "</div></a>";
                    }
                    
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                // Close the connection
                $conn->close();
                ?>
            </tbody>
        </table>  
      </div>


    </div>

   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  

    </body>
</html>