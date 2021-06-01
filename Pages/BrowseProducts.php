<?php 
    if(file_exists("../install.php")){
    die("Error ENCOUNTER: install.php file exists. Please locate the install.php file in the web folder and delete it before restarting the webpage.");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Products</title>
    <link rel="stylesheet" href="CSS/BrowseProducts_BookWorldStyle.css">
    <link rel="stylesheet" href="CSS/ShopHeader_FooterStyle.css">
    <link rel="stylesheet" href="CSS/Cookie.css">
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
     <!--content-->
  <div class="content">
    <div class="Starter">
      <h3>Looking for latest products?</h3>
      <p>Browse Products by Date</p>
    </div>
    <?php 
      $link="location.href='HomeStore.php'";
       if(isset($_GET["storeID"]))
       {
         $storeID=(int)$_GET["storeID"];
         if($storedID>0)
         {
           $link="location.href='HomeStore.php?storeID=".$storedID."'";
         }
       }
    ?>
    <div class="return" onclick=<?php echo$link ?>> 
    <i class="fa fa-chevron-left" aria-hidden="true"></i>
          <div class="returninfo">
            
            <span class="store">storeName</span>
            <span class="normal">Back to store</span>
          </div>
      </div>
    <div class="container">
      <div class="LetterBox"> 
        <?php 
          if(isset($_GET["storeID"]))
          {
            $storeID=(int)$_GET["storeID"];
            $dir=$_GET["dir"];
            $pageID=(int)$_GET["pageID"];
            //function to add in new days and move days back
            function DateCheck($dateToCheck,$array,$idToCheck,$idList,$dir){
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
                  if($dir==0)
                  {
                    if($dateToCheck>=$mostTempRecent[$i])
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
                  if($dir==1)
                  {
                    if($dateToCheck<=$mostTempRecent[$i])
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
            if($dir==='0')
            {
              //newest
              echo'<div class="containerHeader"> <h3>Latest Products</h3>';
              $count=0;
              $storePerPage=2;
              $productsList=[];//store all products
              if(($file=fopen("../Data/products.csv","r"))!=false){//open file
                $headingRead=false;
                while(($data=fgetcsv($file,1000,","))!=false)//read file line by line
                {
                  if($headingRead==true)//ignore title
                  {
                      $tempID=(int)$data[4];
                      if($storeID===$tempID)
                      {
                        $count++;
                        $productsList[]=array($data[0],$data[1],$data[2],$data[3]);
                      }
                  }
                  $headingRead=true;
                }
                fclose($file);
              }
              $capacity=ceil($count/$storePerPage);//find out how many page will have
              $prePageID=(int)$pageID-1;
              if($prePageID<=0)
              {
                $prePageID=1;
              }
              $link="BrowseProducts.php?storeID=".$storeID."&pageID=".$prePageID."&dir=".$dir."" ;
              echo'<div class="pagination">';
              //left button
              echo'<a class="cover" href='.$link.'>
              <i class="fa fa-chevron-left" aria-hidden="true"></i>
                  </a>';
                  //links throught numbers
              for($i=0;$i<$capacity;$i++)
              {
                $offset=$i+1;
                $link="BrowseProducts.php?storeID=".$storeID."&pageID=".$offset."&dir=".$dir."" ;
                if($offset!=$pageID)
                {
                  echo'<a href='.$link.'>'.$offset.'</a>';
                }
                else{
                  echo'<a class="chosen" href='.$link.'>'.$offset.'</a>';
                }
 
              }
              //right button
              $nextPageID=(int)$pageID+1;
              if($nextPageID>$capacity)
              {
                $nextPageID=$capacity;
              }
              $link="BrowseProducts.php?storeID=".$storeID."&pageID=".$nextPageID."&dir=".$dir."" ;
              echo '<a class="cover" href='.$link.'>
              <i class="fa fa-chevron-right" aria-hidden="true"></i>
              </a>
              </div></div>';//close container Header
              echo'<div class="storeContainer">';
              //search products
              //function compare id saved with the id currently on check
              function CheckingID($idToCheck,$idList,$dateList)
              {
                for($i=0;$i<count($idList);$i++)
                {
                  if($idToCheck==$idList[$i]){
                    return date('Y-m-d H:i:s', $dateList[$i]);
                  }
                }
                return 0;
              }
              
               //time setup
               $mostRecent=[];
               $mostRecentID=[];//at most 2products
               //find 2 most recent stores
              for($i=0;$i<$count;$i++)
              {
                $mostRecent[]=0;
                $mostRecentID[]="-1";
              }
              //find stores in order
              if($storeID>0)
              {
                if(($file=fopen("../Data/products.csv","r"))!=false){//open file
                    $headingRead=false;
                    while(($data=fgetcsv($file,1000,","))!=false)//read file line by line
                    {
                    if($headingRead==true)//ignore title
                    {
                        $tempID=(int)$data[4];
                        if($storeID===$tempID)//only save the products belong to this shop
                        {
                            $curDate=strtotime($data[3]);
                            $curId=strval($data[0]);
                            //check with 10 most recent
                            $value=DateCheck($curDate,$mostRecent,$curId,$mostRecentID,0);
                            $mostRecent=$value['date'];
                            $mostRecentID=$value['id'];
                        }
                    }
                        $headingRead=true;
                    }
                    fclose($file);
                }
                //display most recent id
                //  for($i =0;$i<count($mostRecentID);$i++)
                // {
                //     echo"-".$mostRecentID[$i]."-".date('Y-m-d H:i:s', $mostRecent[$i])."<br>";
                // }
                //Unnecessary-----------------------------------
                //display different products and logo 
                $productPath="../Image/NewProducts/";
                $products=array("DanMachi_3.jpg","Yourname.jpg","Dumbell.jpg","gun.jpg","hipplush1.jpg","jam.jpg","RichDadPoorDad.jpg","Shoes.jpg","Shoes2.jpg","pink.jpg");
                $running=0;
                //place to start
                $whereToStart=((int)$pageID-1)*$storePerPage;
                
                $whereToStop=$whereToStart+$storePerPage;
                //read file again to extract data for boxes
                for($i=$whereToStart;$i<$whereToStop;$i++)//loop through products id that is in order
                {
                  if($i>=count($mostRecentID))
                  {
                    break;
                  }
                  foreach($productsList as $data)//loop through products in no order
                  {
                    if($mostRecentID[$i]==$data[0])
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
                      $date=date('Y-m-d H:i:s', $mostRecent[$i]);
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
                                  <div class="addedTime">
                                  <span>'.$date.'</span>
                                  </div>
                                  <div class="HoverEffect">
                                  <a href='.$link.'>
                                      <div class="HoverButton">Check</div>
                                      </a>
                                  </div>
                              </div>
                              ';
                      //<!--End Box/!-->
                      break;
                    }
                      //if not run Id is failed 

                  }
                }       
              }
              echo'</div>';
            }
            else{
              //oldest
              echo'<div class="containerHeader"> <h3>Oldest Products</h3>';
              $count=0;
              $storePerPage=2;
              $productsList=[];//store all products
              if(($file=fopen("../Data/products.csv","r"))!=false){//open file
                $headingRead=false;
                while(($data=fgetcsv($file,1000,","))!=false)//read file line by line
                {
                  if($headingRead==true)//ignore title
                  {
                      $tempID=(int)$data[4];
                      if($storeID===$tempID)
                      {
                        $count++;
                        $productsList[]=array($data[0],$data[1],$data[2],$data[3]);
                      }
                  }
                  $headingRead=true;
                }
                fclose($file);
              }
              $capacity=ceil($count/$storePerPage);//find out how many page will have
              $prePageID=(int)$pageID-1;
              if($prePageID<=0)
              {
                $prePageID=1;
              }
              $link="BrowseProducts.php?storeID=".$storeID."&pageID=".$prePageID."&dir=".$dir."" ;
              echo'<div class="pagination">';
              //left button
              echo'<a class="cover" href='.$link.'>
              <i class="fa fa-chevron-left" aria-hidden="true"></i>
                  </a>';
                  //links throught numbers
              for($i=0;$i<$capacity;$i++)
              {
                $offset=$i+1;
                $link="BrowseProducts.php?storeID=".$storeID."&pageID=".$offset."&dir=".$dir."" ;
                if($offset!=$pageID)
                {
                  echo'<a href='.$link.'>'.$offset.'</a>';
                }
                else{
                  echo'<a class="chosen" href='.$link.'>'.$offset.'</a>';
                }
 
              }
              //right button
              $nextPageID=(int)$pageID+1;
              if($nextPageID>$capacity)
              {
                $nextPageID=$capacity;
              }
              $link="BrowseProducts.php?storeID=".$storeID."&pageID=".$nextPageID."&dir=".$dir."" ;
              echo '<a class="cover" href='.$link.'>
              <i class="fa fa-chevron-right" aria-hidden="true"></i>
              </a>
              </div></div>';//close container Header
              echo'<div class="storeContainer">';
              //search products         
               //time setup
               $mostRecent=[];
               $mostRecentID=[];//at most 2products
               //find 2 most recent stores
               $today=time();
              for($i=0;$i<$count;$i++)
              {
                $mostRecent[]=$today;
                $mostRecentID[]="-1";
              }
              //find stores in order
              if($storeID>0)
              {
                if(($file=fopen("../Data/products.csv","r"))!=false){//open file
                    $headingRead=false;
                    while(($data=fgetcsv($file,1000,","))!=false)//read file line by line
                    {
                    if($headingRead==true)//ignore title
                    {
                        $tempID=(int)$data[4];
                        if($storeID===$tempID)//only save the products belong to this shop
                        {
                            $curDate=strtotime($data[3]);
                            $curId=strval($data[0]);
                            //check with 10 most recent
                            $value=DateCheck($curDate,$mostRecent,$curId,$mostRecentID,1);
                            $mostRecent=$value['date'];
                            $mostRecentID=$value['id'];
                        }
                    }
                        $headingRead=true;
                    }
                    fclose($file);
                }
                //display most recent id
                //  for($i =0;$i<count($mostRecentID);$i++)
                // {
                //     echo"-".$mostRecentID[$i]."-".date('Y-m-d H:i:s', $mostRecent[$i])."<br>";
                // }
                //Unnecessary-----------------------------------
                //display different products and logo 
                $productPath="../Image/NewProducts/";
                $products=array("DanMachi_3.jpg","Yourname.jpg","Dumbell.jpg","gun.jpg","hipplush1.jpg","jam.jpg","RichDadPoorDad.jpg","Shoes.jpg","Shoes2.jpg","pink.jpg");
                $running=0;
                //place to start
                $whereToStart=((int)$pageID-1)*$storePerPage;
                
                $whereToStop=$whereToStart+$storePerPage;
                //read file again to extract data for boxes
                for($i=$whereToStart;$i<$whereToStop;$i++)//loop through products id that is in order
                {
                  if($i>=count($mostRecentID))
                  {
                    break;
                  }
                  foreach($productsList as $data)//loop through products in no order
                  {
                    if($mostRecentID[$i]==$data[0])
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
                      $date=date('Y-m-d H:i:s', $mostRecent[$i]);
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
                                  <div class="addedTime">
                                  <span>'.$date.'</span>
                                  </div>
                                  <div class="HoverEffect">
                                  <a href='.$link.'>
                                      <div class="HoverButton">Check</div>
                                      </a>
                                  </div>
                              </div>
                              ';
                      //<!--End Box/!-->
                      break;
                    }
                      //if not run Id is failed 

                  }
                }       
              }
              echo'</div>';
            }
          }
        ?><!--the real display-->
     </div>

    </div>
  </div>
  <!--Cookies-->
<div class="cookiesBar" id="cookies">
  <img src="../Image/FreeCookies.jpg" alt="cookies Logo">
  <span>We use cookies in this website to give you the best experience on our site and show relevant ads. To find out more, read <a href="PrivacyPolicy.php">privacy plicy</a> and <a href="">cookie Policy</a></span>
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