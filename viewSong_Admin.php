<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <Meta name="viewport"
content="width=device-width, initial-scale=1.0">
    <title>Song Collection System</title>
</head>
<body>
<center>
<h1>SONG LIST</h1>

<form action="searchSong.php" method="GET">
  <input type="text" name="search_keyword" placeholder="Search by keyword..." class="search-input">
  <button type="submit" class="search-button">Search</button>
</form>
<br>


<style>


.search-input {
  width: 300px;
  height: 36px;
  padding: 0 12px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  outline: none;
  backdrop-filter: blur(9px);
  background: transparent;
  border: 2px solid rgba(255, 255, 255, .2);
}

.search-button {
  width: 80px;
  height: 36px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 4px;
  font-size: 16px;
  cursor: pointer;
  
}

.search-button:hover {
  background-color: #3e8e41;
}

body{
  
  align-items: center;
  min-height: 100vh;
  background: url(lively.gif) no-repeat;
  background-size: cover;
  background-position: center;
}



.blur-table {
  backdrop-filter: blur(20px);

  border: 2px solid rgba(255, 255, 255, .2);
}
#menu-button {
    display: inline-block;
    background-color: #ffffff;
    border: none;
    color: rgb(0, 0, 0);
    text-align: center;
    padding: 10px 24px;
    text-decoration: none;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 20px;
    transition: background-color 0.3s;
    background: transparent;
  border: 2px solid rgba(255, 255, 255, .2);
  backdrop-filter: blur(9px);
  }
  
  #menu-button:hover {
    background-color: #696f69;
  }
</style>



<?php
session_start();
//check if session exists
if(isset($_SESSION["UserID"])) {
?>


<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "dc98854_scsdb";


$conn = new mysqli($host, $user, $pass, $db);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}else{}

$queryview = "SELECT * FROM SONG ORDER BY Song_Title ASC";
$result = $conn->query($queryview);

?>
    
<table border="2" class="blur-table">
<tr>
    <th>Song ID</th>
    <th>Title Of The Song</th>
    <th>Artist/Band Name</th>
    <th>Song Link Audio/Video</th>
    <th>Genre</th>
    <th>Language</th>
    <th>Release Date</th>
    <th>Owner ID</th>
    <th>Status</th>
</tr>    

<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>

    <tr>
        <td><?php echo $row['Song_Id']; ?></td>
        <td><?php echo $row['Song_Title']; ?></td>
        <td><?php echo $row['Artist_Name']; ?></td>
        <td><a href="<?php echo $row['Song_Url']; ?>" target="_blank"><?php echo $row['Song_Url']; ?></a></td>
        <td><?php echo $row['Song_Genre']; ?></td>
        <td><?php echo $row['Song_Language'];?></td>
        <td><?php echo $row['Release_Date']; ?></td>
        <td><?php echo $row['Owner_ID']; ?></td>
        <td><?php echo $row['Registration_Status']; ?></td>
        
    </tr>

<?php
    }
} else {
    echo "<tr><td colspan='7'>No data selected</td></tr>"; 
}


$conn->close();
?>
</table>
<br>

 
<a href="menu.php" id="menu-button">Menu</a>
</center>








</body>
</html>


<?php
}
else
{
echo "No session exists or session has expired. Please
log in again.<br>";
echo "<a href=login.html> Login </a>";
}
?>