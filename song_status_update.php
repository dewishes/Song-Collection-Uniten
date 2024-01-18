<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Song Collection System</title>
</head>
<style>
body {
  align-items: center;
  min-height: 100vh;
  background: url(lively.gif) no-repeat;
  background-size: cover;
  background-position: center;
}
</style>

<?php
session_start();

if (isset($_SESSION["UserID"]) && $_SESSION["UserType"] == "admin") {
?>

<body>
    <h3>SONG UPDATE SAVE</h3>

    <?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "dc98854_scsdb";

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $songId = $_POST['songId'];
    $status = $_POST['status'];

    $sql = "UPDATE SONG SET Registration_Status='$status' WHERE Song_Id='$songId'";

    if ($conn->query($sql) === TRUE) {
        echo "Song status updated successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    ?>

    <p>Click here back to <a href="menu.php" target="_self">MENU page</a></p>

</body>

<?php
} else {
    echo "No session exists or session has expired. Please <br>";
    echo "<a href=login.html>Login</a>";
}
?>
</html>