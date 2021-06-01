<?php 
session_start();
?>
<?php include('MemberVeri.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Product Details</title>
  <link rel="stylesheet" href="CSS/ProductDetailBody.css">
  <link rel="stylesheet" href="CSS/BareBearsStyle.css">
  <link rel="stylesheet" href="CSS/Cookie.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="CSS/ProductPageButt.css">
  <script src="JS/BareBearsJavascript.js"></script>
  <script src="JS/CountProduct.js"></script>
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
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#fff" fill-opacity="1"
          d="M0,128L20,160C40,192,80,256,120,240C160,224,200,128,240,112C280,96,320,160,360,160C400,160,440,96,480,64C520,32,560,32,600,42.7C640,53,680,75,720,122.7C760,171,800,245,840,256C880,267,920,213,960,160C1000,107,1040,53,1080,37.3C1120,21,1160,43,1200,80C1240,117,1280,171,1320,160C1360,149,1400,75,1420,37.3L1440,0L1440,320L1420,320C1400,320,1360,320,1320,320C1280,320,1240,320,1200,320C1160,320,1120,320,1080,320C1040,320,1000,320,960,320C920,320,880,320,840,320C800,320,760,320,720,320C680,320,640,320,600,320C560,320,520,320,480,320C440,320,400,320,360,320C320,320,280,320,240,320C200,320,160,320,120,320C80,320,40,320,20,320L0,320Z">
        </path>
      </svg>
    </div>
  </div>
  <div id="container">

    <div class="columns">

      <div class="mainDisplay">
        <img id="backgroundImage" src="../Image/Octoplushies/Octo1.jpg">
        <img id="mainFeature" src="../Image/Octoplushies/Octo1.jpg" alt="octoImage">
      </div>
      <br>
      <img class="gallery active" src="../Image/Octoplushies/Octo1.jpg" alt="octoImage1">
      <img class="gallery" src="../Image/Octoplushies/Octo2.jpg" alt="octoImage2">
      <img class="gallery" src="../Image/Octoplushies/Octo3.jpg" alt="octoImage3">
      <img class="gallery" src="../Image/Octoplushies/Octo4.jpg" alt="octoImage4">

    </div>

    <div class="general">
      <?php 
      if(isset($_GET["productID"]))
      {
        $productID=$_GET["productID"];
        $shopID=0;
        $price=0;
        if(($file=fopen("../Data/products.csv","r"))!=false){
          $headingRead=false;
          while(($data=fgetcsv($file,1000,","))!=false)
          {
            if($headingRead==true)
            {
              if($productID===$data[0])
              {
                //name
                echo'
                <h1>'.$data[1].'</h1>
                <h2 id="productID">octo</h2>';
                $shopID=$data[4];
                $price=$data[2];
                break;//only display one
              }
            }
            $headingRead=true;
          }
          fclose($file);
        }
        //open stores.csv
        if(($file=fopen("../Data/stores.csv","r"))!=false){
          $headingRead=false;
          while(($data=fgetcsv($file,1000,","))!=false)
          {
            if($headingRead==true)
            {
              if($shopID===$data[0])
              {
                //shop
                $link="HomeStore.php?storeID=".$data[0];
                
                echo'
                <a href='.$link.'>
                <div class="shop">
                  <img src="../Image/Logo/logoshop2.png" alt="">
                  <div class="shopDetail">
                    <h3>'.$data[1].'</h3>
                    <span>Check Shop</span>
                  </div>
                </div>
              </a>
                ';
                $shopID=$data[4];
                break;//only display one
              }
            }
            $headingRead=true;
          }
          fclose($file);
        }
      }
      ?>

      <hr>
      <p>Happily Angry...all in one!</p>
      <div class="prices">
        <span class="originalPrice">10.99</span>

        <span class="currentPrice">
          <?php echo $price ?>
        </span>
      </div>
      <div class="ButtonSection">
        <div id="inputBox">
          <input id="inp" value=1 type="number">
        </div>
        <div class="inputBut"id="inputBut">
          <div id="buttonBox">

          <?php echo"<a href='$accessLink'>" ?>

          <button onclick="AddToCart(0,true)">Order Now</button>

          <?php echo"</a>"; ?>
          </div>
          <span class="orderButt"><?php echo $accessLink ?></span>


          <div id="buttonBox">
            <button onclick="AddToCart(0,false)">Add</button>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
      let gallery = document.getElementsByClassName("gallery")
      let hoveredImg = document.getElementsByClassName("active")

      for (var i = 0; i < gallery.length; i++) {
        gallery[i].addEventListener("mouseover", function () {
          if (hoveredImg.length > 0) {
            hoveredImg[0].classList.remove("active")
          }
          this.classList.add("active")
          document.getElementById("mainFeature").src = this.src;
          document.getElementById("backgroundImage").src = this.src;
        })
      }
    </script>

    <div class="productTile">

      <h1 id="headerCus">Emotional Octopus</h1>
      <hr>
      <p>Made by the comfiest material that mankind can find, this emotional octopus will surely make your everyday
        social interaction more interesting and cute.</p>
      <p>It is happy on the outside yet sometimes she can be very angry on the inside.</p>
      <p>Consisting of happy and sad expression so whenever you feel happy/sad, turn that face all the way around!</p>
      <p>Be sure to take a visit throughout our other products in the future!</p>
    </div>

  </div>
  <!--Featured products/!-->
  <div class="containerIntro">
    <h1 class="intro"> Recommend Products</h1>
    <p class="introContent"></p>
    <div class="container" id="newShop">
      <?php 
        $random=array(0,0,0,0);
        //find four random products
        for($i=0;$i<count($random);$i++)
        {
          $random[$i]=rand(1,1000);
        }
        //check id with chosen
        function CheckExist($checkNum,$list)
        {
          for($i=0;$i<count($list);$i++)
          {
            if($checkNum===$list[$i])
            {
              return true;
            }
          }
          return false;
        }
        //open file
        $count=0;

        if(($file=fopen("../Data/products.csv","r"))!=false)
        {
          $productPath="../Image/GeneralProduct/";
                //$logoPath="../Image/Logo/";
                $products=array("Yourname.jpg","Coke.jpeg","chip.jpeg","Perfume.jpg","toyota.jpeg","card1.jpg","bag.jpeg","xBox.jpeg","shoe.jpg","router.jpeg");
                //$logos=array("BookCafe.png","CocaCola.jpg","frito.png","Gucci.jpeg","logo-toyota.jpeg","logoshop2.png","louis.jpeg","MicroSoftLogo.jpg","Out-Sneaking.png","verizon-logo.jpeg");
                $running=0;
          $headReaded=false;
          while(($data=fgetcsv($file,1000,","))!=false)
          {
            if($headReaded)
            {
              $curID=(int)$data[0];
              if(CheckExist($curID,$random))
              {
                $count++;
                //img
                $path1=$productPath.$products[$running];
                $link="ProductPage.php?productID=".$data[0];
                $running++;
                if($running>count($products))
                {
                  $running=0;
                }
                //display
                echo'<div class="ProductBox">
                <img src='.$path1.' alt="">
                <h3 class="ProTitle">'.$data[1].'</h3>
                <h3 class="Author"></h3>
                <div class="prices">
                    <span class="star">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    </span>
                    <span class="current">'.$data[2].'</span>
                </div>
                <!--Shop/!-->
                <!--Hover Effect/!-->
                <div class="HoverEffect">
                    <a href='.$link.'>
                        <div class="HoverButton"> Check Now</div>
                    </a>
                </div>
                </div>';
              }
            }
            else{
            $headReaded=true;
            }
            if($count>=4)//stop loop when already found 4 products
            {
              break;
            }
          }
          fclose($file);
        }
      ?>
      
      
     
  
    </div>
    <!--End container/!-->
  </div>
  <!--End container intro/!-->
  <!--Cookies-->
  <div class="cookiesBar" id="cookies">
    <img src="../Image/FreeCookies.jpg" alt="cookies Logo">
    <span>We use cookies in this website to give you the best experience on our site and show relevant ads. To find out
      more, read <a href="PrivacyPolicy.html">privacy plicy</a> and <a href="">cookie Policy</a></span>
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
<script type="text/javascript" src="JS/Cookies.js"></script>