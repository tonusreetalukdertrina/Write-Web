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

if(isset($_POST["submit"])){
    $topic = $_POST['topic'];
    $pdf_name = $_POST['pdf_name'];
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
        input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
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
    <body>
    <div class="header">
  <h1><b>Write Web</b></h1>
  <div class="scrollmenu">
  <a href="Home.php">Back to Home Page</a>
</div>
</div>
    <div>
  <form action="search.php" method="POST">
    <label for="topic">Topic Name</label>
    <select id="topic" name="topic" required>
      <option value="CNN">CNN</option>
      <option value="NLP">NLP</option>
      <option value="Machine Learning">Machine Learning</option>
      <option value="RNN">RNN</option>
      <option value="Image Processing">Image Processing</option>
      <option value="Information Technology">Information Technology</option>
      <option value="Cloud Computing">Cloud Computing</option>
      <option value="Artificial Intelligence">Artificial Intelligence</option>
    </select>
    <label for="pdf_name">Paper Title</label>
    <input type="text" placeholder="Enter Your Paper Title" name="pdf_name"/>
	<input type="submit" name="submit" value="Search"> 
</form>
</div>
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
                if(isset($_POST["submit"])){
                    $topic = $_POST['topic'];
                    $pdf_name = $_POST['pdf_name'];
                }
                $sql = "SELECT * FROM users_pdf WHERE topic='$topic' OR pdf_name='$pdf_name'";
                $result = mysqli_query($conn, $sql);
                if($result->num_rows>0){
                    while($row = $result->fetch_assoc()){
                        ?>
                        <tr>
                            <td><?php echo $row["user"]; ?></td>
                            <td><?php echo $row["topic"]; ?></td>
                            <td><?php echo $row["pdf_name"]; ?></td>
                            <td><a href="uploads/<?php echo $row['pdf_name']; ?>" target="_blank">View</a></td>
                            <td><a href="uploads/<?php echo $row['pdf_name']; ?>" target="_blank">Download</a></td>
                            <td><a href="Stars.php?pdf_name=<?php echo $row["pdf_name"] ?>">Star</a></td>
                        </tr>
                    <?php 
                    }
                    ?>
                <?php 
                }
                ?>
                </tbody>
            </table>
    </body>
</html>