<?php
include_once 'userVerification.php';
if (isset($_SESSION['upload_success'])) {
  echo "<script>alert('" . $_SESSION['upload_success'] . "');</script>";
  unset($_SESSION['upload_success']); 
}
if (isset($_SESSION['failedlogin'])) {
  unset($_SESSION['failedlogin']); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>

<body class="homeBody">
<?php include 'navMenu.php';?>
  <?php include 'mainDiv.php';?>
  <?php include 'userDiv.php';?>
  <?php 
  include '../Controllers/displayPinned.php';
  $displayPinnedController = new displayPinned();
  echo $displayPinnedController->displayPinned();
  ?>
  <div class="upload">
  <a class="uploadLien" href="upload.php"><i class="fa-solid fa-upload"></i></a>
    <div class="options">
  <div><a href="library.php?action=vocal"><i class="fa-solid fa-volume-high"></i></a></div>
  <div><a href="library.php?action=video"><i class="fa-solid fa-video"></i></a></div>
  <div><a href="library.php?action=musique"><i class="fa-solid fa-music"></i></a></div>
  <div><a href="library.php?action=gif"><i class="fa-solid fa-gift"></i></a></div>
</div>
</div>
  <img class="Footbar" src="images/degrade.png" />
  <img class="Footlogo" src="images/logoMini.png" />
</div>

            
</body>
</html>