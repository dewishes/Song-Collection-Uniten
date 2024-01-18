<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <Meta name="viewport"
content="width=device-width, initial-scale=1.0">
    <title>Song Collection System</title>
</head>
<?php

$SongId = $_POST ['SongID'];
?>



<?php
session_start();

if(isset($_SESSION["UserID"])) {
?>

<body>


<h1>SONG LIST</h1>

<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "dc98854_scsdb";


$conn = new mysqli($host, $user, $pass, $db);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}else
{

    $Song_Id= 1;
    $queryDelete = "Delete FROM song WHERE Song_Id = '".$SongId." '";

     if ($conn->query($queryDelete) === TRUE) {
        echo "<p style='color:blue;'>Record has been deleted from database !</p>";
        echo "Click <a href='viewSong.php'> here </a> to view song list ";
     } else {
        echo "<p style='color:red;'>query problems! : " . $conn->error . "</p>";
     }
}

$conn->close();
?>
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