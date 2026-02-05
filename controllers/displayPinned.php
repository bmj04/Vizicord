<?php
$cheminModele = dirname(__DIR__) . "\\modeles\userDAO.php";
include_once ($cheminModele);
class displayPinned{
    public function __construct() {
    }
    public function displayPinned(){
        $pdo = new PDO('mysql:host=localhost;dbname=apollon', 'apollon', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $userDAO = new UserDAO($pdo);
        $pinnedId = $userDAO->getPin($_SESSION['userId'], $pdo);
        if ($pinnedId != false){
            $post = $userDAO->getPost($pinnedId['pinned'], $pdo);
            if ($post != false){
            $htmlPinned = 
            '<div class="Favori">
            <h1 class="FavoriTitle">' . htmlspecialchars($post['title']) . '</h1>
            <div class="Linefavori"></div>
            <div class="lienFavoriPlay">
            <a href="play.php?idPost=' . htmlspecialchars($post['id']) . '"><i class="fa-solid fa-play"></i></a>
        </div></div>';
        }
        else{
            $htmlPinned = '<div class="Favori">
            <h1 class="FavoriTitle">ÉPINGLÉ</h1>
            <div class="Linefavori"></div>
            <div class="lienFavoriPlay">
            <a href="library.php"><i class="fa-solid fa-question"></i></a>
        </div>
          </div>';
        }
        
    return $htmlPinned;



    }
}
}
?>