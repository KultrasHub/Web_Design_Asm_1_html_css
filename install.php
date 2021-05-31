<?php 
  function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
    if(isset($_POST['adminSend'])){
        $userName=$_POST['userName'];
        $pass=$_POST['password'];
        $hash=password_hash($pass,PASSWORD_DEFAULT);
        //store user name and password for later validiation
        //store outside of the root folder
        //file_put_contents("../$userName",$hash);
        $nameUsed=0;
        if(file_exists("../contacts.csv"))
        {
        if(($file=fopen("../contacts.csv","r"))!=false)
        {
          while(($data=fgetcsv($file,1000,","))!=false)
          {
            $curName=strval($data[0]);
            if($userName==$curName)
            {
              $nameUsed=1;
              alert("This User Name has been used, Pls try again");
              break;
            }
          }
          fclose($file);
        }
      }
        //not save if name has been used
        if($nameUsed==0)
        {
        $content=array(
          $userName,
          $hash,
          "TRUE",
          0
        );
        
        $file = fopen("../contacts.csv","a");
        $handle = file('../contacts.csv');
        //check if file is empty to add title
        if (empty($handle)) {
          $fields=array('User Name','Password','is Admin','infoID');
          fputcsv($file, $fields);
        }     
        //add information to file
        fputcsv($file,$content);
        fclose($file);
      }
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
        <input type="email" name="userName" placeholder=" " required id="emailInput" />
        <span>User Name(email)</span>
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
        <input type="submit" name="adminSend" value="Create Account">
        <a class="loginpart" href="Pages/MyAccount-Login.php">Login</a>
      </div>
    </form>
  </div>
</body>
</html>
<script src="Pages/JS/install.js"></script>