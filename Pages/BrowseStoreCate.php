<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <link rel="stylesheet" href="CSS/BareBearsStyle.css">
    <link rel="stylesheet" href="CSS/BrowseStoreCateStyle.css">
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
    <!--content-->
    <div class="content">
        <div class="Starter">
            <h3>What is your desire?</h3>
            <p>Browse Stores by Category</p>
        </div>
        <div class="container">
            <div class="LetterBox">
                <?php 
                  $categories=[];
                  //save category into a list
                  if(($file=fopen("../Data/categories.csv","r"))!=false){
                    $headingRead=false;
                    while(($data=fgetcsv($file,1000,","))!=false)
                      {
                        if($headingRead==true)
                        {
                          $categories[]=$data[1];
                        }
                        $headingRead=true;
                      }
                      fclose($file);
                  }
                  $storeList=[];
                  //init store list
                  for($i=0;$i<count($categories);$i++)
                  {
                    $storeList[]=array();
                  }
                  //save stores into an array with and group the cate group together
                  if(($file=fopen("../Data/stores.csv","r"))!=false){
                    $headingRead=false;
                    while(($data=fgetcsv($file,1000,","))!=false)
                    {
                      if($headingRead==true)
                      {
                        for($i=1;$i<=count($categories);$i++) //cate start with 1
                        {
                          $cate=(int)$data[2];
                          if($cate===$i)
                          {
                            $storeList[$i-1][]=array($data[0],$data[1]);//$storeList start from 0, save store name
                            break;
                          }
                        }
                      }
                      $headingRead=true;
                    }
                    fclose($file);
                  }
                  //display box
                   $productPath="../Image/GeneralProduct/";
                    $products=array("Yourname.jpg","Coke.jpeg","chip.jpeg","Perfume.jpg","toyota.jpeg","card1.jpg","bag.jpeg","xBox.jpeg","shoe.jpg","router.jpeg");
                    $running=8;
                    for($i=0;$i<count($categories);$i++)
                  {
                    echo'<h3>'.$categories[$i].'</h3>';
                    //container
                    echo'<div class="storeContainer">';
                    echo'<span class="locator" id='.$categories[$i].'></span>';
                    if(count($storeList[$i])>0)
                    {
                      foreach($storeList[$i] as $store)
                      {
                        //assign random photo
                        $path=$productPath.$products[$running];
                        $running++;
                        if($running>=count($products))
                        {
                          $running=0;
                        }
                        $link="HomeStore.php?storeID=".$store[0];
                        echo'
                          <div class="box">
                          <img src='.$path.' alt="Book World Logo">
                          <div class="information">
                              <h3 class="shopName">'.$store[1].'</h3>
                              <h4 class="category">'.$store[1].'</h4>
                          </div>
                          <div class="HoverEffect">
                                <a href='.$link.'>
                              <div class="HoverButton"> Check Now</div>
                              </a>
                          </div>
                          </div>';
                      }
                    }
                    echo'</div>';
                    //end container
                  }
                ?>
            </div>
        </div>
    </div>
    <!--Cookies-->
    <div class="cookiesBar" id="cookies">
        <img src="../Image/FreeCookies.jpg" alt="cookies Logo">
        <span>We use cookies in this website to give you the best experience on our site and show relevant ads. To find
            out more, read <a href="PrivacyPolicy.html">privacy plicy</a> and <a href="">cookie Policy</a></span>
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