<?php 
    if(file_exists("../install.php")){
    die("Error ENCOUNTER: install.php file exists. Please locate the install.php file in the web folder and delete it before restarting the webpage.");
}

?>
<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>FAQs</title>
  <link rel="stylesheet" href="CSS/FAQsStyle.css">
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
        <a href="Contact.php" class="contact"> <button type="button" name="button">Contact</button></a>
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
    <div>
      <svg viewBox="0 0 1439 319">
        <path fill="#f4f4f3" fill-opacity="1"
          d="M0,160L34.3,165.3C68.6,171,137,181,206,197.3C274.3,213,343,235,411,245.3C480,256,549,256,617,218.7C685.7,181,754,107,823,112C891.4,117,960,203,1029,224C1097.1,245,1166,203,1234,197.3C1302.9,192,1371,224,1406,240L1440,256L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
        </path>
      </svg>
      <svg viewBox="0 0 1440 320">
        <path fill="#fff" fill-opacity="1"
          d="M0,64L40,74.7C80,85,160,107,240,117.3C320,128,400,128,480,154.7C560,181,640,235,720,218.7C800,203,880,117,960,112C1040,107,1120,181,1200,186.7C1280,192,1360,128,1400,96L1440,64L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
        </path>
      </svg>
    </div>
  </div>
  <div class="content">
    <div class="starter">
      <h1>FAQs</h1>
      <p>Bare Bears is here to help, you may have things to ask. Read on for details about purchasing and our products.</p>
    </div>
    <div class="row">
      <div class="box">
        <p class="heading" class="column">General Questions Questions</p>
        <div class="faqs">
          <details>
            <summary>How can I contact Bare bears if I have additional questions?</summary>
            <p class="text">Please submit a ticket through the Contact Us link on the headerof every page if you have questions. </p>
          </details>
          <details>
            <summary>Is it possible to place a wholesale order?</summary>
            <p class="text">We don't offer wholesale pricing or bulk discounts at this time.</p>
          </details>
          <details>
            <summary>How can I access my account?</summary>
            <p class="text">Click on the profile icon, it is the link to your account.</p>
          </details>
        </div>
      </div>

      <div class="box">
        <p class="heading" class="column">Billing & Order Questions</p>
        <div class="faqs">
          <details>
            <summary>What payment methods do you accept?</summary>
            <p class="text">We accept the following payment methods:
              AirPay
              <br>
              PayPal
              <br>
              Credit Card (Visa, Mastercard, American Express)
              <br>Cash(applied for national order)
            </p>
          </details>
          <details>
            <summary>Is it possible to place an order over phone or email?</summary>
            <p class="text">We cannot take orders over phone or email at this time.</p>
          </details>
          <details>
            <summary>Is it possible to cancel a paid order?</summary>
            <p class="text">You only can cancel any order before shipping state.</p>
          </details>
        </div>

      </div>
      <div class="box">
        <p class="heading" class="column">Technical Questions</p>
        <div class="faqs">
          <details>
            <summary>Is it possible to order without an account?</summary>
            <p class="text">Yes! you can but you will be asked for personal detail.</p>
          </details>
          <details>
            <summary>If you encounter any error on this website:</summary>
            <p class="text">Try to clear your cache and cookies and refresh the page.</p>
          </details>
          <details>
            <summary>Can I use facebook or google account to login?</summary>
            <p class="text">Currently, we don't provide login service using social media accounts, but we are working of this login feature.</p>
          </details>
        </div>
      </div>
    </div>
  </div>
  <!--Cookies-->
<div class="cookiesBar" id="cookies">
  <img src="../Image/FreeCookies.jpg" alt="cookies Logo">
  <span>We use cookies in this website to give you the best experience on our site and show relevant ads. To find out more, read <a href="PrivacyPolicy.php">privacy policy</a> and <a href="">cookie Policy</a></span>
  <div onclick="HideCookie()"> <span>I understand</span></div>
</div>
<!--End Cookies-->
<footer>
  <div class="UpperBar">
      <div class="logoText">Bare Bears <p>with barely best brands</p>
      </div>
      <div class="shop">
          <h1>Top Category</h1>
          <a href="BrowseStore.php">
              <li>Book Stores</li>
          </a>
          <a href="BrowseStore.php">
              <li>Toy Stores</li>
          </a>
      </div>
      <div class="Support">
          <h1>Support</h1>

          <a href="#">
              <li>Order Status</li>
          </a>
          <a href="FAQs.php">
              <li>FAQs</li>
          </a>
          <a href="Contact.php">
              <li>Contact Us</li>
          </a>
          <a href="Fees.php">
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
          <a href="TermOfUse.php">
              <li>Term Of Service</li>
          </a>
          <a href="PrivacyPolicy.php">
              <li>Privacy Policy</li>
          </a>
      </section>
  </div>
</footer>
</body>
</html> 
<script type="text/javascript" src="JS/Cookies.js"></script> 
