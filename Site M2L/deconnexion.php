<?php 
    session_start();
    if(!isset($_SESSION['user'])){
        header("location:connexion.php");
    }
    session_destroy();
    header('location:index.php');
?>