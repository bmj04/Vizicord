<?php 
include_once 'userVerification.php';
if (isset( $_SESSION['updateProfileSuccess'])) {
  echo "<script>alert('" .  $_SESSION['updateProfileSuccess'] . "');</script>";
  unset( $_SESSION['updateProfileSuccess']); 
}
?>
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>
<body class="homeBody">
<?php include 'navMenu.php';?>
<?php include 'mainDiv.php';?> 
  <?php include 'userDiv.php';?>

  
    <div class="container mt-5" style="color:white;">
        <h2 style="text-align:center;">Paramètres du Compte</h2>
        <div class="mb-3">
        <form action="../index.php?action=updateProfile" method="POST" enctype="multipart/form-data">
            <label for="username" class="form-label">Nom d'utilisateur</label>
            <input type="text" class="form-control" id="username" placeholder="Entrez un nouveau nom d'utilisateur" name="username">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Nouveau Mot de Passe</label>
            <input type="password" class="form-control" id="password" placeholder="Entrez un nouveau mot de passe", name="password">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Courriel</label>
            <input type="email" class="form-control" id="email" placeholder="Entrez un nouvel email" name="email">
        </div>

        
        <div class="mb-3">
            <label for="profilePicture" class="form-label">Photo de Profil</label>
            <br>
            <input type="file" class="form-control-file" id="profilePicture" name="pfp">
        </div>
        
        
        <button class="btn btn-primary" type="submit">Sauvegarder les Changements</button>
        </form>
        <br>
        
        <a href="../index.php?action=logout"><button class="btn btn-danger mt-3">Se Déconnecter</button></a>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </div>
</body>
</html>