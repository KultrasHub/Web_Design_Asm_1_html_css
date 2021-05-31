<?php 
session_start();
//count the times email is found different and the overall loop
$difEmail=0;
$loopTime=0;
//to display message
$emailFailed=false;
$passWordFailed=false;
if(isset($_POST['send']))
{
    $email=strval($_POST['emailUser']);
    $pass=$_POST['password'];
    if(file_exists("../../contacts.csv"))
    {
    if(($file=fopen("../../contacts.csv","r"))!=false)
    {
      while(($data=fgetcsv($file,1000,","))!=false)//email-password-IsAdmin
      {
        $loopTime++;
        $curEmail=$data[0];
        if($email==$curEmail)//looking for the saved email
        {
          $hash=$data[1];
          if(password_verify($pass,$hash))
          {
            $_SESSION['loggedIn']=true;
            $_SESSION['userID']=$data[3];
            if($data[2]=="TRUE")
            {
              header('Location:DashBoard.php');
            }
            else{
              $link="Location:MyAccount-Logged.php";
              if(isset($_GET["fromOrder"]))
              {
                if($_GET["fromOrder"]=="1")
                {
                  //user has accessed this via order
                  $link="Location:OrderPage.php";
                }
              }
              header($link);
            }
            break;//cancel loop
          }
          else{
            $passWordFailed=true;
          }
        }
        else{
          //will not count the the email is found
          //so it will be different that $looptime
          $difEmail++;
        }
      }
      //check if the email is unfound
      if($difEmail===$loopTime)
      {
        //email not found
        $emailFailed=true;
      }
      //print("Wrong Email");
      fclose($file);
    }    
    } 

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>My Acccount - Login</title>
  <link rel="stylesheet" href="CSS/MyAccount-LoginStyle.css">
  <link rel="stylesheet" href="CSS/BareBearsStyle.css">
  <link rel="stylesheet" href="CSS/Cookie.css">
  <script src="JS/BareBearsJavascript.js"></script>

</head>

<body>
  <header>
        <a href="Home.php" class="LogoName">
            <img class="logo" src="../Image/Essen/barebear.png" alt="logo">
            <span>Bare Bears</span>
        </a>

        <ul class="navLinks" id="navigationBar">
            <li onclick="location.href='Home.php'"><a href="Home.php">Home</a></li>
            <li onclick="location.href='AboutUs.php'"><a href="AboutUs.php">About Us</a></li>
            <li onclick="location.href='Fees.php'"><a href="Fees.php">Fees</a></li>
            <li onclick="location.href='FAQs.php'"><a href="FAQs.php">FAQs</a></li>
            <!--Browse-->
            <li id="buttonBrowse">
                <input type="checkbox" id='DropDown'>
                <label class="BrowseText" for="DropDown">
                    <div>Browse</div>
                </label>

                <ul class="DropDown">
                    <li class="DropDownContent">
                        <input type="checkbox" id='LettersDropDown'>
                        <label for="LettersDropDown" class="DropDownLabel">
                            <div>Browse Stores by Name</div>
                        </label>
                        <!--Box-->
                        <ul class="DropDownContainer">
                            <div class="Holder">
                                <h3>Letters</h3>
                                <div class="letters">
                                    <a href="BrowseStore.php#A">A</a>
                                    <a href="BrowseStore.php#B">B</a>
                                    <a href="BrowseStore.php#C">C</a>
                                    <a href="BrowseStore.php#D">D</a>
                                    <a href="BrowseStore.php#E">E</a>
                                    <a href="BrowseStore.php#F">F</a>
                                    <a href="BrowseStore.php#G">G</a>

                                    <a href="BrowseStore.php#H">H</a>
                                    <a href="BrowseStore.php#I">I</a>

                                    <a href="BrowseStore.php#J">J</a>
                                    <a href="BrowseStore.php#K">K</a>
                                    <a href="BrowseStore.php#L">L</a>
                                    <a href="BrowseStore.php#M">M</a>

                                    <a href="BrowseStore.php#N">N</a>
                                    <a href="BrowseStore.php#O">O</a>
                                    <a href="BrowseStore.php#P">P</a>
                                    <a href="BrowseStore.php#Q">Q</a>

                                    <a href="BrowseStore.php#R">R</a>
                                    <a href="BrowseStore.php#S">S</a>
                                    <a href="BrowseStore.php#T">T</a>
                                    <a href="BrowseStore.php#U">U</a>

                                    <a href="BrowseStore.php#V">V</a>
                                    <a href="BrowseStore.php#W">W</a>
                                    <a href="BrowseStore.php#X">X</a>
                                    <a href="BrowseStore.php#Y">Y</a>
                                    <a href="BrowseStore.php#Z">Z</a>
                                </div>
                            </div>
                        </ul>
                    </li>
                    <!--Box-->
                    <li class="DropDownContent DropDownEnd">
                        <input type="checkbox" id='CateDropDown'>
                        <label for="CateDropDown" class="DropDownLabel">
                            <div>Browse Stores by Category</div>
                        </label>
                        <ul class="DropDownContainer">
                            <!--Detail-->
                            <?php 
                            if(($file=fopen("../Data/categories.csv","r"))!=false){
                                $headingRead=false;
                                while(($data=fgetcsv($file,1000,","))!=false)
                                {
                                  if($headingRead==true)
                                  {
                                  //ignore the first line
                                    $info=$data[1];
                                    $link="BrowseStoreCate.php#".$info;
                                    echo'
                                    <a href='.$link.'>
                                    <li class="DropDownDetail">
                                        <span> '.$info.'</span>
                                    </li>
                                    </a>
                                    ';
                                  }
                                  $headingRead=true;
                                }
                                fclose($file);
                              }
                            ?>



                        </ul>
                    </li>
                </ul>
            </li>
            <a href="Contact.html" class="contact"> <button type="button" name="button">Contact</button></a>
            <?php 
            $id=0;
            $avatarLink="../Image/Profolio/profile-user.png";
      
            if(isset($_SESSION['userID']))
            {
              $id= (int)$_SESSION['userID'];
              if($id!=0)
              {
                //get photo
                if(($file=fopen("../userinfo.csv","r"))!=false)
                {
                  while(($data=fgetcsv($file,1000,","))!=false)
                  {
                    $curId=(int)$data[0];
                    if($id===$curId)
                    {
                      $avatarLink=$data[8];
                    }
                  }
                  fclose($file);
                }
              }
            }
            $loggedIn=false;
            $myAccountLink="MyAccount-Login.php";
            if(isset($_SESSION['loggedIn'])&&$_SESSION['loggedIn']==TRUE)
            {
                $loggedIn=true;
                $myAccountLink="MyAccount-Logged.php";
            }
            
            ?>
            <a id="myAcount" class="myAcount" href =<?php echo$myAccountLink;  ?> >
            <img src=<?php echo$avatarLink; ?> alt="">
        </a>
        </ul>
        <div class="headerSimulator">
            <div class="holder">
                <a href="" class="myAcount top_right" href =<?php echo$myAccountLink;  ?>><img src=<? echo$avatarLink; ?>
                        alt=""></a>
                <label class="Ham" for="check" onclick="HamDisplay()">
                    <input type="checkbox" id="check" />
                    <span></span>
                    <span></span>
                    <span></span>
                </label>
            </div>
        </div>
  </header>
  <div class="background">
  </div>
  <div class="LoginForm">
    <?php 
      $resetLink="MyAccount-Login.php";
      if(isset($_GET["fromOrder"]))
      {
        if($_GET["fromOrder"]=="1")
        {
          //user has accessed this via order
          $resetLink="MyAccount-Login.php?fromOrder=1";
        }
      } 
    ?>
    <form action=<?php echo$resetLink ?> method="post" onsubmit="Login(e)">
      <div class="FormHeader">
        <img src="../Image/Essen/barebear.png" alt="" class="logo">
        <h2>Bare Bears</h2>
      </div>
      <div class="SignUp">
        <span>Don't have an account?</span>
        <a href="Register.php"><span>Create your account</span></a>
      </div>
      <div class="inputBox">
        <input type="email" name="emailUser" placeholder=" " required id="emailInput" />
        <span>Email</span>
      </div>
      <?php 
      if($emailFailed)
      {
        echo'<div class="notice"> The email user does not exist</div>';
      } ?>
      <div class="inputBox" action="cms.php">
        <input type="password" name="password" placeholder=" " required id="passwordInput" />
        <span>Password</span>
      </div>
      <?php 
      if($passWordFailed)
      {
        echo' <div class="notice"> Wrong password</div>';
      }
      ?>

      <div class="lowerBar">
        <div class="checkBox">
          <input type="checkbox" name="rememberMe" id="RememeberMe" />
          <label for="RememeberMe">Rememeber Me</label>
        </div>
        <a href="ForgotPassword.php">Forgot Password</a>
      </div>
      <div class="SendBut">
        <input type="submit" name="send" value="Send">
      </div>
    </form>
  </div>
  <!--Cookies-->
<div class="cookiesBar" id="cookies">
  <img src="../Image/FreeCookies.jpg" alt="cookies Logo">
  <span>We use cookies in this website to give you the best experience on our site and show relevant ads. To find out more, read <a href="PrivacyPolicy.html">privacy plicy</a> and <a href="">cookie Policy</a></span>
  <div onclick="HideCookie()"> <span>I understand</span></div>
</div>

<!--End Cookies-->
  
<footer>
  <div class="UpperBar">
    <div class="logoText">Bare Bears <p>with barely best brands</p>
    </div>
    <div class="shop">
      <h1>Top Category</h1>
      <a href="BrowseStore.html">
        <li>Book Stores</li>
      </a>
      <a href="BrowseStore.html">
        <li>Toy Stores</li>
      </a>
    </div>
    <div class="Support">
      <h1>Support</h1>
      <a href="#">
        <li>Order Status</li>
      </a>
      <a href="FAQs.html">
        <li>FAQs</li>
      </a>
      <a href="Contact.html">
        <li>Contact Us</li>
      </a>
      <a href="Fees.html">
        <li>Fees</li>
      </a>
      <a href="#">
        <li>Order Status</li>
      </a>
      <a href="#">
        <li>Shipping Information</li>
      </a>
    </div>
    <div class="Language">
      <h1>Language</h1>
      <br>
      🌎
      <select class="language" name="language">
        <option value="English"> English</option>
        <option value="Vietnamese">Vietnamese</option>
        <option value="Korean">Korean</option>
      </select>
    </div>
  </div>
  <div class="LowerBar">
    <section class="CopyRight">
      Copyright© Bare Bears 2021
    </section>
    <section class="Policy">
      <a href="TermOfUse.html">
        <li>Term Of Service</li>
      </a>
      <a href="PrivacyPolicy.html">
        <li>Privacy Policy</li>
      </a>
    </section>
  </div>
</footer>
</body>

</html>
<script type="text/javascript" src="JS/Cookies.js"></script> 
<script src="JS/LoginJavaScript.js"></script>