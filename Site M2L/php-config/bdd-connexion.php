<?php
//connexion à la base de donnée
$con = mysqli_connect("localhost","root","","m2l");
$req = mysqli_query($con," SET NAMEs utf8");
if(!$con){
   echo "Connexion à la base de donnée échouée !";
}

?>