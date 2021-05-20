<?php
session_start();
$phonenum="";
$email="";
$error=array();

//conect to database in XAMPP//
$database = mysqli_connect('localhost','root','','userinfor') or die("Could not connect to database");

//register user//
$username = mysqli_real_escape_string($database,$_POST['firstName']);
$phonenum = mysqli_real_escape_string($database,$_POST['phoneNumber']);
$email = mysqli_real_escape_string($database,$_POST['email']);
$password = mysqli_real_escape_string($database,$_POST['password']);

//check database for existing user with same username//
$user_check = "SELECT * FROM usersave WHERE PhoneNumber = '$phonenum' or Email = '$email' LIMIT 1";
$results = mysqli_check($database,$user_check);
$user = mysqli_fetch($results);
if ($user) {
    if ($user['PhoneNunmber'] === $phonenum) {array_push($error,"Phonenumber already exist");}
    if ($user['Email'] === $email) {array_push($error,"Email already exist");}
}

//resgister if no error//
if (count($error)==0) {
    $password = md5($password);
    $querry = "INSERT INTO usersave ('PhoneNumber, Email, Password, FirstName') VALUES ('$phonenum,$email,$password,$username')";
    mysqli_check ($database,$query);
    $_SESSION ['PhoneNumber'] = $phonenum;
    $_SESSION ['Success'] = "You are now logged in";

    header ('location: MyAccount-Logged.php');
}

?>
