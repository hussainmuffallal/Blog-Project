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
            background-color: #fcf9cd;  
      }

      .form-control {
            background-color: white;
            width: 50%;
            margin-left: 25%;
            margin-right: 25%;
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

                // Get the value of $lname from the URL parameter
                if(isset($_GET['Title'])){
                    $lname = $_GET['Title'];
                } else {
                    $lname = '';
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
                    $sql = "SELECT PostId, Title, Content FROM post WHERE Title = '$lname' ORDER BY PostId DESC";
                }


                // Execute the query
                $result = $conn->query($sql);

                // Check if the query was successful
                if ($result) {
                    // Fetch the rows
                    while ($row = $result->fetch_assoc()) {
                        // Display the data in table rows
                        
                        echo '<li class="list-group-item fs-4 fw-light" style="text-align: center;">';
                        echo '<h2 style="font-weight: bold;">' . $row['Title'] . '</h2>';
                        echo '<p style="text-align: center;">' . $row['Content'] . '</p>';
                        echo '</li>';
                    }
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }


                // Close the connection
                $conn->close();
                ?>


            <div class="mb-2 fw-bold">Leave a Comment</div>
            <form action="dbcomments.php" method="POST" class="row g-3">
                <div class="col-10">
                    <input type="hidden" name="postid" value="<?php echo $postid; ?>">
                    <input type="hidden" name="fname" value="<?php echo $firstName; ?>">
                    <input type="text" class="form-control" id="description" name="description" placeholder="Type your comment here" required></input>
                </div>
                <div class="col-3">
                    <button type="submit" class="btn btn-success">Comment</button>
                </div>
            </form>

            <div class="container-md text-center mt-5" style="max-width: 700px;">
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
                    $sql = "SELECT CommentId, PostId, CreatedDate, Description FROM comment WHERE email = '$email' ORDER BY CreatedDate DESC";
                }

                // Check if the user is logged in
if (isset($_SESSION['userloggedin'])) {
    // User is logged in
    // Query the database to retrieve the user's firstname
    $userEmail = $_SESSION['email']; // Replace with the appropriate method to get the user's email
    $query = "SELECT firstname FROM users WHERE email = ?";
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
        echo '<h1>Welcome, ' . $firstname . '</h1>';
    } else {
        echo "No user found with the provided email.";
    }
} else {
    // User is not logged in
    // Display the comments without the comment form
    // Query the database to retrieve the comments
    $query = "SELECT * FROM comment WHERE PostId = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $postId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any comments were found
    if ($result->num_rows > 0) {
        // Display the comments
        while ($row = $result->fetch_assoc()) {
            echo '<div class="comment">';
            echo '<h3>' . $row['name'] . '</h3>';
            echo '<p>' . $row['comment'] . '</p>';
            echo '</div>';
        }
    } else {
        echo "No comments found.";
    }
}

// Close the statement and connection
$stmt->close();


                // Execute the query
                $result = $conn->query($sql);

                // Check if the query was successful
                if ($result) {
                    // Fetch the rows
                    while ($row = $result->fetch_assoc()) {
                        $lname = $row["Description"];
                        $cdate = date("Y-m-d", strtotime($row["CreatedDate"])); // Extract date portion from CreatedDate
                        $postid = $row["PostId"];

                        // Display the data in table rows
                        echo "<div class='card'><div class='card-body'><h5 class='card-title'>$firstName commented:</h5><p class='card-text'>$lname</p><p class='card-text'>$cdate</p><p class='card-text'>$postid</p></div></div>";
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