<?php
session_start();

include('userssever.php') 

if(isset($SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
    $accessLink="http://localhost/Web_Design_Asm_1_html_css/Pages/OrderPage.php".$data[0];
}else{
    
}