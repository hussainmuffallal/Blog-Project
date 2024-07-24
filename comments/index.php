

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
      

      
      <div class="mb-2 fw-bold">Leave a Comment</div>
            <form action="dbcomments.php" method="POST" class="row g-3">
                <div class="col-10">
                    <input type="textarea" class="form-control" id="description" name="description" placeholder="Type your comment here" required></input>
                </div>
                <div class="col-3">
                    <button type="submit" class="btn btn-success">Comment</button>
                </div>
            </form>

            <div class="container-md text-center mt-5" style="max-width: 700px;">
        <div class="mb-4 hero-text">My Comments</div>
        <div class="card-container">



                <?php
                // Retrieve the user's first name from the session
                $firstName = $_SESSION['userloggedin'];


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
                        $sql = "SELECT CommentId,PostId,CreatedDate,Description FROM comment WHERE email = '$email' ORDER BY CreatedDate DESC";
                   }
                    $sql = "SELECT CommentId,PostId,CreatedDate,Description FROM comment WHERE email = '$email' AND Description LIKE '%$search%' ORDER BY CreatedDate DESC";
                }else{
                    // SQL query to select the desired columns from the "post" table
                    $sql = "SELECT CommentId, PostId, CreatedDate, Description FROM comment WHERE email = '$email' ORDER BY CreatedDate ASC";
                }

                // Execute the query
                $result = $conn->query($sql);

                // Check if the query was successful
                if ($result) {
                    // Fetch the rows
                    while ($row = $result->fetch_assoc()) {
                        $lname = $row["Description"];
                        $cdate = date("Y-m-d", strtotime($row["CreatedDate"])); // Extract date portion from CreatedDate
                        $postId = $row["PostId"];
                        
                        // Retrieve the user's first name from the email
                        $sql2 = "SELECT FirstName FROM user WHERE email = '$email'";
                        $result2 = $conn->query($sql2);

                        if ($result2 && $result2->num_rows > 0) {
                            $userRow = $result2->fetch_assoc();
                            $firstName = $userRow["FirstName"];
                        }

                        // Display the data in table rows
                        echo "<div class='card'><div class='card-body'><h5 class='card-title'>$firstName commented:</h5><p class='card-text'>$lname</p><p class='card-text'>$cdate</p></div></div>";
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

        

       

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>