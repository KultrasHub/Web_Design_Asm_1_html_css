<?php 
    if(isset($_POST['submit']))
    {
        $content=$_POST['textAreaTOS'];
        $path="../Uploads/TermOfUse/TermOfUse.txt";
        file_put_contents($path,$content);
        header("Location:DashBoard.php");
    }

?>