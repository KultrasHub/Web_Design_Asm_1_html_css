<?php 

    if(isset($_POST['adminSend'])){
        $userName=$_POST['userName'];
        $pass=$_POST['password'];
        $hash=password_hash($pass,PASSWORD_DEFAULT);
        //store user name and password for later validiation
        //store outside of the root folder
        file_put_contents("../$userName",$hash);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>install</title>
    <link rel="stylesheet" href="Pages/CSS/MyAccount-LoginStyle.css">
    <link rel="stylesheet" href="Pages/CSS/installStyle.css">
    
    
</head>
<body>
<div class="LoginForm">

    <form action="install.php" method="post" onsubmit="CheckOnSubmit(event); ">
      <div class="FormHeader">
        <img src="Image/Essen/barebear.png" alt="" class="logo">
        <h2>Admin</h2>
      </div>
      <div class="SignUp">
        <span>Let create an admin account!!</span>
      </div>
      <div class="inputBox">
        <input type="text" name="userName" placeholder=" " required id="emailInput" />
        <span>User Name</span>
      </div>
      <div class="inputBox" action="cms.php">
        <input type="password" name="password" placeholder=" " required id="passwordInput" />
        <span>Password</span>
      </div>
      <div class="inputBox" action="cms.php" id="retypePassBox">
        <input type="password" name="repassword" placeholder=" " required id="rePasswordInput" />
        <span>Retype Password</span>
      </div>

      <div class="SendBut">
        <input type="submit" name="adminSend" value="Send">
      </div>
    </form>
  </div>
</body>
</html>
<script src="Pages/JS/install.js"></script>