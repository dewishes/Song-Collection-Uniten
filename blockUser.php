<!DOCTYPE HTML>
<HTML>
<Head>
    <title>Song Collection System</title>

</Head>

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
            color: ##ECF0F1;
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

<?php
session_start();

if(isset($_SESSION["UserID"]) && $_SESSION["UserType"] == "admin") 
?>

<body>

<h1>BLOCK/UNBLOCK USER</h3>
<P><b>Select a user to update their status:</b></P>

<form name="blockUserForm" action="blockUserSave.php" method="POST">

    <?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "dc98854_scsdb";

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{}

    $query = "SELECT * FROM USER WHERE UserType = 'user'";
    $result = $conn->query($query);

    echo "<select name='userId'>";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['UserID'] . "'>" . $row['UserID'] . " (Status: " . $row['status'] . ")</option>";
        }
    } else {
        echo "0 results";
    }

    echo "</select>";

    ?>

    <br><br>

    <label for="status">Update Status:</label><br>
    <select id="status" name="status">
      <option value="active" <?php if(isset($_POST['status']) && $_POST['status'] == 'active') echo 'selected'; ?>>Active</option>
      <option value="block" <?php if(isset($_POST['status']) && $_POST['status'] == 'block') echo 'selected'; ?>>Block</option>
    </select>

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