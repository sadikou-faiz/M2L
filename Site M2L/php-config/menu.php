
        
        <header>
            <div>
                <div class="toggle_menu"></div>
                <div class="logo">
                   <a href="index.php"> <h2> <span>M</span>2L</h2></a>
                </div>
                <ul class="menu">
                    <li><a href="index.php">Acceuil</a></li>
                    <li><a href="a-propos.php">à propos</a></li>   
                    <li><a href="offres-emplois.php">offres d'emplois</a></li>
                </ul>
            </div>
            <ul class="log-sign">
                <?php 
                  if( isset($_SESSION['user'])){
                      ?>
                      <li><p class="user_email"><?=$_SESSION['user']?> Connecté(e).</p></li>
                      <li><a href="offres-postes.php">Offres postés</a></li>
                      <li><a href="deconnexion.php">Deconnexion</a></li>
                      <?php
                  }else{
                ?>
                    <li><a href="inscription.php">s'inscrire</a></li>
                    <li><a href="connexion.php">Se connecter</a></li>
                <?php 
                }?>

            </ul>
            
    </header>



    <script>
       
       var toggle_menu = document.querySelector('.toggle_menu') ;
       var menu = document.querySelector('.menu') ;
       toggle_menu.onclick = function() {
          toggle_menu.classList.toggle('active') ;
          menu.classList.toggle('responsive')
       }

    </script>
   
   
