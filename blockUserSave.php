<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Song Collection System</title>
</head>
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
</style>

<?php
session_start();

if(isset($_SESSION["UserID"]) && $_SESSION["UserType"] == "admin") {
?>

<body>
<h3>USER STATUS UPDATE SAVE </h3>

<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "dc98854_scsdb";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{}

$userId = $_POST['userId'];
$status = $_POST['status'];

$sql = "UPDATE USER SET status='$status' WHERE UserID='$userId'";

if ($conn->query($sql) === TRUE) {
    echo "User status updated successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

<p> Click <a href="menu.php" target="_self">here</a> back to MENU page

</body>
</html>

<?php

} else {
    echo "No session exists or session has expired. Please <a href='menu.php' target='_self'>click here</a> to go back to the menu page.";
}
?>