<?php 
    include_once 'modeles\userDAO.php';
    session_start();
    $pdo = new PDO('mysql:host=localhost;dbname=apollon', 'apollon', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
    $userDAO = new UserDAO($pdo);
    $action = isset($_GET['action']) ? $_GET['action'] : null;
    
 if (isset($action)){
    if ($action == 'login'){
        $email = $_POST['email'];
        $password = $_POST['password'];
        include_once 'Controllers/loginController.php';
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $loginController = new LoginController($userDAO);
            $loginController->login($email, $password, $pdo);
        }
    }
     else if ($action == 'register') {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        include_once 'Controllers/registerController.php';
        $registerController = new RegisterController($userDAO);
        $registerController->register($username, $email, $password, $pdo);
    }
    else if ($action == 'upload'){
        include_once 'Controllers/uploadController.php';
        $userId = $_SESSION['userId'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $file_source = $_FILES['file_source'];
        $category = $_POST['category'];
        $status = $_POST['status'];
        $uploadController = new UploadController($userDAO);
        $uploadController->upload($userId, $title, $description, $category, $status, $file_source, $pdo);

    }
    else if ($action == 'deletePost'){
        include_once 'Controllers/deletePostController.php';
        $data = json_decode(file_get_contents('php://input'), true);
        $postId = $data['post_id'] ?? null;
        $deletePostController = new DeletePostController($userDAO);
        $deletePostController->deletePost($postId, $pdo);
        echo json_encode(["success" => true]);
    }
    else if ($action == 'updateProfile'){
        include_once 'Controllers/updateProfileController.php';
        $updateProfileController = new updateProfileController($userDAO);
        try{
            $updateProfileController->UpdateProfile($_SESSION['userId'], $_POST['username'], $_POST['password'], $_POST['email'], $_FILES['pfp'], $pdo);
            $_SESSION['updateProfileSuccess'] = 'Votre profil a été mis à jour';
            header('Location: http://localhost/Vizicord/vues/Parametres.php');
        } catch(PDOException $e){
            echo $e.getMessage();
        }




    }
    else if ($action == 'logout'){
        $_SESSION = array();
        session_destroy();
        header('Location: http://localhost/Vizicord/vues/Accueil.php');
        
    }
    else if ($action == 'pin'){
        include_once 'Controllers/toPinController.php';
        $data = json_decode(file_get_contents('php://input'), true);
        $postId = $data['post_id'] ?? null;
        $controller = new toPinController($userDAO);
        $controller->toPin($postId, $pdo);
        echo json_encode(["success" => true]);
    }
}
else{
    header('Location: http://localhost/Vizicord/vues/Accueil.php');
}
    
?>