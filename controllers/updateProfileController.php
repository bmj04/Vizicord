<?php 
$cheminModele = dirname(__DIR__) . "\\modeles\userDAO.php";
include_once ($cheminModele);
class UpdateProfileController {
    private $userDAO;

    public function __construct(UserDAO $userDAO) {
        $this->userDAO = $userDAO;
    }

    public function updateProfile($userId, $username, $password, $email, $pfp, $pdo) {
        if (!empty($username)) {
            $dataToUpdate['username'] = $username;
        }
        if (!empty($password)) {
            $dataToUpdate['password'] = $password;
        }
        if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $dataToUpdate['email'] = $email;
        }
        if (!empty($pfp)) {
            $destination_path = dirname(__DIR__) . '\\pfps\\' . $pfp['name'];
            $pfp_source = 'http://localhost/Vizicord/pfps/' . $pfp['name'];
            if (move_uploaded_file($pfp['tmp_name'], $destination_path)) {
            $dataToUpdate['pfp'] = $pfp_source; 
            }
        }
        if (!empty($dataToUpdate)) {
            $this->userDAO->updateProfile($userId, $dataToUpdate, $pdo);
        }
        return true;
    }
}
?>