<?php 
session_start();
     $_SESSION['loggedIn']=false;
     $_SESSION['userID']=0;
     header('Location:MyAccount-Login.php');
?>