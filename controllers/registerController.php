<?php 
$cheminModele = dirname(__DIR__) . "\\modeles\userDAO.php";
include_once ($cheminModele);
class RegisterController{
    public function __construct(UserDAO $userDAO) {
        $this->userDAO = $userDAO;
    }
    public function register($username, $email, $password, $pdo){
        if (isset($_POST['register'])) {
            $this->userDAO->createUser($username, $email, $password, $pdo);
            $userId = $this->userDAO->getId($pdo, $email);
            $_SESSION['userId'] = $userId;
            header('Location: http://localhost/Vizicord/vues/userMain.php');
        }
}
}   
?>