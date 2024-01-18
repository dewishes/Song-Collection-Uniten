<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl7/1L_dstPt3HV5HzF6Gvk/e3s4Wz6iJgD/+ub2oU" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <title>Song Collection System</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background: url(lively.gif) no-repeat;
  background-size: cover;
  background-position: center;
    }
    .container {
      margin-top: 5rem;
      text-align: center;
      
    }
    .nav-link {
      margin: 1rem;
      padding: 0.5rem 1rem;
      border-radius: 0.5rem;
      background-color: #007bff;
      color: white;
      text-decoration: none;
      transition: background-color 0.3s ease;
    }
    .nav-link:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <?php
  session_start();

  if (isset($_SESSION['UserID'])) {
  ?>
    <div class="container">
      <h1 class="animate__animated animate__fadeIn">WELCOME, Hi <?php echo $_SESSION['UserID']; ?></h1>
      <p class="lead animate__animated animate__fadeIn">Choose your menu:</p>
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <?php
          if ($_SESSION['UserType'] == "admin") {
          ?>
            <a href="viewSong_Admin.php" class="nav-link animate__animated animate__fadeInUp">View Song List</a><br><br>
            <a href="song_status_edit.php" class="nav-link animate__animated animate__fadeInUp">Update Song Status</a><br><br>
            <a href="blockUser.php" class="nav-link animate__animated animate__fadeInUp">User List</a><br><br>
          <?php
          } else {
          ?>
            <a href="song_form.php" class="nav-link animate__animated animate__fadeInUp">Register New Song</a><br><br>
            <a href="song_editView.php" class="nav-link animate__animated animate__fadeInUp">Edit Song Details</a><br><br>
            <a href="song_deleteView.php" class="nav-link animate__animated animate__fadeInUp">Delete Song Record</a><br><br>
            <a href="viewSong.php" class="nav-link animate__animated animate__fadeInUp">View Song List</a><br><br>
            <a href="viewAllApprovedSongs.php" class="nav-link animate__animated animate__fadeInUp">View All Approved Songs</a><br><br>
          <?php
          }
          ?>
          <a href="logout.php" class="nav-link animate__animated animate__fadeInUp">Logout</a>
        </div>
      </div>
    </div>
  <?php
  } else {
  ?>
    <div class="container">
      <p class="lead animate__animated animate__fadeIn">No session exists or session has expired. Please log in again.</p>
      <a href="login.html" class="btn btn-primary animate__animated animate__fadeInUp">Login</a>
    </div>
  <?php
  }
  ?>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBud7TlRbs/ic4AwGcFZOxg5DpPt8EgeUIgIwzjWfXQKWA3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
</body>
</html>
