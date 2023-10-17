<?php 
session_start();
include "php-config/bdd-connexion.php";
if(!isset($_SESSION['user'])){
    
    header("location:connexion.php");
}
$user_email = $_SESSION["user"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=$, initial-scale=1.0">
    <title>M2L - Poster </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include "php-config/menu.php"?>
   
    <section class="form postuler_form">
        <h2>Postuler a cette offre</h2>
        <div class="search_bar_post search_postuler">
            <form action="recherche.php" method="POST">
                <input type="search" name="word" placeholder="Rechercher une offre..">
                <a href="poster.php">Poster</a>
            </form>
        </div>
        <form action="" class="postuler-poster">
            <label>Email</label>
            <input type="email"  readonly  value ="<?=$user_email?>" readonly>
            <label>Objet</label>
            <?php 
              $id = $_GET['id'] ;
              //Récuperer le nom de l'ofre d'emploi et de l'entreprise
              $req = mysqli_query($con , "SELECT *  FROM offre WHERE id_emploi = '$id'");
              $row = mysqli_fetch_assoc($req);
             ?>
            <input type="text" name="" value = " En réponde à : <?php echo $row['nom'] .'/'. $row['entreprise'] ?>" readonly>
            <label >Message</label>
            <textarea name="" id="" cols="30" rows="10"></textarea>
            <label>Votre CV</label>
            <input type="file" name="" id="">
            <input type="submit" value="Envoyer">
        </form>
    </section>
    <?php include "php-config/footer.php"?>
</body>
</html>