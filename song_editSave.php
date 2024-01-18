<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Song Collection System</title>
</head>






<?php
session_start();
//check if session exists
if(isset($_SESSION["UserID"])) {
?>

<body>
<h3> SONG UPDATE SAVE </h3>

<?php
   
    $SongId = $_POST ['SongId'];
    $title = $_POST['Song_Title'];  
    $name = $_POST['Artist_Name']; 
    $url = $_POST['Song_Url'] ;
    $genre = $_POST['Song_Genre']; 
    $language = $_POST['Song_Language'] ;
    $date = $_POST['Release_Date'];
    

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "dc98854_scsdb";

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      else
      {

      $queryUpdate = "UPDATE song SET
                     Song_Title = '".$title."', Artist_Name = '".$name."', Song_Url = '".$url."',
                     Song_Genre ='".$genre."', Song_Language = '".$language."', Release_Date = '".$date."' WHERE Song_Id = '".$SongId."'";

    if ($conn->query($queryUpdate) === TRUE) {
        echo "<p style='color:blue;'> Record has been updated into database ! </p>";
        echo "Click <a href='viewSong.php'>here</a> to view song list ";

    } else {
        echo "<p style='color:red;'>Query problems! :" . $conn->error . "</p>";
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
