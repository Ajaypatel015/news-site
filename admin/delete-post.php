<?php

    include "./config.php";

    if($_SESSION["user_role"] == "Normal"){

        header("location: {$hostname}/admin/post.php");

    }

    $cat_id = $_GET["id"];

    $sql = "DELETE FROM `post` WHERE post_id ='$post_id'";

    if(mysqli_query($conn,$sql)){

        header("location: {$hostname}/admin/post.php");

    }

    mysqli_close($conn);

?>