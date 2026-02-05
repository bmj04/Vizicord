<?php
$cheminModele = dirname(__DIR__) . "\\modeles\userDAO.php";
include_once ($cheminModele);
class LoginController {
    private $userDAO;
    public function __construct(UserDAO $userDAO) {
        $this->userDAO = $userDAO;
    }

    public function login($email, $password, $pdo) {
        if ($this->userDAO->verifyUser($email, $password)) {
            $userId = $this->userDAO->getId($pdo, $email);
            $_SESSION['userId'] = $userId;
            if ($this->userDAO->verifyAdmin($userId, $pdo) == true){
                $_SESSION['adminLoggedIn'] = "true";
                header('Location: http://localhost/Vizicord/vues/userMain.php');
            }
            else{
            header('Location: http://localhost/Vizicord/vues/userMain.php');
            exit;
            }
        } else {
            $_SESSION['failedlogin'] = "Informations de connexion invalides";
            header('Location: http://localhost/Vizicord/vues/Accueil.php');
        }
    }

} 
    
    
?>