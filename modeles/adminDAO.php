<?php
    include_once('interfaceDAO.php') ;
    class adminDAO implements InterfaceDAO {
        private $pdo;
    
        public function __construct($pdo) {
            $this->pdo = $pdo;
        }
    
        public function like($userId, $postId) {
            $sql = "INSERT INTO likedPosts (userId, postId) VALUES (:userId, :postId)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':userId', $userId);
            $stmt->bindParam(':postId', $postId);
            $stmt->execute();
        }
    
        public function share($userId, $postId) {
            $sql = "INSERT INTO shares (userId, postId) VALUES (:userId, :postId)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':userId', $userId);
            $stmt->bindParam(':postId', $postId);
            $stmt->execute();
        }
    
        public function comment($userId, $postId, $comment) {
            $sql = "INSERT INTO comments (postId, userId, comment) VALUES (:postId, :userId, :comment)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':postId', $postId);
            $stmt->bindParam(':userId', $userId);
            $stmt->bindParam(':comment', $comment);
            $stmt->execute();
        }
        public function getPost($id, $pdo){
            $sql = "SELECT * FROM posts WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        public function createPlaylist($playlistId, $postId) {
            $sql = "INSERT INTO playlist (playlistId, idPost) VALUES (:playlistId, :idPost)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':playlistId', $playlistId);
            $stmt->bindParam(':idPost', $postId);
            $stmt->execute();
        }
        public function createPost($userId, $title, $description, $category, $status, $file, $pdo) {
            $destination_path = 'C:\xampp\htdocs\Vizicord\uploads\\' . $file['name'];
            $file_source = 'http://localhost/Vizicord/uploads/' . $file['name'];
            if (move_uploaded_file($file['tmp_name'], $destination_path)) {
                $sql = "INSERT INTO posts (title, description, author_Id, category, status, file_source) VALUES (:name, :description, :userId, :category, :status, :file_source)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':name', $title);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':userId', $userId);
                $stmt->bindParam(':category', $category);
                $stmt->bindParam(':status', $status);
                $stmt->bindParam(':file_source', $file_source);
                $stmt->execute();
            }
            else{
                echo '<h1>file not found</h1>';
            }
        }
    
        public function deletePost($id, $pdo) {
            $sql = "DELETE FROM posts WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }
        function getPosts($userId, $pdo) {
            try {
                $stmt = $pdo->prepare("SELECT * FROM posts WHERE author_Id = :userId");
                $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "Erreur lors de la récupération des posts: " . $e->getMessage();
            }
        }
        
        public function addFriend($userId, $friendId) {
        }
    
        public function deleteFriend($userId, $friendId) {
        }
    
        public function deletePlaylist($playlistId) {
            $sql = "DELETE FROM playlist WHERE playlistId = :playlistId";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':playlistId', $playlistId, PDO::PARAM_INT);
            return $stmt->execute();
        }
        public function createUser($username, $email, $password, $pdo) {
            try {
                $pfp = 'http://localhost/Vizicord/pfps/defaultPfp.jpg';
                $sql = "INSERT INTO users (username, email, password, pfp) VALUES (:username, :email, :password, :pfp)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $password);
                $stmt->bindParam(':pfp', $pfp);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                throw $e;
            }
        }
        
        public function verifyUser($email, $password) {
            $sql = "SELECT password FROM users WHERE email = :email";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if ($password == $row['password']){
                    return true;
                }
                else{
                    return false;
                }
            }
            
            
       
    }

        public function deleteUser($userId) {}
        public function getId($pdo, $email){
            try {
                $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email");
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    return $row['id'];
                } else {
                    return null; 
                }
            } catch (PDOException $e) {
                error_log("Erreur lors de la récupération de l'ID de l'utilisateur : " . $e->getMessage());
                return null;
            }
        }
        public function getProfileUser($userId, $pdo) {
            $stmt = $pdo->prepare("SELECT username, pfp FROM users WHERE id = :userId");
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        public function updateProfile($userId, $dataToUpdate, $pdo) {
            $updates = [];
            foreach ($dataToUpdate as $key => $value) {
                $updates[] = "$key = :$key";
            }
            $sql = "UPDATE users SET " . implode(', ', $updates) . " WHERE id = :userId";
            $stmt = $pdo->prepare($sql);
            foreach ($dataToUpdate as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
            $stmt->execute();
        }
    }
    

    
    

    
    
?>
