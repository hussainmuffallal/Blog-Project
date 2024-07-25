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
    <title>Users List</title>
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

        table tr:hover td {
            background-color: #f5f5f5;
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
              
              
            </ul>
            
              <a href="logout.php" class="btn btn-outline-danger" >Logout <img src="img/Logout24.png"></a>
            
          </div>
        </div>
      </nav>
      
      <div class="container">
        <h1 class="hero-text mb-4">Users List</h1>
        <table class="table mt-5">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Confirm Password</th>
                    <th>Created Date</th>
                </tr>
            </thead>
            <tbody>
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

                // SQL query to select the desired columns from the "user" table
                $sql = "SELECT FirstName, LastName, Email, Password, ConfirmPassword, AccountCreatedDate FROM user";

                // Execute the query
                $result = $conn->query($sql);

                // Check if the query was successful
                if ($result) {
                    // Fetch the rows
                    while ($row = $result->fetch_assoc()) {
                        // Display the data in table rows
                        echo "<tr onclick='handleRowClick(event)'>";
                        echo "<td class='p-3'>" . $row["FirstName"] . "</td>";
                        echo "<td class='p-3'>" . $row["LastName"] . "</td>";
                        echo "<td class='p-3'>" . $row["Email"] . "</td>";
                        echo "<td class='p-3'>" . $row["Password"] . "</td>";
                        echo "<td class='p-3'>" . $row["ConfirmPassword"] . "</td>";
                        echo "<td class='p-3'>" . $row["AccountCreatedDate"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    // Invalid password
                    header("Location: login.php?error");
                    exit();
                }

                // Close the connection
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

      <script>
        function handleRowClick(event) {
            // Get the row element that was clicked
            const row = event.target.closest('tr');

            // Get the data from the row
            const data = [];
            row.querySelectorAll('td').forEach((cell) => {
                data.push(cell.textContent.trim());
            });

            // Build the URL with the data
            const url = `usersBlog.php?email=${encodeURIComponent(data[2])}&Title=${encodeURIComponent(data[1])}&cdate=${encodeURIComponent(data[0])}`;

            // Navigate to the URL
            window.location.href = url;
        }
    </script>

    </div>

   

    
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  

    </body>
</html>