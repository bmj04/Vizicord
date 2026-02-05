<?php 
$cheminModele = dirname(__DIR__) . "\\modeles\userDAO.php";
include_once ($cheminModele);
class PlayController {
    private $userDAO;
    public function __construct(UserDAO $userDAO) {
        $this->userDAO = $userDAO;
    }
    public function play($id, $pdo){
        $post = $this->userDAO->getPost($id, $pdo);
        $file_source = $post['file_source'];
        $fileType = strtolower(pathinfo($file_source, PATHINFO_EXTENSION));
        $playHtml = '';
        
            if (in_array($fileType, ['mp3', 'wav', 'ogg'])) {
                $file =  '<div class="audioPostDiv"><i class="fa-solid fa-volume-high"></i><audio controls src="' . htmlspecialchars($file_source) . '" class="audioPost">Votre navigateur ne prend pas en charge l\'élément audio.</audio></div>';
            } elseif (in_array($fileType, ['mp4', 'webm', 'ogg'])) {
                $file =  '<div class="videoPost"><video controls src="' . htmlspecialchars($file_source) . '">Votre navigateur ne prend pas en charge l\'élément vidéo.</video></div>';
            }
            elseif ($fileType == 'gif' || $fileType == 'webp') {
                
                $file =  '<img src="' . htmlspecialchars($file_source) . '" alt="GIF" class="gif">';
            }
            else {
                $file =  'Format de fichier non pris en charge.';
            }
            $playHtml .= $file;
            $infos = $this->userDAO->getProfileUser($post['author_Id'], $pdo);
            $playHtml .= '<div class="postDetails">
            <div class="titlePost"> <h1> ' . htmlspecialchars($post['title']) . '</h1></div>
            <div class="descriptionPost">Description: ' . htmlspecialchars($post['description']) . '<br></div>
            <div class="statusPost">STATUT: ' . htmlspecialchars($post['status']) . '</div>
            <div class="categoryPost">CATÉGORIE: ' . htmlspecialchars($post['category']) . '</div>
            <div class="authorPost">AUTEUR: ' . htmlspecialchars($infos['username']) . '</div>';
            return $playHtml;


    }
}
