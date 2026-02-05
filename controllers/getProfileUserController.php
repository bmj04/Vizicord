<?php
    $cheminModele = dirname(__DIR__) . "\\modeles\userDAO.php";
    include_once ($cheminModele);
    class getProfileUserController{
            public function __construct(){

            }    
            public function getProfileUser($userId){
                $htmlInfos = '';
                $pdo = new PDO('mysql:host=localhost;dbname=apollon', 'apollon', '');
                $userDAO = new UserDAO($pdo);
                $userId = $_SESSION['userId'];
                $userInfo = $userDAO->getProfileUser($userId, $pdo);
                $htmlInfos .= '<img class="Pfp" src="' . htmlspecialchars($userInfo['pfp']) . '">';
                $htmlInfos .= '<p class="username">' . htmlspecialchars($userInfo['username']) .'</p>';
                return $htmlInfos;
                
            }
    }
?>