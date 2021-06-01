<?php 
    if(file_exists("../something.php")){
    die("Error ENCOUNTER: install.php file exists. Please locate the install.php file in the web folder and delete it before restarting the webpage.");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Contact</title>
  <link rel="stylesheet" href="CSS/Contact_StoreStyle.css">
  <link rel="stylesheet" href="CSS/ShopHeader_FooterStyle.css">
  <link rel="stylesheet" href="CSS/Cookie.css">
  <script src="JS/ShopHeader_FooterStyle.js"></script>
</head>

<body>
    <!--Header-->
    <header>
        <!--change icon and name base on shop-->
        <a class="LogoName" href="#"><img class="logo" src="../Image/Logo/BookCafe.png" alt="logo" />
            <?php 
            $id=0;
          if(isset($_GET['storeID']))
          {
            $id=strval($_GET['storeID']);
            if(($file=fopen("../Data/stores.csv","r"))!=false){
              $headingRead=false;
              while(($data=fgetcsv($file,1000,","))!=false)
              {
                if($headingRead==true)//ignore the title line
                {
                  $storedID=strval($data[0]);
                  if($id===$storedID)
                  {
                    echo"<span>".$data[1]."</span>";
                    break;
                  }
                }
                $headingRead=true;
              }
              fclose($file);
            }
          }
        ?>
        </a>
        <ul class="navLinks" id="navBar">
            <li><a href="Home.php">Home</a></li>
            <!--change link to one of your store-->
            <li><a href=<?php echo"AboutUs_Store.php?storeID=".$id ?>>About Us</a></li>

            <li class="BrowseButton" id="buttonBrowse">
                <input type="checkbox" id="DropDown" />
                <label for="DropDown" class="BrowseText">
                    <div>Browse</div>
                </label>
                <ul class="DropDown">
                    <li class="DropDownContent">
                        <input type="checkbox" id="BrowseContent" />
                        <label for="BrowseContent">
                            <div>Browse Products by Category</div>
                        </label>
                        <!--Change amount and category names-->
                        <ul class="DropDownContainer">
                            <li class="DropDownDetail" >
                                <span> Light Novel</span>
                            </li>
                            <li class="DropDownDetail" >
                                <span> Economy</span>
                            </li>
                            <li class="DropDownDetail" >
                                <span> Detective & Mystery</span>
                            </li>
                            <li class="DropDownDetail" >
                                <span> Science Fiction & Fantasy</span>
                            </li>
                            <li class="DropDownDetail" >
                                <span> Self Improvement</span>
                            </li>
                        </ul>
                    </li>
                    <li class="DropDownContent DropDownEnd">
                        <input type="checkbox" id="BrowseContentByTime" />
                        <label for="BrowseContentByTime">
                            <div>Browse Products by Time</div>
                        </label>
                        <ul class="DropDownContainer">
                            <!--change link to one of your store-->
                            <?php $link="BrowseProducts.php?storeID=".$id."&pageID=1&dir=0" ;
                             echo '<a href='.$link.'>';
                            ?>
                            <li class="DropDownDetail">
                                <span> Newest</span>
                            </li>
                            <?php 
                             echo'</a>';
                            ?>
                            <?php $link="BrowseProducts.php?storeID=".$id."&pageID=1&dir=1" ;
                             echo '<a href='.$link.'>';
                            ?>
                            <!--change link to one of your store-->
                            <li class="DropDownDetail" >
                                <span> Oldest</span>
                            </li>
                            <?php 
                             echo'</a>';
                            ?>
                        </ul>
                    </li>
                </ul>
            </li>
            <a href=<?php echo"Contact_Store.php?storeID=".$id ?> class="contact">
                <button type="button" name="button">Contact</button></a>
        </ul>
        <!--Chnage link to one of your store-->

        <div class="headerSimulator">
            <div class="holder">
                <input type="checkbox" id="check" />
                <label class="Ham" for="check" onclick="DisplayNavBar()">
                    <span></span>
                    <span></span>
                    <span></span>
                </label>
            </div>
        </div>
    </header>
  <!--background-->
  <!--Return Button-->
  
  <div class="Return" onclick=<?php echo"location.href='HomeStore.php?storeID=".$id."'" ?>  ><!--Change link to your shop-->
    <div class="Holder">
      <div></div>
    </div>
  </div>
  <!--Content-->
<div class="NonHeaderbackground"></div>
  <setion class="Contact">
    <div class="Content">
      <p>Get in touch with us</p>
      <p>Send Us a message.</p>
    </div>
    <div class="container">
      
      <div class="contactForm">
        <form action="barebears.com" method="get">
          <h2>Send Us Message</h2>
          <div class="inputBox">
            <input type="text" name="name"  required />
            <span>Full name</span>
          </div>
          <div class="inputBox">
            <input type="email" name="email" required  />
            <span>Email</span>
          </div>
          <div class="inputBox">
            <textarea name="" id="" cols="30" rows="10" placeholder="Enter your message..."></textarea>

          </div>
          <div class="But">
          
          <div class="SendBut">
            <input type="submit" name="send" value="Send">
          </div>
          </div>
        </form>
      </div>
    </div>
  </setion>
  <!--Cookies-->
<div class="cookiesBar" id="cookies">
  <img src="../Image/FreeCookies.jpg" alt="cookies Logo">
  <span>We use cookies in this website to give you the best experience on our site and show relevant ads. To find out more, read <a href="PrivacyPolicy.php">privacy policy</a> and <a href="">cookie Policy</a></span>
  <div onclick="HideCookie()"> <span>I understand</span></div>
</div>
<!--End Cookies-->
  <footer>
    <div class="LowerBar">
      <section class="CopyRight">
        Copyright© Book World 2021
      </section>
      <section class="Policy">
        <!--Change link to one of your store-->
        <a href="TermOfUse_BookWorld.html">
          <li>Term Of Service</li>
        </a>
        <a href="PrivacyPolicy_BookWorld.html">
          <li>Privacy Policy</li>
        </a>
      </section>
    </div>
  </footer>
</body>
</html>
<script type="text/javascript" src="JS/Cookies.js"></script>  
