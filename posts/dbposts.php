
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


    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the form data
        $title = $_POST['title'];
        $cdate = $_GET['cdate'];
        $content = $_POST['content'];
        $email=$_SESSION['userloggedin'];

    // Check if the title is already used by the user
        $query = "SELECT * FROM post WHERE title = ? AND email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $title, $email);
        $stmt->execute();
        $result = $stmt->get_result();


    if ($result->num_rows > 0) {
        // Title already exists
        header("Location: index.php?error=title_exists");
        exit();
    } else {

    // Prepare and execute the SQL statement
    $query = "INSERT INTO post (title, content, email) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $title, $content, $email);
    $stmt->execute();

        // Redirect the user to the dashboard page
        header("Location: ../dashboard.php");
        exit;
    }{

    // Close the statement and connection
    $stmt->close();
    
}
}

// Check if a delete request is made
if(isset($_GET['delid'])){
    $delid = $_GET['delid'];
    $title = $_GET['title'];
    $cdate = $_GET['cdate'];
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "DELETE FROM post WHERE PostId = $delid";
    if($conn->query($sql) === TRUE){
        header("Location: index.php?title=" . $title . "&cdate=" . $cdate . "");
        exit();
    }

    $conn->close();
}


?>