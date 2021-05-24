<?php 
    if(isset($_POST['submit']))
    {
        $content=$_POST['textAreaPol'];
        $path="../Uploads/PrivacyPolicy/PrivacyPolicy.txt";
        file_put_contents($path,$content);
        header("Location:DashBoard.php");
    }

?>