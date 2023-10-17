<?php 
    session_start();
    include "bdd-connexion.php";
    if(!isset($_SESSION['user'])){
        header("location:connexion.php");
    }
    $id = $_GET["id"];
    $req = mysqli_query($con , "DELETE FROM offre WHERE id_emploi='$id'");
    header("location:../offres-postes.php");

   
?>