<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="CSS/HomeStyle.css">
    <link rel="stylesheet" href="CSS/BareBearsStyle.css">
    <link rel="stylesheet" href="CSS/Cookie.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="JS/BareBearsJavascript.js"></script>

</head>

<body>
    <header>
        <a href="Home.html" class="LogoName">
            <img class="logo" src="../Image/Essen/barebear.png" alt="logo">
            <span>Bare Bears</span>
        </a>

        <ul class="navLinks" id="navigationBar">
            <li onclick="location.href='Home.html'"><a href="Home.html">Home</a></li>
            <li onclick="location.href='AboutUs.html'"><a href="AboutUs.html">About Us</a></li>
            <li onclick="location.href='Fees.html'"><a href="Fees.html">Fees</a></li>
            <li onclick="location.href='FAQs.html'"><a href="FAQs.html">FAQs</a></li>
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
                                    <a href="BrowseStore.html#A">A</a>
                                    <a href="BrowseStore.html#B">B</a>
                                    <a href="BrowseStore.html#C">C</a>
                                    <a href="BrowseStore.html#D">D</a>
                                    <a href="BrowseStore.html#E">E</a>
                                    <a href="BrowseStore.html#F">F</a>
                                    <a href="BrowseStore.html#G">G</a>

                                    <a href="BrowseStore.html#H">H</a>
                                    <a href="BrowseStore.html#I">I</a>

                                    <a href="BrowseStore.html#J">J</a>
                                    <a href="BrowseStore.html#K">K</a>
                                    <a href="BrowseStore.html#L">L</a>
                                    <a href="BrowseStore.html#M">M</a>

                                    <a href="BrowseStore.html#N">N</a>
                                    <a href="BrowseStore.html#O">O</a>
                                    <a href="BrowseStore.html#P">P</a>
                                    <a href="BrowseStore.html#Q">Q</a>

                                    <a href="BrowseStore.html#R">R</a>
                                    <a href="BrowseStore.html#S">S</a>
                                    <a href="BrowseStore.html#T">T</a>
                                    <a href="BrowseStore.html#U">U</a>

                                    <a href="BrowseStore.html#V">V</a>
                                    <a href="BrowseStore.html#W">W</a>
                                    <a href="BrowseStore.html#X">X</a>
                                    <a href="BrowseStore.html#Y">Y</a>
                                    <a href="BrowseStore.html#Z">Z</a>
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
            <a id="myAcount" class="myAcount" onclick="MyAccount()"><img src="../Image/Profolio/user.png" alt=""></a>
        </ul>
        <div class="headerSimulator">
            <div class="holder">
                <a href="" class="myAcount top_right" onclick="MyAccount()"><img src="../Image/Profolio/user.png"
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
    <!--banner-->
    <div class="Banner">
        <img src="../Image/WeatheringWithYouBanner.jpg" alt="">
        <h1>2020</h1>
        <h3>Weathering with you</h3>
        <h4>I want you more than any blue sky...</h4>
        <a href="#">
            <div>Shop Now</div>
        </a>
    </div>
    <!--New shop/!-->

    <div class="containerIntro">
        <h1 class="intro"> New Stores</h1>
        <p class="introContent">More flexibility, faster go to market. See what these new stores have for you.</p>
        <div class="container" id="ShopCarousel">
            <?php 
              //time setup
              $now=time();
              $mostRecent=array(0,0,0,0,0,0,0,0,0,0);
              $mostRecentID=array("0","0","0","0","0","0","0","0","0","0");
              //function to add in new days and move days back
              function DateCheck($dateToCheck,$array,$idToCheck,$idList){
                $unfound=false;
                $mostTempRecent=$array;
                $tempIDList=$idList;
                //Set up original value
                $previousDate=$mostTempRecent[0];
                $previousId=$tempIDList[0];
                for($i=0;$i<count($mostTempRecent);$i++)
                {
                  if(!$unfound)//control if a value has been saved to the list
                  {
                    if($dateToCheck>$mostTempRecent[$i])
                    {
                    //replace the current one with date to check
                    //save the value of the previous
                    $temp=$mostTempRecent[$i];
                    $mostTempRecent[$i]=$dateToCheck;
                    $previousDate=$temp;
                    $unfound=true;
                    //save and replace id
                    $tempID=$tempIDList[$i];
                    $tempIDList[$i]=$idToCheck;
                    $previousId=$tempID;
                    //this only run once
                    }
                  }
                  else{
                    //if replace the current one with the previous value
                    //in general swap value with $previous date
                    $temp=$mostTempRecent[$i];
                    $mostTempRecent[$i]=$previousDate;
                    $previousDate=$temp;
                    //replace the current id with the previous ID
                    //echo"id Value: ".$tempIDList[$i]." at".$i;
                    $tempID=$tempIDList[$i];
                    $tempIDList[$i]=$previousId;
                    $previousId=$tempID;
                  }
                } 
                return array('date'=>$mostTempRecent,'id'=>$tempIDList);
              }
              //function compare id saved with the id currently on check
              function CheckingID($idToCheck,$idList)
              {
                for($i=0;$i<count($idList);$i++)
                {
                  if($idToCheck==$idList[$i]){
                    return true;
                  }
                }
                return false;
              }
              //find 10 most recent stores
              if(($file=fopen("../Data/stores.csv","r"))!=false){
                $headingRead=false;
                while(($data=fgetcsv($file,1000,","))!=false)
                {
                  if($headingRead==true)
                  {
                  //ignore the first line
                  $curDate=strtotime($data[3]);
                  $curId=strval($data[0]);
                  //check with 10 most recent
                  $value=DateCheck($curDate,$mostRecent,$curId,$mostRecentID);
                  $mostRecent=$value['date'];
                  $mostRecentID=$value['id'];
                  }
                  $headingRead=true;
                }
                fclose($file);
              }
              //display most recent id
              // for($i =0;$i<count($mostRecentID);$i++)
              // {
              //   echo"-".$mostRecentID[$i]."<br>";
              // }
              //Unnecessary-----------------------------------
              //display different products and logo 
              $productPath="../Image/GeneralProduct/";
              $logoPath="../Image/Logo/";
              $products=array("Yourname.jpg","Coke.jpeg","chip.jpeg","Perfume.jpg","toyota.jpeg","card1.jpg","bag.jpeg","xBox.jpeg","shoe.jpg","router.jpeg");
              $logos=array("BookCafe.png","CocaCola.jpg","frito.png","Gucci.jpeg","logo-toyota.jpeg","logoshop2.png","louis.jpeg","MicroSoftLogo.jpg","Out-Sneaking.png","verizon-logo.jpeg");
              $running=0;
              //read file again to extract data for boxes
              if(($file=fopen("../Data/stores.csv","r"))!=false){
                $headingRead=false;
                while(($data=fgetcsv($file,1000,","))!=false)
                {
                  if($headingRead==true)//ignore the header
                  {
                  //compare with the saved id
                    $curID=strval($data[0]);
                    if(CheckingID($curID,$mostRecentID))
                    {
                      //if here run id is corrected
                      $name=$data[1];
                      $path1=$productPath.$products[$running];
                      $path2=$logoPath.$logos[$running];
                      $running++;
                      if($running>=count($logos))
                      {
                        $running=0;
                      }
                      $link='HomeStore.php?storeID='.$data[0];
                      //extract data
                      //<!--box/!-->
                      echo'<div class="box" onclick="location.href='.$link.'">
                          <!--Shop/!-->
                          <div class="shop">
                              <img src='.$path2.' alt="">
                              <h3>'.$name.'</h3>
                              <p>'.$name.'</p>
                          </div>
                          <div class="bestSeller">
                              <h3>Best Seller</h3>
                              <!--Best seller on the right/!-->
                              <div class="product">
                                  <img src='.$path1.' alt="">
                                  <div class="productDetail">
                                      <h4>Weathering With You</h4>
                                  </div>
                              </div>
                          </div>
                          <!--Hover Effect/!-->
                          <div class="HoverEffect">
                              <a href='.$link.'>
                                  <div class="HoverButton"> Check Now</div>
                              </a>
                          </div>
                      </div>';
                      //<!--End Box/!-->
                    }
                    //if not run Id is failed 
                  }
                  $headingRead=true;
                }
                fclose($file);
              }
            ?>
            <div class="sliderButton">
                <div class="left-slider-button">
                    <div></div>
                </div>
                <div class="right-slider-button">
                    <div></div>
                </div>
            </div>
        </div>
        <!--End container/!-->
    </div>
    <!--End container intro/!-->
    <!--New product/!-->
    <div class="containerIntro">
        <h1 class="intro"> New Arrivals</h1>
        <p class="introContent">Biggest new product by the hottest brands destined to become future classics.</p>
        <div class="container" id="newShop">
            <?php 
              //time setup
              $now=time();
              $mostRecent=array(0,0,0,0,0,0,0,0,0,0);
              $mostRecentID=array("0","0","0","0","0","0","0","0","0","0");//at most 10 stores

              //find 10 most recent stores
              if(($file=fopen("../Data/products.csv","r"))!=false){
                $headingRead=false;
                while(($data=fgetcsv($file,1000,","))!=false)
                {
                  if($headingRead==true)
                  {
                  //ignore the first line
                  $curDate=strtotime($data[3]);
                  $curId=strval($data[0]);
                  //check with 10 most recent
                  $value=DateCheck($curDate,$mostRecent,$curId,$mostRecentID);
                  $mostRecent=$value['date'];
                  $mostRecentID=$value['id'];
                  }
                  $headingRead=true;
                }
                fclose($file);
              }
              //display most recent id
              for($i =0;$i<count($mostRecentID);$i++)
              {
                echo"-".$mostRecentID[$i]."<br>";
              }
              //Unnecessary-----------------------------------
              //display different products and logo 
              $productPath="../Image/NewProducts/";
              $products=array("DanMachi_3.jpg","Yourname.jpg","Dumbell.jpg","gun.jpg","hipplush1.jpg","jam.jpg","RichDadPoorDad.jpg","Shoes.jpg","Shoes2.jpg","pink.jpg");
             
              $running=0;
              //read file again to extract data for boxes
              if(($file=fopen("../Data/products.csv","r"))!=false){
                $headingRead=false;
                while(($data=fgetcsv($file,1000,","))!=false)
                {
                  if($headingRead==true)//ignore the header
                  {
                  //compare with the saved id
                    $curID=strval($data[0]);
                    if(CheckingID($curID,$mostRecentID))
                    {
                      //if here run id is corrected
                      $name=$data[1];
                      $path1=$productPath.$products[$running];
                      $running++;
                      if($running>=count($products))
                      {
                        $running=0;
                      }
                      //extract data
                      $link="ProductPage.php?productID=".$data[0];
                      //<!--box/!-->
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
                      //<!--End Box/!-->
                    }
                    //if not run Id is failed 
                  }
                  $headingRead=true;
                }
                fclose($file);
              }
            ?>
            <div class="sliderButton">
                <div class="left-slider-button">
                    <div></div>
                </div>
                <div class="right-slider-button">
                    <div></div>
                </div>
            </div>
        </div>
        <!--End container/!-->
    </div>
    <!--End container intro/!-->
    <!--A middle bar for advertisement-->
    <div class="DiscountBar">
        <div class="display">
            <div class="timeDisplay">
                <div class="box">
                    <h4 class="time">12</h4>
                    <p class="timeName">days</p>
                </div>
                <div class="box">
                    <h4 class="time">12</h4>
                    <p class="timeName">hours</p>
                </div>
                <div class="box">
                    <h4 class="time">12</h4>
                    <p class="timeName">minutes</p>
                </div>
                <div class="box">
                    <h4 class="time">12</h4>
                    <p class="timeName">seconds</p>
                </div>

            </div>
            <img src="../Image/KentSneaker/Jordan1/Jordan1LowSmokeGrey.jpg" alt="">
        </div>
        <div class="Desciption">
            <h4 class="DiscountTitle"> Jordan Low Smoke Grey</h4>
            <p class="DiscountDetail">Now it appears that the colorway will be receiving an alternate low-cut edition,
                this time capped with striking red accents among other minor tweaks. Like the Mid, this Air Jordan 1 Low
                “Light Smoke Grey” gears-up in a white leather upper, and comes overlayed by the titular shade at the
                toe, eyestay and heel. Swooshes, liners, and laces all remain a stark black, while minor changes to the
                tongue (from grey to black), collar (white to grey), and outsole (grey to white) are a little less
                noticeable than the inclusion of the punchy red brand embroidery and insoles.</p>
            <div class="prices">
                <span class="original">210</span>
                <br>
                <span class="current">207</span>
            </div>
            <a href="#" class="checkBut">
                Check Now
            </a>
        </div>

    </div>
    <!--End of advertisement-->

    <!--Featured shop/!-->
    <div class="containerIntro">
        <h1 class="intro"> Featured Stores</h1>
        <p class="introContent">Check the stores has been featured by developers.</p>
        <div class="container" id="newShop">
            <!--1 ----------------------------------->
            <?php 
              //open files
              if(($file=fopen("../Data/stores.csv","r"))!=false){
                $headingRead=false;
                //featured stores
                $maxAmount=10;
                $count=0;
                //image path
                //display different products and logo 
              $productPath="../Image/GeneralProduct/";
              $logoPath="../Image/Logo/";
              $products=array("Yourname.jpg","Coke.jpeg","chip.jpeg","Perfume.jpg","toyota.jpeg","card1.jpg","bag.jpeg","xBox.jpeg","shoe.jpg","router.jpeg");
              $logos=array("BookCafe.png","CocaCola.jpg","frito.png","Gucci.jpeg","logo-toyota.jpeg","logoshop2.png","louis.jpeg","MicroSoftLogo.jpg","Out-Sneaking.png","verizon-logo.jpeg");
              $imgCount=4;
                while(($data=fgetcsv($file,1000,","))!=false)
                {
                  if($data[4]==="TRUE")
                  {
                    if($count<$maxAmount)//limit to display at most 10 stores
                    {
                      $path1=$productPath.$products[$imgCount];
                      $path2=$logoPath.$logos[$imgCount];

                    $imgCount+=1;
                    if($imgCount>=count($products)){
                      $imgCount=0;
                    }
                    $count+=1;
                    $link='HomeStore.php?storeID='.$data[0];
                    //<!--box/!-->
                    echo'
                      <div class="box" onclick="location.href='.$link.'">
                          <!--Shop/!-->
                          <div class="shop">
                              <img src='.$path2.' alt="">
                              <h3>'.$data[1].'</h3>
                              <p>'.$data[1].'</p>
                          </div>
                          <div class="bestSeller">
                              <h3>Best Seller</h3>
                              <!--Best seller on the right/!-->
                              <div class="product">
                                  <img src='.$path1.' alt="">
                                  <div class="productDetail">
                                      <h4></h4>
                                  </div>
                              </div>
                          </div>
                          <!--Hover Effect/!-->
                          <div class="HoverEffect">
                              <a href='.$link.'>
                                  <div class="HoverButton"> Check Now</div>
                              </a>
                          </div>
                      </div>';
           // <!--End Box/!-->
                    }
                  }
                }

                fclose($file);
              }
              
              ?>

            <div class="sliderButton">
                <div class="left-slider-button">
                    <div></div>
                </div>
                <div class="right-slider-button">
                    <div></div>
                </div>
            </div>
        </div>
        <!--End container/!-->
    </div>
    <!--End container intro/!-->
    <!--Featured products/!-->
    <div class="containerIntro">
        <h1 class="intro"> Featured Products</h1>
        <p class="introContent"></p>
        <div class="container" id="newShop">
            <?php 
              //open files
              if(($file=fopen("../Data/products.csv","r"))!=false){
                $headingRead=false;
                //featured stores
                $maxAmount=10;
                $count=0;
                //image path
                //display different products and logo 
              $productPath="../Image/GeneralProduct/";
              $products=array("Yourname.jpg","Coke.jpeg","chip.jpeg","Perfume.jpg","toyota.jpeg","card1.jpg","bag.jpeg","xBox.jpeg","shoe.jpg","router.jpeg");
              $imgCount=4;
                while(($data=fgetcsv($file,1000,","))!=false)
                {
                  if($data[6]==="TRUE")
                  {
                    if($count<$maxAmount)//limit to display at most 10 stores
                    {
                      $path1=$productPath.$products[$imgCount];

                    $imgCount+=1;
                    if($imgCount>=count($products)){
                      $imgCount=0;
                    }
                    $count+=1;
                    //<!--box/!-->
                    $link="ProductPage.php?productID=".$data[0];
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
                          <a href='.$data[0].'>
                              <div class="HoverButton"> Check Now</div>
                          </a>
                      </div>
                  </div>';
           // <!--End Box/!-->
                    }
                  }
                }

                fclose($file);
              }
              
              ?>

            <div class="sliderButton">
                <div class="left-slider-button">
                    <div></div>
                </div>
                <div class="right-slider-button">
                    <div></div>
                </div>
            </div>
        </div>
        <!--End container/!-->
    </div>
    <!--Cookies-->
    <div class="cookiesBar" id="cookies">
        <img src="../Image/FreeCookies.jpg" alt="cookies Logo">
        <span>We use cookies in this website to give you the best experience on our site and show relevant ads. To find
            out more, read <a href="PrivacyPolicy.html">privacy plicy</a> and <a href="">cookie Policy</a></span>
        <div onclick="HideCookie()"> <span>I understand</span></div>
    </div>
    <!--End Cookies-->
    <!--End container intro/!-->
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
<script type="text/javascript" src="JS/BrowseBox.js"></script>
<script type="text/javascript" src="JS/HomeCarousel.js"></script>
<script type="text/javascript" src="JS/Cookies.js"></script>