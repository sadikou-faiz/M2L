<?php 
  session_start();
  include "php-config/bdd-connexion.php";
  if(isset($_POST['btn_inscrip'])){
      extract($_POST);
      if(isset($email) && isset($mdp1) && isset($mdp2)){
       if(!empty($email) && !empty($mdp1) && !empty($mdp2)){
        if($mdp1 != $mdp2) {
            $message = "Veuillez confirmez le mot de passe." ;
            }else {
                $req = mysqli_query($con , "SELECT * FROM utilisateur where email = '$email'");
                if(mysqli_num_rows($req) == 0){
                  $req = mysqli_query($con , "INSERT INTO utilisateur VALUES (NULL,'$email','$mdp1')") ;
                  if($req){
                       $_SESSION['message'] = "<span class='span'>Votre compte a été créer , connectez vous.</span>";
                       header("location:connexion.php");
                  }else {
                       $message = "Echec de création du compte.";
                  }
                }else {
                    $message = "Cette Adresse Email Existe déja !";
                }
               
            }
       }else {
           $message = "Veuillez remplir les champs";
       }
      }
      else {
          $message = "Remplisez tous les champs" ;
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
<?php include "php-config/menu.php"?>
    <section class="form inscription">
        <h2>S'inscrire</h2>
        <form action="" method="POST">
           <p style="color:red"> <?php if (isset($message)){
                echo $message ;
            } ?></p>
            <label>Email</label>
            <input type="email" name="email" id="email">
            <label>Mot de passe</label>
            <p class="err"></p>
            <input type="password" name="mdp1" id="mdp1">
            <label>Veuillez répéter votre mot de passe</label>
            <input type="password" name="mdp2" id="mdp2">
            <input type="submit" value="Se connecter" name="btn_inscrip">
        </form>
        <script>
            //verification des champs mdp
            var mdp1 = document.querySelector('#mdp1');
            var mdp2 = document.querySelector('#mdp2');
            var message = document.querySelector('.err');
            message.style.display = "none";
            mdp2.onkeyup = function(){
                if(mdp1.value != mdp2.value){
                    message.style.display = "flex";
                    message.style.color = "red";
                    message.style.fontSize = "9px";
                    message.style.padding = "0px";
                    mdp1.style.border = "1px solid red" ;
                    mdp2.style.border = "1px solid red" ;
                    message.innerHTML = "Les mots de passes ne sont pas conforme !"
                }else {
                    mdp1.style.border = "1px solid #999" ;
                    mdp2.style.border = "1px solid #999" ;
                    message.style.display = "none";
                }
            }
        </script>
        <p > Vous avez déjà un compte? <a id="back_btn" href="connexion.php">Se connecter.</a></p>
    </section>
    <?php include "php-config/footer.php"?>
</body>
</html>