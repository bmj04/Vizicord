<?php
include_once 'userVerification.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body class="homeBody">
<?php include 'navMenu.php';?>
  <?php include 'mainDiv.php';?>
  <?php include 'userDiv.php';?>
  <div class="Line4"></div>
  <div class="Ajouterplaylistdiv"></div>
  <div class="Ajouterpostdiv"></div>
  <div class="Line1"></div>
  <div class="Line2"></div>
  <div class="Playlists">PLAYLISTS<br/></div>
  <div class="Publications">PUBLICATIONS</div>
  <div class="Line3"></div>
  <div class="Plusplaylist">
  <i class="fa-solid fa-plus"></i>
  </div>
  <div class="Pluspost">
  <a href="upload.php"><i class="fa-solid fa-plus"></i></a>
  </div>
  <div class="Ajouterplaylist">Ajouter</div>
  <div class="Ajoutercontenu">Ajouter</div>
</div>
<div class="postsDiv">
<?php
      include_once('../Controllers/getPostsController.php');
      $controller = new getPostsController();
      if (isset($_GET['action'])){
        $filter = $_GET['action'];
        $postHtml = $controller->filterPosts($filter);
      }
      else{
      $postHtml = $controller->displayPosts();  
      }
      echo $postHtml;
    ?>  
    </div>
    <script>
      document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.optionsIcon').forEach(icon=> { icon.addEventListener('click', function(event) {
            let menu = this.nextElementSibling;
            triggerRect = this.getBoundingClientRect();
            menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
            menu.style.top = (triggerRect.top - 400) + 'px'; 
            menu.style.left = (triggerRect.left - 560) + 'px'; 
            event.stopPropagation(); 
  });
});
      });
      document.querySelectorAll('.deletePost').forEach(element => {
        element.addEventListener('click', function(e) {
            e.preventDefault(); 
            const postId = this.getAttribute('data-post-id');
            if (confirm('Êtes-vous sûr de vouloir supprimer ce post ?')) {
                fetch('../index.php?action=deletePost', {
                    method: 'POST',
                    body: JSON.stringify({ post_id: postId }),
                    headers: {
                        'Content-Type': 'application/json'
                    }

                })
                .then(response => response.json())
                .then(data => {
    if (data.success) {
        document.querySelector(`.post[data-post-id="${postId}"]`).remove();

    }
})
                .catch(error => console.error('Erreur:', error));
            }
        });
    });
    document.querySelectorAll('.pin').forEach(element => {
        element.addEventListener('click', function(e) {
            e.preventDefault(); 
            const postId = this.getAttribute('data-post-id');
            console.log(this.getAttribute('data-post-id'));
                fetch('../index.php?action=pin', {
                    method: 'POST',
                    body: JSON.stringify({ post_id: postId }),
                    headers: {
                        'Content-Type': 'application/json'
                    }

                })
                .then(response => response.json())
                .then(data => {
    if (data.success) {
        alert("Épinglé avec succès");

    }
})
                .catch(error => console.error('Erreur:', error));
            
        });
    });
</script>
</div>
