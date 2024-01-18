<!DOCTYPE HTML>
<HTML>
<Head>
<title>Song Collection System</title>

</Head>
<style>
body {
            
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url(lively.gif) no-repeat;
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
}


        .container {
            
            width: 80%;
            max-width: 600px;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(20px);
            background: transparent;
            border: 2px solid rgba(255, 255, 255, .2);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        h2 {
            margin-top: 0;
        }
        p {
            margin-bottom: 5px;
        }
        a {
            color: #0066cc;
            text-decoration: none;
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

if(isset($_SESSION["UserID"])) {
?>

<body>
<center>
<h1>SONG LIST</h3>
<p style="color:blue;font-weight:bold;"> Update Song Details</P>

<?php

$SongId = $_POST ['SongID'];

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

$queryGet= "SELECT * FROM song WHERE Song_Id = '".$SongId."'";

$resultGet = $conn->query($queryGet);

if ($resultGet->num_rows > 0) {
    
?>

<div class="container">
<form name="UpdateForm" action="song_editSave.php" method="POST">

<?php
while ($row = $resultGet->fetch_assoc()) {
?>

Song ID: <?php echo $row["Song_Id"];?>
<br>
<br>
Title Of The Song: <input type="text" name="Song_Title" value="<?php echo $row['Song_Title'];?>"maxlength="15" required>
<br>
<br>
Artist/Band Name:<input type="text" name="Artist_Name" value="<?php echo $row['Artist_Name'];?>"maxlength="15" required>

<br>
<br>
Song Link Audio/Video: <input type="url" name="Song_Url"  value="<?php echo $row['Song_Url'];?>" size="50" required>
<br>
<br>
Genre: <input type="text" name="Song_Genre"  value="<?php echo $row['Song_Genre'];?>" required>
<br>
<br>
Language: <input type="text" name="Song_Language" value="<?php echo $row['Song_Language'];?>" required>
<br>
<br>
Release Date: <input type="date" name="Release_Date" value="<?php echo $row['Release_Date'];?>" required>
<br> 
<br>

<?php

?>

<input type="hidden" name="SongId" value="<?php echo $row["Song_Id"];?>">
<input type="submit" value="Update New Details">
</div>
</center>
<?php
    }
  }
} 
$conn->close();
?>

</form>
<br>
<br>
<center>
    <a href="menu.php" id="menu-button">Menu</a>
</center>
</body>
</HTML>

<?php
}
else
{
echo "No session exists or session has expired. Please
log in again.<br>";
echo "<a href=login.html> Login </a>";
}
?>