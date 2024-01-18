<!DOCTYPE HTML>
<HTML>
<Head>
<title>Song Collection System</title>

<body>

<?php
//this codes is for login process
//check userid & pwd is matched
$userID = $_POST['userID'];
$userPwd = $_POST['userPwd'];
//declare DB connection variables
$host = "localhost";
$user = "root";
$pass = ""; // please write password if any
$db = "dc98854_scsdb"; // please write your DB name that you have created
//create connections with DB
$link = new mysqli($host, $user, $pass, $db);
if ($link->connect_error) { //to check if DB connection IS NOT OK
 die("Connection failed: " . $link->connect_error); // display MySQL error;
}
else
{
 //connect successfully
 //check userID is exist
 $queryCheck = "select * from USER where UserID = '".$userID."' ";
 $resultCheck = $link->query($queryCheck);
 if ($resultCheck->num_rows == 0) {
 echo "<p style='color:red;'>User ID does not exists </p>";
 echo "<br>Click <a href='login.html'> here </a> to log-in again";
 }
 else
 {
 $row = $resultCheck->fetch_assoc();

 
// Add this code after fetching the user data from the database
if ($row["status"] == "block") {
   echo "<p style='color:red;'>Your account is currently blocked. Please contact the administrator.</p>";
   echo "<br>Click <a href='login.html'> here </a> to log-in again";
   exit();
}


 // check if password database = password user enter
 if( $row["UserPwd"] == $userPwd )
 {
    //calling the session_start() is compulsory
 session_start();
 //asign userid & usertype value to session variable
 $_SESSION["UserID"] = $userID ;
 $_SESSION["UserType"] = $row["UserType"];

 //redirect to file menu.php upon successful login
header("Location:menu.php");
 } else { //if password not matched

 echo "<p style='color:red;'>Wrong password!!! </p>";
 echo "Click <a href='login.html'> here </a> to login again ";
 }
 }
}
$link->close();
?>

</body>
</html>
