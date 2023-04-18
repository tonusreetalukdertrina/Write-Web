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

<div class="header">
  <h1><b>Write Web</b></h1>
  <div class="scrollmenu">
  <a href="search.php">Search</a>
  <a href="starred_papers.php">Starred Papers</a>
  <a href="Login.php">Log Out</a>
</div>
</div>

<body>

<h3>Upload My Paper</h3>

<div>
  <form action="uploads.php" method="POST" enctype="multipart/form-data">
    <label for="user">User Name</label>
    <input type="text" id="user" name="user" value="<?php echo $my_name; ?>">
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
    <input required type="text" placeholder="Enter Your Paper Title" name="pdf_name"/>
    <input type="file" name="pdf"><br><br>
			<input type="submit" name="submit" value="Upload"> 
</form>
</div>
<table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Authors</th>
                        <th>Topic</th>
                        <th>Paper Title</th>
                        <th>View</th>
                        <th>Stars</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT * FROM users_pdf WHERE user='$my_name'";
                $result = mysqli_query($conn, $sql);
                $i = 1;
                while($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['user']; ?></td>
                    <td><?php echo $row['topic']; ?></td>
                    <td><?php echo $row['pdf_name']; ?></td>
                    <td><a href="uploads/<?php echo $row['pdf']; ?>" target="_blank">View</a></td>
                    <td><?php echo $row['stars']; ?></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
</body>
</html>

