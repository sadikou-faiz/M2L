<?php 
    session_start();
    
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
    <!-- section home -->
    <section class="home">
        <div class="banner">
            <p>Bienvenu</p>
            <?php 
               if(isset($_SESSION['user'])){
                 echo "<p>".$_SESSION['user']."</p>";
                }
            ?>
            <h4>Sur le site Officiel de la</h4>
            <H2>Maison des Ligues de Lorraine (M2L)</H2>
        </div>
    </section>
    <!-- section description M2L -->
    <section class="desc-m2l">
       <div class="left">
            <h3>Maison des Ligues de Lorraine (M2L)</h3>
            <h4>(SiteWeb dans un but pédagogique seulement)</h4>
            <p>La Maison des Ligues de Lorraine (M2L) a pour mission de fournir des espaces et des services aux différentes ligues sportives régionales de Lorraine et à d’autres structures hébergées. La M2L est une structure financée par le Conseil Régional de Lorraine dont l'administration est déléguée au Comité Régional Olympique et Sportif de Lorraine (CROSL). Installée depuis 2003 dans la banlieue Nancéienne, la M2L accueille l'ensemble du mouvement sportif Lorrain qui représente près de 6 500 clubs, plus de 525 000 licenciés et près de 50 000 bénévoles.</p>
       </div>
       <div class="right">
            <a class="sport-name" href="#">
                <img src="images/cyclisme.png" alt="">
                <p>Cyclisme</p>
            </a>
            <a class="sport-name" href="#">
                <img src="images/judo.png" alt="">
                <p>Judo</p>
            </a>
            <a class="sport-name" href="#">
                <img src="images/tennis.png" alt="">
                <p>Tenis</p>
            </a>
            <a class="sport-name" href="#">
                <img src="images/nager.png" alt="">
                <p>Natation</p>
            </a>
           
       </div>
    </section>
    <?php include "php-config/footer.php"?>
</body>
</html>