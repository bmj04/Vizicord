<?php
$cheminModele = dirname(__DIR__) . "\\modeles\userDAO.php";
include_once ($cheminModele);
class UploadController{
    private $userDAO;
    public function __construct(UserDAO $userDAO) {
        $this->userDAO = $userDAO;
    }
    public function upload($userId, $title, $description, $category, $status, $file_source, $pdo){
        $this->userDAO->createPost($userId, $title, $description, $category, $status, $file_source, $pdo);
        $_SESSION['upload_success'] = 'Le fichier a été téléchargé avec succès !';
        header('Location: http://localhost/Vizicord/vues/userMain.php');
        exit;
}
}
?>