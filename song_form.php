<!DOCTYPE HTML>
<?php
session_start();
//check if session exists
if(isset($_SESSION["UserID"])) {
?>
<HTML>
<Head>
<title>Song Collection System</title>

</Head>

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


<body>
  
<div class="container">
<h1>Song Registration Form</h3>
<P><b>Enter song details:</b></P>

<p style="color:red;">* <i>ALL fields are required</i></p>

<form name="insertForm" action="song_register.php" method="POST">

Title Of The Song: <input type="text" name="Song_Title" maxlength="15" required>
<br>
<br>
Artist/Band Name: <input type="text" name="Artist_Name" maxlength="15" required>

<br>
<br>
Song Link Audio/Video: <input type="url" name="Song_Url" size="50" required>
<br>
<br>
Genre: <input type="text" name="Song_Genre" required>
<br>
<br>
Language: <input type="text" name="Song_Language"  required>
<br>
<br>
Release Date: <input type="date" name="Release_Date" value="Release_Date" required>
<br>
<br>

<input type="submit" value="Display Song Details">
<input type="reset" value="Cancel">





</form>
    

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




