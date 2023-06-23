<?php

    include "config.php";

    if($_SESSION["user_role"] == "Normal"){

        header("location: {$hostname}/admin/post.php");

    }

    $user_id =$_GET['id'];

    $query="DELETE FROM `user` WHERE  user_id=$user_id";
       $result=mysqli_query($conn,$query);

    if($result){    

        echo " <scrpit>alert ('Data Is Delete')</scrpit>";
        header("location: {$hostname}/admin/users.php");

    }else{

        echo " EORR.....";
    
    }


?>