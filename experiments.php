<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include './assets/mod/meta.php';?>      
</head>

  <body>
<?php include './assets/mod/db.php';?>
<?php include './assets/mod/header.php';?>
    <div class="container">
 <div class="content">
        <div class="page-header">
        <?php include './assets/mod/alert.php';?>
          <h1>Experiments <small>Try out new (BETA) features</small></h1>
        </div>
        <div class="row">
          <div class="span10">
<!--
fluent ui was moved into site style settings :3
<div>
    <h3>Experiment #1 - Fluent UI</h3>
    <p>Makes the 2013 YouTube esque UI look more like the UI found in Windows 11. 
    <form action="" method="POST">
    <?php 
   /*if ($_SESSION["fluentUIenabled"] = "false") {
        echo '<input class="yt-button" name="enabledfluent" type="submit" value="ENABLE">';
   } 
   if ($_SESSION["fluentUIenabled"] = "true") {
    echo '<input class="yt-button" name="disablefluent" type="submit" value="DISABLE">';
   }*/
   ?>
    </form>
</div>-->
<h3>There are no public experiments at the moment. Check back later!</h3>
</div>
    </div> <!-- /container -->
    <?php include './assets/mod/footer.php'; ?>
  </body>
</html>

<script>
     if (localStorage.getItem("fluentUIenabled") !== "true") {
    localStorage.setItem("fluentUIenabled", "false");
     }
</script>