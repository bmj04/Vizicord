<?php 
include_once 'userVerification.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPLOAD</title>
    <link rel="stylesheet" href="styles.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body class="homeBody">
    <?php include 'navMenu.php';?>
    <?php include 'mainDiv.php';?>
    <?php include 'userDiv.php';?>
    <form action="../index.php?action=upload" method="post" enctype="multipart/form-data">
    <div class="Titleupload">
    <input type="text" class="titleUpload" placeholder="Titre de la publication" name="title" required>
  </div>
  <div class="Descriptionupload">
  <input type="text" class="descriptionUpload" placeholder="Description" name="description" required maxlength="200">
  </div>
  <div class="Categoryupload">
  <select class="categoryUpload" name="category" required>
    <option value="video">Vidéo</option>
    <option value="musique">Musique</option>
    <option value="vocal">Vocal</option>
    <option value="gif">Gif</option>
</select>
  </div>
  <div class="Statusupload">
    <select class="categoryUpload" name="status" required>
    <option value="publique">Publique</option>
    <option value="privé">Privé</option>
    <option value="partagé">Partagé</option>
</select></div>
  <div class="Uploadmain">
    <i class="fa-solid fa-upload"></i>
    <input type="file" id="fileUpload" name="file_source" class="fileUpload" required>
</div>
  <div class="Submitupload">
    <button class="submitUpload" type="submit" name="upload">UPLOAD</button>
  </div>
</form>
</body>
</html>