<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "write_web";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn -> connect_error){
    die("Connection failed: " .$conn -> connect_error);
}

if(isset($_POST["submit"])){
    $user = $_POST['user'];
    $topic = $_POST['topic'];
    $pdf_name = $_POST['pdf_name'];
    $pdfname = $_FILES['pdf']['name'];
    $tmpname = $_FILES['pdf']['tmp_name'];
    $uploc = 'uploads/'.$pdfname;
}

$sql = "INSERT INTO users_pdf (user, pdf_name, pdf, topic) VALUES ('$user', '$pdf_name', '$pdfname', '$topic')";

if(mysqli_query($conn, $sql)===TRUE){
    move_uploaded_file($tmpname, $uploc);
    echo "<h1>Your paper has been uploaded<h1>";
}
else{
    echo "Error: " .$sql. "<br>" .$conn -> error;
}
$conn -> close();
?>