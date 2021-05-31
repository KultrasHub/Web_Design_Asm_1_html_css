<?php
session_start();

if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true)
{
    $accessLink="OrderPage.php";

}else{
    $accessLink="Register.php";
};
