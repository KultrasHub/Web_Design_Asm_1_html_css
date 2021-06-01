<?php 
    if(file_exists("../install.php")){
    die("Error ENCOUNTER: install.php file exists. Please locate the install.php file in the web folder and delete it before restarting the webpage.");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Home Store</title>
    <link rel="stylesheet" href="CSS/StorePageStyle.css" />
    <link rel="stylesheet" href="CSS/ShopHeader_FooterStyle.css" />
    <link rel="stylesheet" href="CSS/Cookie.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <!--Top Subjects(Categories)-->
    <div class="TopCategories" id="TopCategoriesID">
        <h3></h3>
        <!-- Change to this depends on ur products-->
        <div class="container">
            <div class="box">
                <img src="../Image/Covers/LightNovel.jpg" alt="" />
                <!--an example for ur category-->
                <div class="Title">
                    <span class="UpperTitle">Light Novel</span>
                    <span class="LowerTitle">Simple, romantic and fantasy</span>
                </div>
                <div class="HoverEffect">
                    <a href="#LightNovel">
                        <div class="HoverButton">Go to</div>
                    </a>
                </div>
            </div>
            <div class="box">
                <img src="../Image/Covers/Economy.jpg" alt="" />
                <!--an example for ur category-->
                <div class="Title">
                    <span class="UpperTitle">Economy</span>
                    <span class="LowerTitle">Precise and realistic</span>
                </div>
                <div class="HoverEffect">
                    <a href="#Economy">
                        <div class="HoverButton">Go to</div>
                    </a>
                </div>
            </div>
            <div class="box">
                <img src="../Image/Covers/Detective.jpg" alt="" />
                <!--an example for ur category-->
                <div class="Title">
                    <span class="UpperTitle">Detective</span>
                    <span class="LowerTitle">Compelling, thrilling and Dramatic</span>
                </div>
                <div class="HoverEffect">
                    <a href="#Detective&Mysterious">
                        <div class="HoverButton">Go to</div>
                    </a>
                </div>
            </div>
            <div class="box">
                <img src="../Image/Covers/scifi.jpg" alt="" />
                <!--an example for ur category-->
                <div class="Title">
                    <span class="UpperTitle">Scifi</span>
                    <span class="LowerTitle">Exploration and alien concept</span>
                </div>
                <div class="HoverEffect">
                    <a href="#Scifi&Fantasy">
                        <div class="HoverButton">Go to</div>
                    </a>
                </div>
            </div>
        </div>
        <!--End container-->
    </div>

    <!--Featured-->
    <div class="Display" id="Featured">
        <div class="background" style="background-color: rgba(13, 149, 242, 0.3)"></div>
        <h3>Featured Products</h3>
        <div class="container">
            <!--box-->
            <?php 
              //get store id
              $storeID=-1;
              if(isset($_GET["storeID"]))
              {
                $storedID=(int)$_GET["storeID"];
              }
              else{
                //sort of bug
                //
              }
              if($storedID>0)
              {
                  //open file
                if(($file=fopen("../Data/products.csv","r"))!=false){
                    $headingRead=false;
                    //display different image
                    $productPath="../Image/GeneralProduct/";
                    //$logoPath="../Image/Logo/";
                    $products=array("Yourname.jpg","Coke.jpeg","chip.jpeg","Perfume.jpg","toyota.jpeg","card1.jpg","bag.jpeg","xBox.jpeg","shoe.jpg","router.jpeg");
                    //$logos=array("BookCafe.png","CocaCola.jpg","frito.png","Gucci.jpeg","logo-toyota.jpeg","logoshop2.png","louis.jpeg","MicroSoftLogo.jpg","Out-Sneaking.png","verizon-logo.jpeg");
                    $running=0;
                    while(($data=fgetcsv($file,1000,","))!=false)//read file line by line
                    {
                      if($headingRead==true)//avoid title section
                      {
                        $tempID=(int)$data[4];
                        if($tempID===$storedID)
                        {
                            //this item belongs to this shop
                            //now check if this item is featured in shop
                            if($data[6]==="TRUE")
                            {
                                $path=$productPath.$products[$running];
                                $running++;
                                if($running>=count($products))
                                {
                                    $running=0;
                                }
                                $link="ProductPage.php?productID=".$data[0];
                                //display as Box
                                echo'
                                <div class="box">
                                    <img src='.$path.' alt="product photo" />
                                    <span class="ProductName">'.$data[1].$data[0].'</span>
                                    <span class="AuthorName"></span>
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
                                    <div class="HoverEffect">
                                    <a href='.$link.'>
                                        <div class="HoverButton">Check</div>
                                        </a>
                                    </div>
                                </div>
                                ';
                            }
                        }
                      }
                      $headingRead=true;
                    }
                    fclose($file);
                  }
              }
            ?>
        </div>
        <!--End Container-->
    </div>
    <!--EndFeatured-->

    <!--Latest-->
    <div class="Display">
        <div class="background" style="background-color: #ccc"></div>
        <h3>Latest Products</h3>
        <div class="container">
        <?php 
             //get store id
              $storeID=-1;
              if(isset($_GET["storeID"]))
              {
                $storedID=(int)$_GET["storeID"];
              }
              else{
                //sort of bug
                //
              }
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
              //time setup
              $now=time();
              $mostRecent=array(0,0,0,0,0);
              $mostRecentID=array("-1","-1","-1","-1","-1");//at most 5products

              //find 10 most recent stores
              if($storedID>0)
              {
                if(($file=fopen("../Data/products.csv","r"))!=false){//open file
                    $headingRead=false;
                    while(($data=fgetcsv($file,1000,","))!=false)//read file line by line
                    {
                    if($headingRead==true)//ignore title
                    {
                        $tempID=(int)$data[4];
                        if($storedID===$tempID)//only save the products belong to this shop
                        {
                            $curDate=strtotime($data[3]);
                            $curId=strval($data[0]);
                            //check with 10 most recent
                            $value=DateCheck($curDate,$mostRecent,$curId,$mostRecentID);
                            $mostRecent=$value['date'];
                            $mostRecentID=$value['id'];
                        }
                    }
                        $headingRead=true;
                    }
                    fclose($file);
                }
                //display most recent id
                // for($i =0;$i<count($mostRecentID);$i++)
                // {
                //     echo"-".$mostRecentID[$i]."<br>";
                // }
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
                        $path=$productPath.$products[$running];
                        $running++;
                        $link="ProductPage.php?productID=".$data[0];
                        if($running>=count($products))
                        {
                            $running=0;
                        }
                        //extract data
                        //<!--box/!-->
                        echo'
                                <div class="box" >
                                    <img src='.$path.' alt="product photo" />
                                    <span class="ProductName">'.$data[1].$data[0].'</span>
                                    <span class="AuthorName"></span>
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
                                    <div class="HoverEffect">
                                    <a href='.$link.'>
                                        <div class="HoverButton">Check</div>
                                        </a>
                                    </div>
                                </div>
                                ';
                        //<!--End Box/!-->
                        }
                        //if not run Id is failed 
                    }
                    $headingRead=true;
                    }
                    fclose($file);
                }
              }
            ?>
        </div>
        <!--End Container-->
    </div>
    <!--Endlatest-->

    <!--EndDisplay-->
    <!--Cookies-->
    <div class="cookiesBar" id="cookies">
        <img src="../Image/FreeCookies.jpg" alt="cookies Logo" />
        <span>We use cookies in this website to give you the best experience on our
            site and show relevant ads. To find out more, read
            <a href="PrivacyPolicy.php">privacy policy</a> and
            <a href="">cookie Policy</a></span>
        <div onclick="HideCookie()"><span>I understand</span></div>
    </div>
    <!--End Cookies-->
    <!--Footer-->
    <footer>
        <div class="LowerBar">
            <section class="CopyRight">Copyright© Book World 2021</section>
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
<script type="text/javascript" src="JS/BrowseBox.js"></script>
