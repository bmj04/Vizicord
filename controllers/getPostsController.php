<?php
$cheminModele = dirname(__DIR__) . "\\modeles\userDAO.php";
include_once ($cheminModele);
class getPostsController{
    public function __construct() {
    }
    public function displayPosts(){
        $pdo = new PDO('mysql:host=localhost;dbname=apollon', 'apollon', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $userDAO = new userDAO($pdo);
        $postsHtml = '';
        if (isset($_SESSION['adminLoggedIn']) && isset($_SESSION['getAllPosts'])){
            foreach ($userDAO->getAllPosts($pdo) as $post){
                $postId = $post['id'];
                $postsHtml .= '<style>.menu-option:hover {background-color:#797676; cursor:pointer;}</style>';
                $postsHtml .= '<div class="post" data-post-id="' . $postId . '">';
                $postsHtml .= '    <div class="iconePost">';
                $postsHtml .= '       <a href="play.php?idPost=' . $postId . '"><i class="fa-solid fa-play"></i></a>'; 
                $postsHtml .= '    </div>';
                $postsHtml .= '    <div class="titlePostFromController">' . htmlspecialchars($post['title']) . '</div>';
                $postsHtml .= '<i class="fa-solid fa-ellipsis-vertical optionsIcon"style="color:#797676;;position:relative;top:25%; left:45%; cursor:pointer;z-index:1;"></i>';
                $postsHtml .= '<div class="options-menu" style="display: none; position:absolute; background-color: grey;border: 1px solid #ccc;box-shadow: 0 2px 5px rgba(0,0,0,0.2);border-radius: 5px;padding: 5px;z-index: 1000;"><a href="#" class="menu-option pin" style="display: block;padding: 5px 10px;text-decoration: none;color: #333;" data-post-id="' .$postId .'">Épingler</a><a href="#"data-post-id="' . $postId . '"class="menu-option deletePost" style="display: block;padding: 5px 10px;text-decoration: none;color: #333;">Supprimer le post</a></div>';
                $postsHtml .= '</div>';
    }
            
        }
        else{
        foreach ($userDAO->getPosts($_SESSION['userId'], $pdo) as $post){
                $postId = $post['id'];
                $postsHtml .= '<style>.menu-option:hover {background-color:#797676; cursor:pointer;}</style>';
                $postsHtml .= '<div class="post" data-post-id="' . $postId . '">';
                $postsHtml .= '    <div class="iconePost">';
                $postsHtml .= '       <a href="play.php?idPost=' . $postId . '"><i class="fa-solid fa-play"></i></a>'; 
                $postsHtml .= '    </div>';
                $postsHtml .= '    <div class="titlePostFromController">' . htmlspecialchars($post['title']) . '</div>';
                $postsHtml .= '<i class="fa-solid fa-ellipsis-vertical optionsIcon"style="color:#797676;;position:relative;top:25%; left:45%; cursor:pointer;z-index:1;"></i>';
                $postsHtml .= '<div class="options-menu" style="display: none; position:absolute; background-color: grey;border: 1px solid #ccc;box-shadow: 0 2px 5px rgba(0,0,0,0.2);border-radius: 5px;padding: 5px;z-index: 1000;"><a href="#" class="menu-option pin" style="display: block;padding: 5px 10px;text-decoration: none;color: #333;" data-post-id="' .$postId .'">Épingler</a><a href="#"data-post-id="' . $postId . '"class="menu-option deletePost" style="display: block;padding: 5px 10px;text-decoration: none;color: #333;">Supprimer le post</a></div>';
                $postsHtml .= '</div>';
    }
    }
    return $postsHtml;
}
public function filterPosts($filter){
        $pdo = new PDO('mysql:host=localhost;dbname=apollon', 'apollon', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $userDAO = new userDAO($pdo);
        $postsHtml = '';
    foreach ($userDAO->getPosts($_SESSION['userId'], $pdo) as $post){
        if ($post['category'] == $filter){
            $postId = $post['id'];
            $postsHtml .= '<style>.menu-option:hover {background-color:#797676; cursor:pointer;}</style>';
            $postsHtml .= '<div class="post" data-post-id="' . $postId . '">';
            $postsHtml .= '    <div class="iconePost">';
            $postsHtml .= '       <a href="play.php?idPost=' . $postId . '"><i class="fa-solid fa-play"></i></a>'; 
            $postsHtml .= '    </div>';
            $postsHtml .= '    <div class="titlePostFromController">' . htmlspecialchars($post['title']) . '</div>';
            $postsHtml .= '<i class="fa-solid fa-ellipsis-vertical optionsIcon"style="color:#797676;;position:relative;top:25%; left:45%; cursor:pointer;z-index:1;"></i>';
            $postsHtml .= '<div class="options-menu" style="display: none; position:absolute; background-color: grey;border: 1px solid #ccc;box-shadow: 0 2px 5px rgba(0,0,0,0.2);border-radius: 5px;padding: 5px;z-index: 1000;"><a href="#" class="menu-option pin" style="display: block;padding: 5px 10px;text-decoration: none;color: #333;" data-post-id="' .$postId .'">Épingler</a><a href="#"data-post-id="' . $postId . '"class="menu-option deletePost" style="display: block;padding: 5px 10px;text-decoration: none;color: #333;">Supprimer le post</a></div>';
            $postsHtml .= '</div>';
        }
        
}
return $postsHtml;
} 
}
    
?>