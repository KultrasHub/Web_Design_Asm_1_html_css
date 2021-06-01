<?php 
    if(file_exists("../install.php")){
    die("Error ENCOUNTER: install.php file exists. Please locate the install.php file in the web folder and delete it before restarting the webpage.");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Register</title>
  <link rel="stylesheet" href="CSS/RegisterStyle.css">
  <link rel="stylesheet" href="CSS/BareBearsStyle.css">
  <link rel="stylesheet" href="CSS/Cookie.css">
  <script src="JS/BareBearsJavascript.js"></script>
  <script src="JS/Register.js"></script>
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
      <svg viewBox="0 0 1440 320">
        <path fill="#fff" fill-opacity="1"
          d="M0,288L34.3,256C68.6,224,137,160,206,160C274.3,160,343,224,411,245.3C480,267,549,245,617,202.7C685.7,160,754,96,823,85.3C891.4,75,960,117,1029,117.3C1097.1,117,1166,75,1234,74.7C1302.9,75,1371,117,1406,138.7L1440,160L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
        </path>
      </svg>
    </div>
  </div>
  <div class="LoginForm">
    <?php 
    //check if this link is from Order page
    $link="userssever.php";
    if(isset($_GET["fromOrder"]))
    {
      if($_GET["fromOrder"]=="1")
      {
        //user has accessed this via order
        $link="userssever.php?fromOrder=1";
      }
    }
    ?>
    <form action=<?php echo$link ?> method="post" onsubmit="FormValidate(event);">
      <div class="FormHeader">
        <img src="../Image/Essen/barebear.png" alt="" class="logo">
        <h2>Bare Bears</h2>
      </div>
      <div class="SignUp">
        <span>Fill up the form</span>
        <span>to create your account.</span>
        <br>
        <span>or you already have an acccount?</span>
        <a href="MyAccount-Login.php"><span>Log in</span></a>
      </div>
      <div class="NameBoxes">
        <div class="inputBox">
          <input type="text" id="firstVeri" name="firstName" placeholder=" " required />
          <span>First Name</span>
        </div>
        <div class="inputBox">
          <input type="text" id="lastVeri" name="lastName" placeholder=" " required />
          <span>Last Name</span>
        </div>
      </div>

      <div class="inputBox">
        <input type="tel" id="phoneVeri" name="phoneNumber" placeholder=" " required />
        <span>Phone Number</span>
      </div>
      <div class="inputBox">
        <input type="email" id="emailVeri" name="email" placeholder=" " required />
        <span>User Email</span>
      </div>
      <div class="inputBox">
        <input type="password" id="passVeri" name="password" placeholder=" " required />
        <span>Password</span>
      </div>
      <div class="inputBox">
        <input type="password" id="rePassVeri" name="cpassword" placeholder=" " required />
        <span>Confirm Password</span>
      </div>
      <div class="inputBox">
        <input type="address" id="addressVeri" name="address" placeholder=" " required />
        <span>Address</span>
      </div>
      <div class="inputBox">
        <input type="text" id="cityVeri" name="city" placeholder=" " required />
        <span>City</span>
      </div>
      <div class="inputBox">
        <input type="tel" id="zipVeri" name="Zipcode" pattern="[0-9]*" placeholder=" " title="Please enter a Zip Code"
          required />
        <span>Zipcode</span>
      </div>
      <div class="SelectBox">
        <span>Country</span>
        <br>
        <select class="country" name="contry">
          <option value="VN">Viet Nam VN</option>
          <option value="US">United States US</option>
          <option value="KR">Korean KR</option>
        </select>
      </div>
      <div class="RadioBox">
        <span>Account Type</span>
        <br>
        <input type="radio" id='ShopOwner' name="accountType" value="shopOwner" onclick="ShowHideDiv()"><label
          for="ShopOwner">Shop Owner</label>
        <input type="radio" id='Shopper' name="accountType" value="shopper" onclick="ShowHideDiv()"><label
          for="Shopper">Shopper</label>
      </div>
      <div id="shopOwnerStuff" style="display:none">
        <div class="inputBox">
          <input type="text" name="businessName" placeholder=" " />
          <span>Business Name</span>
        </div>
        <div class="inputBox">
          <input type="text" name="storeName" placeholder=" " />
          <span>Store Name</span>
        </div>
        <div class="SelectBox">
          <span>Store Category</span>
          <br>
          <select class="storeCategory" name="storeCategory">
            <option value="DepartmentStore">Department Store</option>
            <option value="GroceryStore">Grocery Store</option>
            <option value="Restautant">Restaurant</option>
            <option value="ClothingStore">Clothing Store</option>
            <option value="AccessoryStore">Accessory Store</option>
            <option value="Pharmacy">Pharmacy</option>
            <option value="Technology Store">Technology Store</option>
            <option value="Pet Store"> Pet Store</option>
            <option value="Toy Store"> Toy Store</option>
            <option value="Specialty Store">Specialty Store</option>
            <option value=" Thrift Store"> Thrift Store</option>
            <option value="Services">Services</option>
            <option value="Kiosks">Kiosks</option>


          </select>
        </div>
      </div>
      <div class="SendBut">
        <input type="submit" name="send" value="Next" onclick="FormValidate()">
      </div>
    </form>
  </div>
  <script>
    function ShowHideDiv() {
      var chkYes = document.getElementById("ShopOwner");
      var dvtext = document.getElementById("shopOwnerStuff");
      shopOwnerStuff.style.display = chkYes.checked ? "block" : "none";
    };
  </script>
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
