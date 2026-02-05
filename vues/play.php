<?php 
include_once 'userVerification.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Play</title>
</head>
<body class="homeBody">
<?php include 'navMenu.php';?>
  <?php include 'mainDiv.php';?>
  <?php include 'userDiv.php';?>
  <?php
  $idPost = isset($_GET['idPost']) ? $_GET['idPost'] : null;
        if ($idPost){
            include_once '../Controllers/playController.php';
            include_once '../modeles/userDAO.php';
            $pdo = new PDO('mysql:host=localhost;dbname=apollon', 'apollon', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $userDAO = new UserDAO($pdo);
            $playController = new PlayController($userDAO);
            echo $playController->play($idPost, $pdo);
        }
        else{
            echo 'rien a jouer';
        }

    ?>
</div>
</div>
</body>
</html>