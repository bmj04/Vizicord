<?php 
interface InterfaceDAO {
    public function createPost($userId, $title, $description, $category, $status, $file, $pdo);   
    public function deletePost($idUtilisateur, $idContenu);
    public function like($idUtilisateur, $idContenu);
    public function share($idUtilisateur, $idContenu);
    public function comment($idUtilisateur, $idContenu, $commentaire);
    public function createPlaylist($idListe, $contenuId);
    public function addFriend($idUtilisateur, $idAmi);
    public function deleteFriend($idUtilisateur, $idAmi);
    public function createUser($username, $email, $password, $pdo);
    public function deleteUser($idUtilisateur);
}
?>