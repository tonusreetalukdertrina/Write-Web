<?php 

session_start();
$my_name = $_SESSION['user_name'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "write_web";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn -> connect_error){
    die("Connection failed: " .$conn -> connect_error);
}

$pdf_name = $_GET["pdf_name"];
$sql = "SELECT * FROM users_pdf WHERE pdf_name='$pdf_name'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if($row["pdf_name"]==$pdf_name){
    $author = $row['user'];
    $pdf_name = $row['pdf_name'];
    $topic = $row['topic'];
    $star = $row['stars']+1;
    $sql = "INSERT INTO starred (star_giver, author, pdf_name, topic) VALUES ('$my_name', '$author', '$pdf_name', '$topic')";
    $to_do = "UPDATE users_pdf SET stars='$star' WHERE pdf_name='$pdf_name'";
}

if(mysqli_query($conn, $sql)===TRUE and mysqli_query($conn, $to_do)===TRUE){
    header("location: search.php");
}
else{
    echo "Error: " .$sql. "<br>" .$conn -> error;
}

$conn -> close();
?>