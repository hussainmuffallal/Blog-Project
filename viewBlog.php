<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Blog</title>
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

        .form-control {
            background-color: white;
            width: 50%;
            margin-left: 25%;
            margin-right: 25%;
        }

        .comment-button-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 10vh; /* Adjust this value as needed */
        }

        .comment-button {
            display: block;
            margin: 0 auto;
        }

        .container {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            margin-top: 50px;
            margin-bottom: 50px;
            margin-left: 25%;
            margin-right: 25%;
            width: 50%;
            text-align: center;
        }

        .container-md {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            margin-top: 50px;
            margin-bottom: 50px;
            margin-left: 25%;
            margin-right: 25%;
            width: 50%;
            text-align: center;
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
                <a class="nav-link" href="blogs.php">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="dashboard.php">Dashboard</a>
              </li>
            </ul>
            
              <a class="btn btn-outline-primary" href="register.php">Sign Up</a>&nbsp;&nbsp;
              <a class="btn btn-outline-success" href="login.php">Login</a>

            </form>
          </div>
        </div>
      </nav>
      
        <div class="container-md">
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

                
                // Get the value of $postid from the URL parameter
                if(isset($_GET['PostId'])){
                    $postid = $_GET['PostId'];
                } else {
                    $postid = '';
                }

                // Check if the 'CreatedDate' key exists in the array
                if (isset($row['CreatedDate'])) {
                    $cdate = date("Y-m-d", strtotime($row["CreatedDate"])); // Extract date portion from CreatedDate
                } else {
                    // Handle the case when the key is not present
                    $cdate = ''; // Or any other appropriate default value
                }

          
                //Check if a search request is made
                if(isset($_GET['search'])){
                    $search = $_GET['search'];
                    if($search == ''){
                        // All records query
                        $sql = "SELECT PostId, Title, Content FROM post WHERE Title = '$lname' ORDER BY PostId DESC";
                    } else {
                        // Search query
                        $sql = "SELECT PostId, Title, Content FROM post WHERE Title = '$lname' AND (Title LIKE '%$search%' OR Content LIKE '%$search%') ORDER BY PostId DESC";
                    }
                } else {
                    // Default query (show all records)
                    $sql = "SELECT PostId, Title, Content, CreatedDate FROM post WHERE PostId = '$postid' ORDER BY PostId DESC";
                }


                // Execute the query
                $result = $conn->query($sql);

                // Check if the query was successful
                if ($result) {
                    // Fetch the rows
                    while ($row = $result->fetch_assoc()) {
                        // Display the data in table rows
                        echo "<div class='text-center mt-5'>";
                        echo "<div class='fw-bold'>" . date('Y-m-d', strtotime($row['CreatedDate'])) . "</div>";
                        echo "<div class='mb-4 fw-bold'>" . $row["Title"] . "</div>";
                        echo "<div class='content'>" . $row["Content"] . "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }


                // Close the connection
                $conn->close();
            ?>
        </div>

            <!-- Posts End -->


            <!-- Comments -->

            
            <div class="container text-center mt-3 mb-5">Leave a comment
                <form action="dbcomments.php" method="POST" class="align-items-center mt-3">
                    <div>
                        <input type="hidden" name="postid" value="<?php echo $postid; ?>">
                        <input type="text" class="form-control" id="description" name="description" placeholder="Type your comment here" required></input>
                        <div class="form-text">You have to be logged in to comment.</div>
                    </div>
                    <div class="comment-button-container">
                        <button type="submit" class="comment-button btn btn-success">Comment</button>
                    </div>
                    
                </form>
            </div>
            

            <div class="container-md text-center mt-3">
            <div class="mb-4 fw-bold">Comments</div>
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

                // Get the value of $postid from the URL parameter
                if(isset($_GET['PostId'])){
                    $postid = $_GET['PostId'];
                } else {
                    $postid = '';
                }

                // Get the value of $email from the URL parameter
                if(isset($_GET['Email'])){
                    $email = $_GET['Email'];
                } else {
                    $email = '';
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
                    $sql = "SELECT CommentId, PostId, CreatedDate, Description FROM comment WHERE PostId = '$postid' ORDER BY CreatedDate DESC";
                }

                $sql = "SELECT c.CommentId, c.PostId, c.CreatedDate, c.Description, u.firstname 
                FROM comment c 
                JOIN user u ON c.email = u.email 
                WHERE c.PostId = '$postid' 
                ORDER BY c.CreatedDate DESC";


                // Execute the query
                $result = $conn->query($sql);

                // Check if the query was successful
                if ($result->num_rows > 0) {
                    // Fetch the rows
                while ($row = $result->fetch_assoc()) {
                    $lname = $row["Description"];
                    $cdate = date("Y-m-d", strtotime($row["CreatedDate"])); // Extract date portion from CreatedDate
                    $postid = $row["PostId"];
                    $firstname = $row["firstname"]; // Get the firstname from the row

                    // Display the data in table rows
                    echo "<div class='card mb-5'><div class='card-body'><h5 class='card-title'>$firstname commented:</h5><p class='card-text'>$lname</p><p class='card-text'>$cdate</p></div></div>";
                }

                } else {
                    echo "Be the first to comment on this post!";
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