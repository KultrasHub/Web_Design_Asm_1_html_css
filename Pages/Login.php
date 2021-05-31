<?php 
if(isset($_GET['send']))
{
    $email=strval($_GET['emailUser']);
    $pass=$_GET['password'];
    if(file_exists("../userinfo.csv"))
    {
    if(($file=fopen("../../contacts.csv","r"))!=false)
    {
      while(($data=fgetcsv($file,1000,","))!=false)//email-password-IsAdmin
      {
        $curEmail=$data[0];
        if($email==$curEmail)//looking for the saved email
        {

        }
      }
      //no email found
      print("Wrong Email");
      fclose($file);
    }    
    } 

}
?>