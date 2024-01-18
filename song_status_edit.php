<!DOCTYPE html>
<html>
<head>
    <title>Song System</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url(lively.gif) no-repeat;
            background-size: cover;
            background-position: center;
        }

        h1 {
            font-size: 2.7em;
            color: #333;
            margin-bottom: 0.5em;
        }

        p {
            font-size: 1.2em;
            color: #FDFEFE;
            margin-bottom: 1.5em;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            font-size: 1.5em;
            color: #FDFEFE;
            margin-bottom: 0.5em;
        }

        input[type="text"] {
            padding: 0.5em;
            font-size: 1em;
            width: 20em;
            margin-bottom: 1em;
            border-radius: 5px;
            
          
        }

        input[type="submit"] {
            padding: 0.5em 1em;
            font-size: 1em;
            border-radius: 5px;
            border: none;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
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

</head>


<?php
session_start();
//check if session exists
if(isset($_SESSION["UserID"])) {
?>

<body>

<h1>EDIT SONG STATUS</h1>
<p><b>Select a song to update its status:</b></p>

<form name="updateStatusForm" action="song_status_update.php" method="POST">

<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "dc98854_scsdb";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{}

$query = "SELECT * FROM SONG";
$result = $conn->query($query);

echo "<select name='songId'>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['Song_Id'] . "'>" . $row['Song_Title'] . "</option>";
    }
} else {
    echo "0 results";
}

echo "</select>";

?>

<br><br>

<label for="status">Update Status:</label><br>
<label><input type="radio" name="status" value="Approved"> Approve</label>
<label><input type="radio" name="status" value="Rejected"> Rejected</label>

<br><br>

<input type="submit" value="Update Status">


</form>
<br>
<br>


<center>
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