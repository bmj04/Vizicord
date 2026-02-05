<?php 
    include_once 'C:\xampp\htdocs\Vizicord\modeles\userDAO.php';;
    class userController {
        private $userDAO;

    public function __construct(userDAO $userDAO) {
        $this->userDAO = $userDAO;
    }

    public function likePost($userId, $postId) {
        $this->userDAO->like($userId, $postId);
    }

    public function sharePost($userId, $postId) {
        $this->userDAO->share($userId, $postId);
    }

    public function commentOnPost($userId, $postId, $comment) {
        $this->userDAO->comment($userId, $postId, $comment);
    }

    public function createPlaylist($playlistId, $postId) {
        $this->userDAO->createPlaylist($playlistId, $postId);
    }

    public function createPost($userId, $name, $description) {
        $this->userDAO->createPost($userId, $name, $description);
    }

    public function deletePost($userId, $id) {
        $this->userDAO->deletePost($userId, $id);
    }

    public function addFriend($userId, $friendId) {
        $this->userDAO->addFriend($userId, $friendId);
    }

    public function deleteFriend($userId, $friendId) {
        $this->userDAO->deleteFriend($userId, $friendId);
    }

    public function deletePlaylist($playlistId) {
        $this->userDAO->deletePlaylist($playlistId);
    }

    public function createUser($username, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->userDAO->createUser($username, $email, $hashedPassword);
    }

    public function deleteUser($userId) {
        $this->userDAO->deleteUser($userId);
    }
}
    
    ?>