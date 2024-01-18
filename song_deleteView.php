<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <Meta name="viewport"
content="width=device-width, initial-scale=1.0">
    <title>Song Collection System</title>
</head>
<style>
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
#delete-button {
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
  
  #delete-button:hover {
    background-color: #696f69;
  }
</style>



<?php
session_start();
//check if session exists
if(isset($_SESSION["UserID"])) {
?>

<body>
<center>

<h1>SONG LIST</h1>

<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "dc98854_scsdb";


$conn = new mysqli($host, $user, $pass, $db);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}else{}

$queryview= "SELECT * FROM SONG where Owner_ID = '".$_SESSION['UserID']."'";
$result = $conn->query($queryview);


?>

<form action="song_delete.php" method="POST" onsubmit="return confirm('Are you sure to delete this record?');">

    
<table border="2" class="blur-table">
<tr>
    <th>choose</th>
    <th>Song ID</th>
    <th>Title Of The Song</th>
    <th>Artist/Band Name</th>
    <th>Song Link Audio/Video</th>
    <th>Genre</th>
    <th>Language</th>
    <th>Release Date</th>
    <th>Owner Id</th>
</tr>    

<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>

<tr>
    <td> <input type="radio" name="SongID" value="<?php echo $row['Song_Id']; ?>" required> </td>
    <td><?php echo $row['Song_Id']; ?></td>
    <td><?php echo $row['Song_Title']; ?></td>
    <td><?php echo $row['Artist_Name']; ?></td>
    <td><a href="<?php echo $row['Song_Url']; ?>" target="_blank"><?php echo $row['Song_Url']; ?></a></td>
    <td><?php echo $row['Song_Genre']; ?></td>
    <td><?php echo $row['Song_Language'];?></td>
    <td><?php echo $row['Release_Date']; ?></td>
    <td><?php echo $row['Owner_ID'];?></td>

</tr>


<?php
    }
} else {
    echo "<tr><td colspan='8'>No data selected</td></tr>"; 
}


$conn->close();
?>
</table>
<br>

    <input type="submit" id="delete-button"  value="Delete Selected Record">
</form>
<p> Click <a href="menu.php" target="_self">here</a> back to MENU page
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