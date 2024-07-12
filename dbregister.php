
<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Establish a connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog_project";


$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " );
}

// Retrieve data submitted by the form
$email = $_POST['email'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];
// Prepare and execute the SQL query to insert the data into the Employee table
$sql = "INSERT INTO user (email, firstName, lastName, password, confirmpassword) VALUES ('$email', '$firstName', '$lastName', '$password', '$password')";

if ($confirmpassword !== $password) {
    header('Location:register.php?error2');
    exit();
}

try {
    if ($conn->query($sql) === TRUE) {
        header('Location:login.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} catch (mysqli_sql_exception $e) {
    if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
        header('Location:register.php?error1');
        exit();

    } else {
        echo "Error: " . $e->getMessage();
    }
}

// Close the database connection
$conn->close();

?>
