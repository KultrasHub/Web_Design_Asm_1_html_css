<?php
session_start();

//if empty infornmation//
if (isset($_POST["send"])) {
   
    $fname=strval($_POST["firstName"]);
    $lname=strval($_POST["lastName"]);
    $phoneNumber=strval($_POST["phoneNumber"]);
    $email=strval($_POST["email"]);
    $pass=strval($_POST["password"]);
    $cpass=strval($_POST["cpassword"]);
    $address=strval($_POST["address"]);
    $city=strval($_POST["city"]);
    $zip=$_POST["Zipcode"];

    $error=0;
    //check firstName
    if(strlen($fname)<3)
    {
        $error+=1;
        print("First name must consist of atleast 3 characters<br>");
    }
    //lastName
    if(strlen($lname)<3)
    {
        $error+=1;
        print("Last name must consist of atleast 3 characters<br>");
    }
    //phone Number
    if(strpos($phoneNumber,"--")==true)
    {
        $error+=1;
        print("You cannot have -- in your phone number<br>");
    }
    if(strpos($phoneNumber,"..")==true)
    {
        $error+=1;
        print("You cannot have .. in your phone number<br>");
    }
    $phoneLen=(int)count(array_filter(str_split($phoneNumber),'is_numeric'));
    if($phoneLen<9||$phoneLen>11)
    {
        $error+=1;
        print("There must be at least 9 digits and at most 11 digits in your phone Number, your phone Number has ".$phoneLen." digits!<br>");
    }
    //email check
    if(strpos($email,"@")!=true)
    {
        $error+=1;
        print("Email requires @<br>");
    }
    //password
    if(strlen($pass)<8||strlen($pass)>20)
    {
        $error+=1;
        print("There must be at least 8 digits and at most 20 digits in password<br>");
    }
    //retype pass check
    if($pass!==$cpass)
    {
        $error+=1;
        print("retype password does not match with password <br>");
    }
    //address
    if(strlen($address)<3)
    {
        $error+=1;
        print("at least 3 characters in address <br>");
    }
    //city
    if(strlen($city)<3)
    {
        $error+=1;
        print("at least 3 characters in city <br>");
    }
    //zip check
    $ziplen=(int)count(array_filter(str_split($zip),'is_numeric'));
    if($ziplen<4||$ziplen>6)
    {
        $error+=1;
        print("there must be 4 to 6 digits in zip code <br>");
    }
    //check unique
    //userInfo-id-fname-lname-email-phone-address-city-zip-ImagePath
    if(file_exists("../userinfo.csv"))
    {
    if(($file=fopen("../userinfo.csv","r"))!=false)
    {
      while(($data=fgetcsv($file,1000,","))!=false)
      {
        $curEmail=strval($data[3]);
        $curPhone=strval($data[4]);
        if($email===$curEmail)
        {
            $error+=1;
            print("this email has been used <br>");
            if($phoneNumber===$curPhone)
            {
                $error+=1;
                print("this phone number has been used <br>");
                break;
            }
        }
        else{
            if($phoneNumber===$curPhone)
            {
                $error+=1;
                print("this phone number has been used <br>");
                break;
            }
        }
      }
      fclose($file);
    }    
    } 
    //Start Register Processs
    //login information is saved outside the root folder
    //personal information is saved directly in root folder
    if ($error === 0) {
        
        // $file_open = fopen("userinfor.csv") or die("Can't open file");
        // $delimiter = ',';
        $no_row=1;
        //add row
        if(file_exists("../userinfo.csv"))
        {
        $fileCount=file("../userinfo.csv");
        $no_row=count($fileCount);
        }
        //create Image Link
        $imgPath="../Uploads/UserAvatar/".$no_row.".png";
        //user png extension For now

        $file = fopen("../userinfo.csv","a+");
        $handle = file('../userinfo.csv');
        //check if file is empty to add title
        if (empty($handle)) {
          $fields=array('id','FirstName','LastName','Email','PhoneNumber','address','city','zip','Avatar');
          fputcsv($file, $fields);
        }
        $content = array(
            $no_row,$fname,$lname,$email,$phoneNumber,$address,$city,$zip,$imgPath
        );
        //add info
        fputcsv($file, $content);
        fclose($file);
        //create login information
        $loginFile=fopen("../../contacts.csv","a+");
        //hash password
        $hashedPass=password_hash($pass,PASSWORD_DEFAULT);
        //Login conten:email,hashed password and isAdmin
        $loginContent=array($email,$hashedPass,"FALSE",$no_row);
        fputcsv($loginFile,$loginContent);
        fclose($loginFile);
        print("Register Succeessfully!");
        header('Location: Register_Image.php?userID='.$no_row);
    }
    else{
        print("Register Failed!, pls try again");
    }
}
?>