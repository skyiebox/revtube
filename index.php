<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include './assets/mod/meta.php';?>
    <?php include './assets/mod/db.php';?>
    <style>
      @media(max-width: 1357px) {
  .guide {
    display: none;
  }
  </style>
    </head>
    <?php include './assets/mod/guide.php';?>
  <body>
<?php include './assets/mod/header.php';?>
<!-- guide -->
    <div class="container">
 <div class="content">
        <div class="page-header">
          <?php
      if(empty($_GET["msg"])) {
        echo "<p style='display:none;'>no</p>";
      } else if($_GET["msg"] === " ") {
        echo "<p style='display:none;'>no</p>";
      } else { echo '
          <div class="alert-message success">
        <p>'.$_GET["msg"].'</p>
      </div>';
    }
          ?>
            <?php include './assets/mod/alert.php'?>
          <h1>Uploads <small><div id="clockbox"></div></small></h1>
          <?php include './assets/mod/todaysdate.php'; ?>
        </div>
        
        <div class="row">
        <?php //include './assets/mod/guide.php';?>
          <div class="span10">
          <?php if (!isset($_SESSION['profileuser3'])) {
            echo '
          <div class="yt-alert yt-alert-promo yt-rounded "><div class="yt-alert-content">        <div id="signup-promo-message">Join the smallest worldwide video-sharing community!</div>
  <div id="signup-promo-links">
    <button href="/signup?feature=idx_promo_std&amp;next=" type="button" class=" yt-uix-button" role="button" aria-pressed="false" fdprocessedid="mkys6"><span class="yt-uix-button-content">Create Account ›</span></button>
    <span id="signup-promo-have-account">Already have an account? </span>
    <a href="http://web.archive.org/web/20110506011631/https://www.google.com/accounts/ServiceLogin?uilel=3&amp;service=youtube&amp;passive=true&amp;continue=http%3A%2F%2Fwww.youtube.com%2Fsignin%3Faction_handle_signin%3Dtrue%26nomobiletemp%3D1%26hl%3Den_US%26next%3D%252F&amp;hl=en_US&amp;ltmpl=sso">Sign In</a>
  </div>
</div></div>';}?>
          <!-- <h3>Featured Videos</h3>
            <div class="featured-videos container-flex">
                <?php
                    $statement = $mysqli->prepare("SELECT * FROM videos WHERE featured = TRUE LIMIT 5"); //sexy variable names
                    //$statement->bind_param("s", $_POST['fr']);
                    $statement->execute();
                    $result = $statement->get_result();
                    $howmany = 0;
                    if($result->num_rows !== 0){
                        while($row = $result->fetch_assoc()) {
                            echo '
                            <div class="featured-video col-generic">
                                <div class="video-thumbnail">
                                    <a href="watch?v=' . $row['vid'] . '">
                                    <img src="content/thumb/' . $row['thumb'] . '">
                                    </a>
                                </div>
                                <div class="featured-video-info">
                                    <div class="video-title"><a href="/watch?v='.$row['vid'].'">'.$row['videotitle'].'</a></div>
                                    <div class="video-author"><a href="/profile?id='.$row['author'].'">'.$row['author'].'</a></div>
                                </div>
                            </div>';
                            $howmany++;
                        }
                        if($howmany !== 4){
                            for($i = 4-$howmany; $i > 3; $i++){
                                echo("the j");
                            }
                        }
                    }
                    else{
                        echo "It seems there are no videos here. Perhaps one of your videos could be here?";
                    }
                ?>
            </div>
            <br>
            <br> -->
            <h2>Latest Uploads</h2>
            <?php
                    $statement = $mysqli->prepare("SELECT * FROM videos ORDER BY date DESC LIMIT 8");
                //$statement->bind_param("s", $_POST['fr']); i have no idea what this is but we don't need it
                $statement->execute();
                $result = $statement->get_result();
                if($result->num_rows !== 0){
                  include("assets/lib/profile.php");
                    while($row = $result->fetch_assoc()) {
                      $likec = getLikes($row['vid'], $mysqli);
    $dislikec = getDislikes($row['vid'], $mysqli);
    $views = getViews($row['vid'], $mysqli); 
                        echo '
                            <div class="video container-flex">
                                <div class="col-1-3 video-thumbnail">
                                <a href="watch?v='.$row['vid'].'">
                                <img height="70px" width="120px" src="content/thumb/' . $row['thumb'] . '">
                                </a>
                                </div>
                                <div class="col-1-3 video-title"><a href="watch.php?v='.$row['vid'].'"><b>'.$row['videotitle'].'</b></a></div>
                                <div class="col-1-3 video-info">
                                    <div><a href="profile.php?user='.$row['author'].'">'.$row['author'].'</a></div>
                                    <div>'.$views.' views &bull; <i class="bi bi-hand-thumbs-up-fill"></i> '.$likec.' <i class="bi bi-hand-thumbs-down-fill"></i> '.$dislikec.'</div>
                                </div>
                            </div>
                            <hr class="indexdivider">';
                    }
                }
                else{
                    echo "There are no videos uploaded to this instance.";
                }
                $statement->close();
            ?>
            <ul class="unstyled">

            </ul>
          </div>
          <div class="span4">
            <?php include './assets/mod/whatsnew.php'; ?>
            <!--<input class="input" type="text" placeholder="Username">
            <br>
            <input class="input" type="password" placeholder="Password">
            <br>
            <button class="btn" type="submit">login</button>-->
          </div>
        </div>
      </div>

    </div> <!-- /container -->
    <?php include './assets/mod/footer.php'; ?>
  </body>
</html>