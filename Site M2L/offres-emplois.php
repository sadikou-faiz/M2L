<?php 
session_start();
if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
}else {
    $user = "no";
}
include "php-config/bdd-connexion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=$, initial-scale=1.0">
    <title>M2L - Acceuil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include "php-config/menu.php";
      
?>
   <!-- section offres emploi -->
   <section class="jobs_list">
       <div class="page_title_descrip">
           <h1>Offres d'emploi</h1>
           <p>Toutes les offres d'emploi de la région dans le domaine du sport.</p>
       </div>
       <div class="search_bar_post ">
           <form action="recherche.php" method="POST">
               <input type="search" name="word" placeholder="Rechercher une offre..">
               <a href="poster.php">Poster</a>
           </form>
       </div>

       <div class="jobs_categories">
           <div class="categories">
           <h4>CATEGORIES</h4>
               <?php 
                 //afficher les catégories
                 $req = mysqli_query($con ," SELECT DISTINCT categorie FROM offre");
                 while($row = mysqli_fetch_assoc($req)){
                   echo "<a href='recherche.php?word=".$row["categorie"]."'>".$row["categorie"]."</a>";
                 }
               ?>
               
           </div>
           <p class="show_message">Connectez vous pour postuler.</p>
           <div class="jobs_list_desc">
  
               <?php
                 //afficher les offres d'emplois
                 $req = mysqli_query($con ,"SELECT * FROM offre");
                 while($row = mysqli_fetch_assoc($req)){
                    ?>
                    <div class="job">
                        <h1><?=$row['nom'] ?></h1>
                        <p><?php echo $row['entreprise'] .'/'. $row['localisation'] .'('. $row['code_postal'].')'. '<span>'. $row['categorie'] .''?></span></p>
                        <p class="description"><?=$row['description']?></p>
                        
                        <div class="date-btn">
                            <?php 
                              
                             if ( $user == $row['auteur']){
                                 echo '<p>Vous ne pouvez pas postuler</p>';
                             }else {
                                 ?>
                                  <a class="disable unable_to_click" href="postuler.php?id=<?=$row['id_emploi']?>">Postuler</a>
                                 <?php
                             }
                            ?>
                    
                          <?php include "php-config/unable_btn.php"?>
                           <p><?=$row['date']?></p>
                        </div>
                    </div>
                    
                    <?php
                 }
               ?>
               

             
       </div>

   </section>
   <?php include "php-config/footer.php"?>

</body>
</html>