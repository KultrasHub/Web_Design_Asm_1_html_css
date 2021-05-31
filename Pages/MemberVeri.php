<?php
session_start();

//Testing code to see if the pages turn
//$_SESSION["loggedIn"] =TRUE;


if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){

    $accessLink="OrderPage.php";


}else{
    $accessLink="Register.php?fromOrder=1";

};
