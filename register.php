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
    $user = $_POST["user"];
    $email = $_POST["email"];
    $password = $_POST["password"];
}

$sql = "INSERT INTO users (user, email, password) VALUES ('$user', '$email', '$password')";

if($conn -> query($sql)===TRUE){
    header("location: Login.php");
}
else{
    echo "Error: " .$sql. "<br>" .$conn -> error;
}
$conn -> close();
?>