<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="view" content="width=device-width, initial-scale=1.0">
    <title>Song Collection System</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url(lively.gif) no-repeat;
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
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
    </style>
</head>
<body>

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

$search_keyword = $_GET['search_keyword'];

$queryview= "SELECT * FROM SONG WHERE Song_Title LIKE '%$search_keyword%' OR Artist_Name LIKE '%$search_keyword%' OR Song_Genre LIKE '%$search_keyword%' OR Song_Language LIKE '%$search_keyword%'";
$result = $conn->query($queryview);

?>

<div class="container">
    
    <h1>SEARCH RESULTS</h1>

<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>

<h2><?php echo $row['Song_Title']; ?></h2>
<p>Artist: <?php echo $row['Artist_Name']; ?></p>
<p>Link: <?php echo $row['Song_Url']; ?></p>
<p>Genre: <?php echo $row['Song_Genre']; ?></p>
<p>Language: <?php echo $row['Song_Language']; ?></p>
<p>Release Date: <?php echo $row['Release_Date']; ?></p>
<p>Owner ID: <?php echo $row['Owner_ID']; ?></p>

<?php
    }
} else {
    echo "<p>No results found for keyword: '$search_keyword'</p>";
}

$conn->close();
?>

<p> Click <a href="viewSong_Admin.php" target="_self">here</a> to go back to the song list</p>
</div>


<?php
}
else
{
echo "No session exists or session has expired. Please
log in again.<br>";
echo "<a href=login.html> Login </a>";
}
?>

</body>
</html>