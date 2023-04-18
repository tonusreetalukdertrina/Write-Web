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
?>

<!DOCTYPE html>
<html>
<style>
  .header {
  padding: 0.0003px;
  text-align: center;
  background: #1abc9c;
  color: white;
  font-size: 30px;
  text-shadow: 2px 2px 4px #000000;
}

div.scrollmenu {
  background-color: #1abc9c;
  text-align: right;
  overflow: auto;
  white-space: nowrap;
}

div.scrollmenu a {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px;
  text-decoration: none;
}

div.scrollmenu a:hover {
  background-color: #777;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
.upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
}

.btn {
  border: 2px solid gray;
  color: gray;
  background-color: white;
  padding: 8px 20px;
  border-radius: 8px;
  font-size: 20px;
  font-weight: bold;
}

.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

tr:hover {background-color: coral;}
</style>

<div class="header">
  <h1><b>Write Web</b></h1>
  <div class="scrollmenu">
  <a href="Home.php">Back To Home Page</a>
</div>
</div>

<body>

<h3>My Starred Papers</h3>

<table>
                <thead>
                    <tr>
                        <th>Authors</th>
                        <th>Topic</th>
                        <th>Paper Title</th>
                        <th>View</th>
                        <th>Download</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT * FROM starred WHERE star_giver='$my_name'";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $row['author']; ?></td>
                    <td><?php echo $row['topic']; ?></td>
                    <td><?php echo $row['pdf_name']; ?></td>
                    <td><a href="uploads/<?php echo $row['pdf_name']; ?>" target="_blank">View</a></td>
                    <td><a href="uploads/<?php echo $row['pdf_name']; ?>" target="_blank">Download</a></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
</body>
</html>

