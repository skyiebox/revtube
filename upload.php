<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include 'meta.php';?>      
</head>

  <body>
<?php include 'db.php';?>
    <?php include("header.php"); ?>
   <center> <div class="container-flex">
        <div class="col-2-3">
            <div class="card blue">
                            <br>
            <br>
            <br>
            <br>
                <h3>Upload Video</h3>
                <h3><i>Please check if you're logged in, if you're not, you need to sign in to upload videos.</i></h3>
                <small>This will be fixed in a later update.</small>
                <br>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="input-group">
                       <!-- <label for="videofile">File </label>-->
                        <input type="file" name="fileToUpload" id="fileToUpload">
                    </div>
                     <br>
                    <div class="input-group">
                       <!-- <label for="videotitle">Title </label>-->
                        <input type="text" id="videotitle" placeholder="Title" name="videotitle">
                    </div>
                     <br>
                    <div class="input-group">
                 <!--       <label for="bio">Description </label> -->
                        <textarea style="background-color: var(--inputlol);" name="bio" placeholder="Enter a description for your video here" rows="4" cols="50" required="required"></textarea>
                    </div>
                    <div class="input-group">
                         <br>
                        <div></div>
                        <div><input type="submit" class="yt-button primary" value="Upload" name="submit"></div>
                    </div>
                </form>
            </div>
        </div>
    </div> </center>
    <?php
    if (isset($_POST['submit'])){
        if(!isset($_SESSION['profileuser3'])) {
            echo("Login to upload videos...");
        }
        $target_dir = "./videos/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        if(!is_dir($target_dir)){
            mkdir($target_dir);
        }
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (file_exists($target_file)) {
            echo "Video with the same filename already exists.";
            $uploadOk = 0;
        }
        if($imageFileType != "mp4") {
            echo "MP4 files only.";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            echo "unknown error.";
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $statement = $mysqli->prepare("INSERT INTO videos (videotitle, description, author, filename, date) VALUES (?, ?, ?, ?, now())");
                $statement->bind_param("ssss", $videotitle, $description, $author, $filename);
                $videotitle = htmlspecialchars($_POST['videotitle']);
                $description = str_replace(PHP_EOL, "<br>", htmlspecialchars($_POST['bio']));
                $author = htmlspecialchars($_SESSION['profileuser3']);
                $filename = basename($_FILES["fileToUpload"]["name"]);
                $statement->execute();
                $statement->close();
                header("Location: .");
            } else {
                echo "error!!!!!!!!!!!!!!!!!! error code: ";
                echo $_FILES["fileToUpload"]["error"];
            }
        }
    }
    ?>
    <hr>
    <?php include("footer.php") ?>
</body>
</html>
<?php $mysqli->close();?>