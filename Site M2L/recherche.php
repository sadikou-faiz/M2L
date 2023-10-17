<?php 
session_start();
include "php-config/bdd-connexion.php";
if(isset($_POST['word'])){
    $word = $_POST['word'];
}else {
    $word = $_GET['word'];
}

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
      ;
      
?>
   <!-- section offres emploi -->
   <section class="jobs_list">
       <div class="page_title_descrip">
           <h1> Recherche</h1>
           <p>Mot : <?=$word?></p>
       </div>
       <div class="search_bar_post ">
           <form action="" method="POST">
               <input type="search" name="word" placeholder="Rechercher une offre..">
               <a href="poster.php">Poster</a>
           </form>
       </div>
      
       <div class="jobs_categories">
           <div class="jobs_list_desc job_search">
               <?php
                 //afficher les offres d'emplois
                 $req = mysqli_query($con ,"SELECT * FROM offre  WHERE nom LIKE '%$word%' OR categorie LIKE '%$word'");
                if(mysqli_num_rows($req) == 0){
                   echo "Aucun résultat";
                }else {
                    while($row = mysqli_fetch_assoc($req)){
                        ?>
                        <div class="job">
                            <h1><?=$row['nom'] ?></h1>
                            <p><?php echo $row['entreprise'] .'/'. $row['localisation'] .'('. $row['code_postal'].')'. '<span>'. $row['categorie'] .''?></span></p>
                            <p class="description"><?=$row['description']?></p>
                            <div class="date-btn">
                            <a class="disable" href="postuler.php?id=<?=$row['id_emploi']?>">Postuler</a>
                              <?php include "php-config/unable_btn.php"?>
                               <p><?=$row['date']?></p>
                            </div>
                        </div>
                        
                        <?php
                     }
                }
               ?>
               
               <a id="back_btn" href="offres-emplois.php">Retour</a>
             
       </div>

   </section>
   <?php include "php-config/footer.php"?>

</body>
</html>