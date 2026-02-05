<?php
    $cheminModele = dirname(__DIR__) . "\\modeles\userDAO.php";
    include_once ($cheminModele);
    class adminController{
        private $amisDao;
        private $utilisateurDao;
        
        private $adminDAO;

    public function __construct(adminDAO $adminDAO) {
        $this->adminDAO = $adminDAO;
    }

    
    public function createPost($userId, $name, $description) {
        $this->adminDAO->createPost($userId, $name, $description);
    }

    
    public function deletePost($userId, $postId) {
        $this->adminDAO->deletePost($userId, $postId);
    }

    
    public function likePost($userId, $postId) {
        $this->adminDAO->like($userId, $postId);
    }


    public function sharePost($userId, $postId) {
        $this->adminDAO->share($userId, $postId);
    }

    
    public function commentOnPost($userId, $postId, $comment) {
        $this->adminDAO->comment($userId, $postId, $comment);
    }

    
    public function createPlaylist($playlistId, $postId) {
        $this->adminDAO->createPlaylist($playlistId, $postId);
    }

    
    public function addFriend($userId, $friendId) {
        $this->adminDAO->addFriend($userId, $friendId);
    }

    
    public function deleteFriend($userId, $friendId) {
        $this->adminDAO->deleteFriend($userId, $friendId);
    }

    
    public function createUser($username, $email, $password) {
        $this->adminDAO->createUser($username, $email, $password);
    }

    
    public function deleteUser($userId) {
        $this->adminDAO->deleteUser($userId);
    }

    
    public function deletePlaylist($playlistId) {
        $this->adminDAO->supprimerPlaylist($playlistId);
    }
}
    ?>