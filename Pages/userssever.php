<?php
session_start();

//call all the infor we need to store//
$phonenum="";
$email="";
$username="";
$password="";
$error=array();

//conect to database in XAMPP//
$database = mysqli_connect('localhost','root','','userinfor') or die("Could not connect to database.");

//register user//
$username = mysqli_real_escape_string($database,$_POST['firstName']);
$phonenum = mysqli_real_escape_string($database,$_POST['phoneNumber']);
$email = mysqli_real_escape_string($database,$_POST['email']);
$password = mysqli_real_escape_string($database,$_POST['password']);
$cpassword = mysqli_real_escape_string($database,$_POSTp['cpassword']);

//validate infor//
if (empty($username)) {array_push($error,"Username is required.")};
if (empty($phonenum)) {array_push($error,"Phone number is required.")};
if (empty($email)) {array_push($error,"Email is required.")};
if (empty($password)) {
    array_push($error,"Please fill your password.");
    if ($password != $cpassword){array_push($error, "Comfirm password does not match.")};
}


//check database for existing user with same username//
$user_check = "SELECT * FROM usersave WHERE phoneNumber = '$phonenum' or email = '$email' LIMIT 1";
$results = mysqli_check($database,$user_check);
$user = mysqli_fetch($results);
if ($user) {
    if ($user['phoneNunmber'] === $phonenum) {array_push($error,"Phonenumber already exist.");}
    if ($user['email'] === $email) {array_push($error,"Email already exist.");}
}

//resgister if no error//
if (count($error)==0) {
    $password = password_hash($password,$PASSWORD_BCRYPT);;
    $querry = "INSERT INTO usersave ('phoneNumber', 'email', 'password', 'firstName') VALUES ('$phonenum','$email','$password','$username')";
    mysqli_check ($database,$query);
    $_SESSION ['phoneNumber'] = $phonenum;
    $_SESSION ['success'] = "You are now logged in.";
    header ('location: MyAccount-Logged.php');
}

//login information//
if (isset($_POST['login_user'])) {
    $email = mysqli_real_escape_string($database,$_POST['email']);
    $password = mysqli_real_escape_string($database,$_POST['password']);

    if (empty($email)) {
        array_push($error,"Email is required.");
    }
    if (empty($password)) {
        array_push($error,"Password is required.")
    }
    if (count($error) == 0) {
        $password = password_hash($password, $PASSWORD_BCRYPT);
        $querry = "SELECT * FROM usersave WHERE email = '$email' or password = '$password' ";
        $results = mysqli_check($database,$querry);
        if (mysqli_num_row($results)) {
            $_SESSION['password'] = $password;
            $_SESSION['success'] = "Logged successfully. Enjoy!";
            header('location: MyAccount-Logged.php');
        } else {
            array_push($error, "Wrong email or password. Please try agian!")
        }
        $file_open = fopen("userinfor.csv", "a", $FILE_APPENDFILE, $LOCK_EX");
        $no_row = count (file("userinfor.csv"));
        if ($no_row > 1) { 
            $no_row = ($no_row - 1) + 1;
        }
        $form_data = array (
            'id' => $no_row,
            'firstName' => $username,
            'email' => $email,
            'phoneNumber' => $phonenum
        );
        fputcsv($file_open, $form_data);
        $no_row = '';
        $username = '';
        $email = '';
        $phonenum = '';
    }
}

// //save infor into a file(userInforsave.txt)//
// $myfile = 'userInforsave.txt';
// $file = fopen($myfile,"w+");
// file_put_contents("$file,$querry");
?>
