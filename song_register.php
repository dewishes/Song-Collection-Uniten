<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Song Collection System</title>
</head>

<?php

    $title = $_POST["Song_Title"];  
    $name = $_POST["Artist_Name"]; 
    $url = $_POST["Song_Url"] ;
    $genre = $_POST["Song_Genre"]; 
    $language = $_POST["Song_Language"] ;
    $date = $_POST["Release_Date"] ;
    $status = "Pending";
?>

<?php
session_start();
//check if session exists
if(isset($_SESSION["UserID"])) {
?>




<body>

    <h1>Song Registration Details</h1>
    <br>

    <table border=1 >
        <tr>
            <td>Title Of The Song:</td>
            <td><b style="color:blue"><?php echo $title; ?></b></td>
        </tr>
        <tr>
            <td>Artist/Band Name:</td>
            <td><b><?php echo $name; ?></b></td>
        </tr>
        <tr>
            <td>Song Link Audio/Video:</td>
            <td><b><a href="<?php echo $url; ?>"><?php echo $url; ?></a></b></td>
        </tr>
        <tr>
            <td>Genre:</td>
            <td><b><?php echo $genre; ?></b></td>
        </tr>
        <tr>
            <td>Language:</td>
            <td> <b><?php echo $language; ?></b></td>
        </tr>
        <tr>
            <td>Release Date:</td>
            <td><b><?php echo $date; ?></b></td>
        </tr>
    </table>



<?php
    $host="localhost";
    $user="root";
    $pass="";
    $db="dc98854_scsdb";


    $conn=new mysqli($host,$user,$pass,$db);
    if ($conn->connect_error)
    {
        die("It's error " .$conn->connect_error);

    }
   
    else   
    {
        
        $DBquerry="INSERT INTO song(Song_Title,Artist_Name,Song_Url,Song_Genre,Song_Language,Release_Date,Registration_Status,Owner_ID)
        VALUES('".$title."','".$name."','".$url."','".$genre."','".$language."','".$date."','".$status."' , '".$_SESSION["UserID"]."')";
      
        if ($conn->query($DBquerry) === TRUE)
        {
            echo "<p style='color:blue;'>It is a success </p>";
        } 
        else 
        {
            echo "<p style='color:red;'>FAIL TO INSERT " .  $conn->error."</p>";
        }
    }    
    $conn->close();
?>
<br>
    <p>Click <a href="song_form.php">here</a> to enter new song details.</p>
    <p>Click <a href="viewSong.php">here</a> view ALL Song details.</p>
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
