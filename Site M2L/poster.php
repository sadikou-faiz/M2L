<?php 
session_start();
include "php-config/bdd-connexion.php";
if(!isset($_SESSION['user'])){
    
    header("location:connexion.php");
}
$user = $_SESSION['user'];
if(isset($_POST['add-job'])) {
    extract($_POST);
    if(isset($nom) && isset($categories) && isset($entreprise) && isset($ville) && isset($code_postal) && isset($description) && isset($date)){
       $req = mysqli_query($con,"INSERT INTO offre VALUES (null,'$entreprise','$description','$ville','$nom','$code_postal','$categories','$date','$user')");

       if($req){
           header("location:offres-postes.php");
       }else {
          
            $color = 'red';
            $message = "Votre offre d'emploi n'a pas été posté !" ;
       }
    }else {
        $color = 'red';
        $message = "veuillez remplir tout les champs !" ;
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
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include "php-config/menu.php"?>
   
    <section class="form postuler_form">
        
        <div class="search_bar_post search_postuler">
            <form action="recherche.php" method="POST">
                <input type="search" name="word" placeholder="Rechercher une offre..">
                <a href="offres-emplois.php">Offres</a>
            </form>
        </div>
        <h2>Poster une offre</h2>
        <form action="poster.php" method="POST" class="postuler-poster" >
            <div class="message"  style="background-color:<?php if(isset($color)) {echo $color;}?>"> 
                <?php
                   if(isset($message)){
                       echo "<h4>".$message." </h4>" ;
                   }
                ?>
                
            </div >
            <label>Titre</label>
            <input type="text" name="nom" >
            <label>categorie</label>
             <input type="text" list="categories" name="categories" id="">
             <datalist id="categories" >   
             <?php
                    $req = mysqli_query($con ," SELECT DISTINCT categorie FROM offre");
                    while($row = mysqli_fetch_assoc($req)){
                      echo "<option value=".$row['categorie'].">";
                    }
                 ?> 
             </datalist>
            <label>Entreprise</label>
            <input type="text" name="entreprise" >

            <label >Ville</label>
            <input type="text" name="ville" >
             
            <label> Code postal</label>
            <input type="number" name="code_postal" >

             
            <label>Description</label>
            <textarea name="description" id="" cols="30" rows="10"></textarea>

            
            
            <label>Date</label>
            <input type="date" name="date" >

            <input type="submit" value="Envoyer" name="add-job">
        </form>
    </section>
    <?php include "php-config/footer.php"?>
</body>
</html>