<div class="userDiv">  
    <?php include_once '../Controllers/getProfileUserController.php';
    $getProfileUserController = new getProfileUserController();
    echo $getProfileUserController->getProfileUser($_SESSION['userId']);
    ?>
</div>
