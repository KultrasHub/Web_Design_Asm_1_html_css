<?php 

    if(isset($_POST["submitBut"]))
    {
        $targetdir="../Uploads/AboutUs/";
        $targetname="kultras";
        if(isset($_FILES['KhoaUpload']))
        {
        $file=$_FILES['KhoaUpload'];
        $fileName=$_FILES['KhoaUpload']['name'];
        echo"fileName",$fileName;
        $fileTmp=$_FILES['KhoaUpload']['tmp_name'];
        $fileExt=strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
        $totalName=$targetdir.$targetname.".".$fileExt;
        echo"total Name:",$totalName;
        //no conditionn for now
        move_uploaded_file($fileTmp,$totalName);
        }
        $targetname="kent";
        if(isset($_FILES['KentUpload']))
        {
        $file=$_FILES['KentUpload'];
        $fileName=$_FILES['KentUpload']['name'];
        echo"fileName",$fileName;
        $fileTmp=$_FILES['KentUpload']['tmp_name'];
        $fileExt=strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
        $totalName=$targetdir.$targetname.".".$fileExt;
        echo"total Name:",$totalName;
        //no conditionn for now
        move_uploaded_file($fileTmp,$totalName);
        }
        $targetname="phong";
        if(isset($_FILES['PhongUpload']))
        {
        $file=$_FILES['PhongUpload'];
        $fileName=$_FILES['PhongUpload']['name'];
        echo"fileName",$fileName;
        $fileTmp=$_FILES['PhongUpload']['tmp_name'];
        $fileExt=strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
        $totalName=$targetdir.$targetname.".".$fileExt;
        echo"total Name:",$totalName;
        //no conditionn for now
        move_uploaded_file($fileTmp,$totalName);
        }
        header("Location:DashBoard.php");
    }
?>