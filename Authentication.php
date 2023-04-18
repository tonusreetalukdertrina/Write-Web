<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "write_web";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn -> connect_error){
    die("Connection failed: " .$conn -> connect_error);
}

if($_SERVER["REQUEST_METHOD"]=='POST'){
    $email = $_POST["email"];
    $password = $_POST["password"];
}

$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if($row["email"]==$email and $row["password"]==$password){
    $name = $row['user'];
    session_start();
    $_SESSION['user_name'] = $name;
    header("location: Home.php");
}

elseif($row["email"]!=$email or $row["password"]!=$password){
    echo "<h1>Incorrect email or password...</h1>";
}
else{
    echo "<h1>Wrong Information</h1>";
}

$conn -> close();
?>