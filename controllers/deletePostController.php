<?php
    $cheminModele = dirname(__DIR__) . "\\modeles\userDAO.php";
    include_once ($cheminModele);
    class DeletePostController{
        private $userDAO;
        public function __construct(UserDAO $userDAO) {
            $this->userDAO = $userDAO;
        }
        public function deletePost($postId, $pdo){
            $this->userDAO->deletePost($postId, $pdo);
        }
    }
?>