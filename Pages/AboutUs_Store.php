<?php 
    if(file_exists("../something.php")){
    die("Error ENCOUNTER: install.php file exists. Please locate the install.php file in the web folder and delete it before restarting the webpage.");
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>About Us</title>
  <link rel="stylesheet" href="CSS/AboutUs_StoreStyle.css">
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
  <!--Return Button-->
  <div class="Return" onclick=<?php echo"location.href='HomeStore.php?storeID=".$id."'" ?>  ><!--Change link to your shop-->
    <div class="Holder">
      <div></div>
    </div>
  </div>
  <!--content-->
  <div class="AboutUs">
    <div class="Starter">
      <img src="../Image/Logo/BookCafe.png" alt="Book World Logo">
      <h1>Book World</h1>
      <p></p>
    </div>
    <div class="display">

      <div class="box">
        <img src="../Image/Profolio/Rue.jpg" alt="">
        <br>
        <span class="name">RUE</span>
        <br>
        <span class="id"> Under Development</span>
        <ul class="Hobby">
          <h3>Background</h3>
          <li>I am a spaceship AI transfered myself into a robot when I lost my ship.</li>
          <li>I feel nothing, but I am far from emotionless. </li>
          <li>I am useless without a ship so I came here to sell books.</li>
        </ul>
      </div>
      <div class="box">
        <img src="../Image/Profolio/Lanny.jpg" alt="">
        <br>
        <span class="name">Lanny</span>
        <br>
        <span class="id">From Lanny Escape</span>
        <ul class="Hobby">
          <h3>Background</h3>
          <li>Me,Lanny is an animal being created in Khoa's video game as the main character.</li>
          <li>Me dun spik english, but me is brought to sell books.</li>
        </ul>
        <a target="_blank" href="https://play.google.com/store/apps/details?id=com.KultrasEntertainment.LannyEscape">Download Lanny Escape </a>
      </div>
      
    </div>
  </div>
<!--End content-->
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