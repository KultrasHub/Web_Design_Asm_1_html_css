<?php
session_start();

//call all element//
$error = "";
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
if (isset($_POST["send"])) {
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
        $file_open = fopen("userinfor.csv") or die("Can't open file");
        $delimiter = ',';
        $no_row = count(array("userinfor.csv"));
        if ($no_row > 1) {
            $no_row = ($no_row - 1) + 1;
        }
        $form_data = array(
            'id' => $no_row,
            'phonenum' => $phonenumber,
            'name' => $username,
            'email' => $email,
            'password' => $password,
        );
        $file_put = fopen("userinfor.csv","w+");
        foreach ($form_data as $infor) {
            fputcsv($file_put, $_POST[$infor]);
            $phonenumber = '';
            $username = '';
            $email = '';
            $password = '';
        }
        if(count(array_unique($form_data)) != count($form_data)) {
            array_push("Your phone number and email are unique");
        } else {
            array_push("Phone number and email already exist! Try new one.")
        }
        fclose($file_open);
    }
}
?>