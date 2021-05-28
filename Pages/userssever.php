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
$username = isset($_POST['firstName']);
$phonenumber = isset($_POST['phoneNumber']);
$email = isset($_POST['email']);
$password = isset($_POST['password']);

//if empty infornmation//
if (isset($_POST["submit"])) {
    if (empty($username)) {array_push($error,"Username is required.");}
    if (empty($phonenum)) {array_push($error,"Phone number is required.");}
    if (empty($email)) {array_push($error,"Email is required.");}
    if (empty($password)) {array_push($error,"Please fill your password.");
    } else {
        $secur_passw = password_hash($password, $PASSWORD_BCRYPT);
        $var_password = password_verify($secur_passw);
    }
    //if there is no error
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
}

//for login.php//
if (isset($_POST['login_user'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (empty($email)) {
        array_push($error,"Email is required.");
    }
    if (empty($password)) {
        array_push($error,"Password is required.");
    }
    if (count($error) == 0) {
        $password = password_hash($password, $PASSWORD_BCRYPT);
    }
}
?>