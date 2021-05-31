<?php 
if(isset($_POST["ImageUploader"]))
{
    $targetDir="../Uploads/UserAvatar/";
    if(isset($_GET["userID"]))//generate link with 
    {
        $targetDir="../Uploads/UserAvatar/".$_GET['userID'].'.png';
        if(isset($_FILES['profile_photo']))
        {
            $file=$_FILES['profile_photo'];
            $fileName=$_FILES['profile_photo']['name'];
            $fileTmp=$_FILES['profile_photo']['tmp_name'];
            move_uploaded_file($fileTmp,$targetDir);
            print("successful");
            $link="Location:MyAccount-Login.php";
            if(isset($_GET["fromOrder"]))
            {
              if($_GET["fromOrder"]=="1")
              {
                //user has accessed this via order
                $link="Location:MyAccount-Login.php?fromOrder=1";
              }
            }
            header($link);
        }
        else{
            print("cant find photo");
        }
    }
    else{
    print("failed");;
    }
}
?>