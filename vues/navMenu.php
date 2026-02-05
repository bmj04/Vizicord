<div class="Navmenu">
                    <a href="userMain.php"><i class="fa-solid fa-house"></i></a>
                    <a href="upload.php"><i class="fa-solid fa-upload"></i></a>
                    <a href="library.php"><i class="fa-solid fa-book-open"></i></a>
                    <?php if (isset($_SESSION['adminLoggedIn'])){
                        //echo '<a href="users.php"><i class="fa-solid fa-user-group"></i></a>';
                        echo '<a href="everyposts.php"><i class="fa-solid fa-photo-film"></i></a>';
                    } ?>
                    <!--<a href="notifications.php"><i class="fa-solid fa-bell"></i></a>-->
                    <a href="parametres.php"><i class="fa-solid fa-gear"></i></a> 
</div>
