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
            <li><a href="AboutUs_Store.php">About Us</a></li>

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
                            <li class="DropDownDetail" onclick="todo('BookWorld.html#LightNovel')">
                                <span> Light Novel</span>
                            </li>
                            <li class="DropDownDetail" onclick="todo('BookWorld.html#Economy')">
                                <span> Economy</span>
                            </li>
                            <li class="DropDownDetail" onclick="todo('BookWorld.html#Detective&Mysterious')">
                                <span> Detective & Mystery</span>
                            </li>
                            <li class="DropDownDetail" onclick="todo('BookWorld.html#Scifi&Fantasy')">
                                <span> Science Fiction & Fantasy</span>
                            </li>
                            <li class="DropDownDetail" onclick="todo('BookWorld.html#SelfImprovement')">
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