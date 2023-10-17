<?php 
session_start();
include "bdd-connexion.php";
if(!isset($_SESSION['user'])){
    
    header("location:connexion.php");
}
$user = $_SESSION['user'];
$id = $_GET['id'];
if(isset($_POST['modif-job'])) {
    extract($_POST);
    if(isset($nom) && isset($categories) && isset($entreprise) && isset($ville) && isset($code_postal) && isset($description) && isset($date)){
       $modif = mysqli_query($con , "UPDATE offre SET entreprise = '$entreprise', description = '$description', localisation = '$ville', nom = '$nom', code_postal = $code_postal, categorie = '$categories', date = '$date' WHERE id_emploi = $id;");
       if($modif){
           header("location:../offres-postes.php");
       }else {
          
            $color = 'red';
            $message = "Votre offre d'emploi n'a pas été  modifié !" ;
       }
    }else {
        $color = 'red';
        $message = "veuillez remplir tout les champs!" ;
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=$, initial-scale=1.0">
    <title>M2L -Postuler </title>
    <link rel="stylesheet" href="../style.css">

</head>
<body>

   
    <section class="form postuler_form">
        
        <div class="search_bar_post search_postuler">
            <form action="../recherche.php" method="POST">
                <input type="search" name="word" placeholder="Rechercher une offre..">
                <a href="../offres-emplois.php">Offres</a>
            </form>
        </div>
        <?php 
           $req1= mysqli_query($con,"SELECT * FROM offre WHERE id_emploi='$id'");
           $row1 = mysqli_fetch_assoc($req1);
        ?>
        <h2> Modification de l'offre : <span class="name"> <?=$row1['nom']?></span> </h2>
        <form action="" method="POST" class="postuler-poster" >
            <div><a id="back_btn" href="../offres-postes.php">Retour</a></div>
            <div class="message"  style="background-color:<?php if(isset($color)) {echo $color;}?>"> 
                <?php
                   if(isset($message)){
                       echo "<h4>".$message." </h4>" ;
                   }
                ?>
                
            </div >
            <label>Titre</label>
            <input type="text" name="nom"  value="<?=$row1['nom']?>">
            <label>categorie</label>
             <input type="text" list="categories" name="categories" value="<?=$row1['categorie']?>">
             <datalist id="categories" >   
             <?php
                    $req = mysqli_query($con ," SELECT DISTINCT categorie FROM offre");
                    while($row = mysqli_fetch_assoc($req)){
                      echo "<option value=".$row['categorie'].">";
                    }
                 ?> 
             </datalist>
            <label>Entreprise</label>
            <input type="text" name="entreprise" value="<?=$row1['entreprise']?>">

            <label >Ville</label>
            <input type="text" name="ville" value="<?=$row1['localisation']?>">
             
            <label> Code postal</label>
            <input type="number" name="code_postal" value="<?=$row1['code_postal']?>">

             
            <label>Description</label>
            <textarea name="description"  cols="30" rows="10" ><?=$row1['description']?></textarea>

            
            
            <label>Date</label>
            <input type="date" name="date" value="<?=$row1['date']?>" >

            <input type="submit" value="Modifier" name="modif-job">
        </form>
    </section>
    <?php include "footer.php"?>
</body>
</html>