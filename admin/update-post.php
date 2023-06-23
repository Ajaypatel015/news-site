<?php include "header.php";

if($_SESSION["user_role"] == "Normal"){

    header("location: {$hostname}/admin/post.php");

}

if (isset($_POST['submit'])) {

    include "config.php";

    $post_id = mysqli_real_escape_string($conn, $_POST['post_id']);
    $post_title = mysqli_real_escape_string($conn, $_POST['title']);
    $postdesc = mysqli_real_escape_string($conn, $_POST['description']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $oldimage = mysqli_real_escape_string($conn, $_POST['post_img']);

    $sql = "UPDATE `post` SET  `title`='$post_title',`description`='$postdesc',`category`='$category',`post_img`='$fileToUpload' WHERE `post_id`='$oldimage'";
    $result = mysqli_query($conn, $sql) or die("Query Failed....");


      
        if ($result) {

            header("location: {$hostname}/admin/users.php");
        }

    }

?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
    <?php

        include "config.php";

        $user_id = $_GET['id'];

        $sql = " SELECT * FROM post WHERE `post_id`='$user_id' ";
        $result = mysqli_query($conn, $sql) or die("Query Failed...");

        if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {


?>
        <!-- Form for show edit-->
        <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
                <input type="hidden" name="post_id"  class="form-control" value="1" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputTile">Title</label>
                <input type="text" name="post_title"  class="form-control" id="exampleInputUsername" value="<?php echo $row['title']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> Description</label>
                <input type="text" name="postdesc" class="form-control" value="<?php echo $row['description']; ?>" >
            </div>
            <div class="form-group">
                <label for="exampleInputCategory">Category</label>
                <select class="form-control"  name="category">
                <?php

                    include "config.php";
                    $sql = "SELECT * FROM `category`";
                    $result = mysqli_query($conn, $sql) or die("Query Failed....");
    

                    if (mysqli_num_rows($result) > 0) {

                        while($row1 = mysqli_fetch_assoc($result)){

                            ?>

                             <option value="<?php echo $row1['category_id']?>"><?php echo $row1['category_name']; ?></option>;
                        
                            <?php

                        }

                    }

?>
                    
                </select>
            </div>
            <div class="form-group">
                <label for="">Post image</label>
                <input type="file" name="new-image">
                <img  src="upload/post_1.jpg" height="150px">
                <input type="hidden" name="oldimage" value="">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>

        <?php

                }
            }

        ?>
        <script>
                    var sub = document.getElementById("sub");
                    sub.value = "<?php echo $row['subject'] ?>";
                </script>
        <!-- Form End -->
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
