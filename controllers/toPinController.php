<?php
$cheminModele = dirname(__DIR__) . "\\modeles\userDAO.php";
include_once ($cheminModele);
class toPinController {
    private $userDAO;

    public function __construct(UserDAO $userDAO) {
        $this->userDAO = $userDAO;
    }
    public function toPin($postId, $pdo){
        $this->userDAO->toPin($postId, $pdo, $_SESSION['userId']);
    }
}
?>