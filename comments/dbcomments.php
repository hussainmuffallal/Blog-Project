
<?php
    session_start();
    if(!isset($_SESSION['userloggedin'])) {
        header('Location: ../login.php');
        exit();
    }
?>

<?php
    // Enable error reporting
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "blog_project";


// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $description = $_POST['description'];
    $postid = $_POST['postid'];
    $email=$_SESSION['userloggedin'];


    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the title already exists in the database
    $check_query = "SELECT Description FROM comment WHERE Description = '$description'";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        // Title already exists
        header("Location: index.php?error=comment_exists");
        exit();
    } else {

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("INSERT INTO comment (Description,PostId,email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $description,$postid,$email);

    if ($stmt->execute()) {
        header("Location: index.php?inserted");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
}

// Check if a delete request is made
if(isset($_GET['delid'])){
    $delid = $_GET['delid'];
    $description = $_GET['description'];
    $cdate = $_GET['cdate'];
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "DELETE FROM comment WHERE CommentId = $delid";
    if($conn->query($sql) === TRUE){
        header("Location: index.php?deleted");
        exit();
    }

    $conn->close();
}


?>