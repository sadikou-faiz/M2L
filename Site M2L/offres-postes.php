<?php 
session_start();
include "php-config/bdd-connexion.php";
if(!isset($_SESSION['user'])){
    
    header("location:connexion.php");
}
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$_SESSION['user']?> | Offres postés</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include "php-config/menu.php"?>
     <!-- section offres emploi -->
   <section class="jobs_list">
       <div class="page_title_descrip">
           <h1> Offres postés</h1>
           <p>Modifier et supprimer les offres que vous avez postés</p>
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
           <div class="jobs_list_desc">

               <?php
                 //afficher les offres d'emplois
                 $req = mysqli_query($con ,"SELECT * FROM offre where auteur='$user'");
                 if(mysqli_num_rows($req) > 0){
                    while($row = mysqli_fetch_assoc($req)){
                        ?>
                        <div class="job">
                            <h1><?=$row['nom'] ?></h1>
                            <p><?php echo $row['entreprise'] .'/'. $row['localisation'] .'('. $row['code_postal'].')'. '<span>'. $row['categorie'] .''?></span></p>
                            <p class="description"><?=$row['description']?></p>
                            <div class="date-btn">
                                <div class="modif-delete">
                                    <a class="modif" href="php-config/modification.php?id=<?=$row['id_emploi']?>">Modifier</a>
                                    <a  class="delete"href="php-config/suppression.php?id=<?=$row['id_emploi']?>">Supprimer</a>
                                </div>
                                <p><?=$row['date']?></p>
                            </div>
                        </div>
                        
                        <?php
                     }
                 }else {
                     echo "Vous n'avez poster aucune offre.";
                 }
                 
               ?>
               

             
       </div>

   </section>
   <?php include "php-config/footer.php"?>
</body>
</html>