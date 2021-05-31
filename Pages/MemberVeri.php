<?php
session_start();

//Testing code to see if the pages turn
//$_SESSION["loggedIn"] =TRUE;

//Condition to see if users are logged in or not
if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true)
{
    //Will be directed to order page if logged in
    $accessLink="OrderPage.php";

}else{
    //Will be directed to register page if not yet logged in
    $accessLink="Register.php";
};
