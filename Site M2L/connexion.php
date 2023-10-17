<?php
   session_start();
   
    include "php-config/bdd-connexion.php";
    if(isset($_POST['btn-connect'])){
          extract($_POST);
          if(isset($email) &&  isset($mdp) ){
               $req = mysqli_query($con , "SELECT * FROM utilisateur WHERE email = '$email' AND mdp = '$mdp'");
               if(mysqli_num_rows($req) > 0) {
                   $row = mysqli_fetch_assoc($req);
                   $_SESSION['user'] = $row['email'];
                   header("Location:offres-emplois.php");
                   unset($_SESSION['message']) ;
               }else {
                $erreur = "Mot de passe et / ou Adresse Mail incorrectes.";
            }
          }else {
              $erreur = "Veuillez remplir tous les champs";
          }
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
     
?>
    <section class="form">
        
        <h2>Se connecter</h2>
        <p class="erreur"><?php if(isset($erreur)){echo $erreur ;} ?></p>
        <form action="" method="POST">
           <?php if (isset($_SESSION['message'])){
                echo $_SESSION['message'];
            } 
            ?>
            <label>Email</label>
            <input type="email" name="email">
            <label>Mot de passe</label>
            <input type="password" name="mdp" id="mdp">
            <input type="submit" value="Se connecter" name="btn-connect">

        </form>
        <p >Pas encore de compte ? <a id="back_btn" href="inscription.php">S'inscrire.</a></p>
    </section>
    <?php include "php-config/footer.php"?>
</body>
</html>