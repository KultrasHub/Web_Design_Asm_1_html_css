<?php
session_start();

//call all element//
$error = array();
$username = "";
$email = "";
$phonenumber = "";
$password = "";
$cpassword = "";

//element represent for//
$username = $_POST['firstName'];
$phonenumber = $_POST['phoneNumber'];
$email = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];

<<<<<<< HEAD
//check database for existing user with same username//                 
$user_check = "SELECT * FROM usersave WHERE PhoneNumber = '$phonenum' or Email = '$email' LIMIT 1";
$results = mysqli_check($database,$user_check);
$user = mysqli_fetch($results);
if ($user) {
    if ($user['PhoneNunmber'] === $phonenum) {array_push($error,"Phonenumber already exist");}
    if ($user['Email'] === $email) {array_push($error,"Email already exist");}
=======
//if empty infornmation//
if (empty($username)) {array_push($error,"Username is required.")};
if (empty($phonenum)) {array_push($error,"Phone number is required.")};
if (empty($email)) {array_push($error,"Email is required.")};
if (empty($password)) {
    array_push($error,"Please fill your password.");
    if ($password != $cpassword){array_push($error, "Comfirm password does not match.")};
} elseif ($password == $cpassword) {
    $secur_passw = password_hash($password & $cpassword , $PASSWORD_BCRYPT)
>>>>>>> ef4214d834f302bd780777d0db03538345477273
}

//if no error//
if (count($error) == 0) {
    $file_open = fopen("userinfor.csv","a");
    $no_row = count(file("userinfor.csv"));
    if ($no_row > 1) {
        $no_row = ($no_row - 1) + 1;
    }
    $form_data = array(
        'id' => $no_row,
        'phonenum' => $phonenumber,
        'name' => $username,
        'email' => $email,
        'password' => $password
    );
    fputcsv($file_open,$form_data);
    $phonenumber= '';
    $email='';
    $username='';
    $password='';
}
