<?php include('config.php');
session_start();
 ?>
<?php include_once('head.php'); ?>
<?php include_once('navbar.php'); ?>
<?php
ob_start();
if( !isset($_SESSION['user']) ) {
 header("Location: index.php");
 exit;
}
$res=mysqli_query($conn, "SELECT * FROM users WHERE `PK_user_id`=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
ob_end_flush();
?>
<style>
    body {
    background: linear-gradient( rgba(242, 177, 129,1), rgba(242, 177, 129,0));
}
</style>

<?php 
$sql = "SELECT * FROM `medias`
JOIN authors ON authors.PK_author_id = medias.FK_author_id
JOIN publishers ON publishers.PK_publisher_id = medias.FK_publisher_id";
$result = mysqli_query($conn, $sql);
$medias = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);
?>
<h2 class="text-center">Welcome <?php echo $userRow['first_name'] ?></h2>

<div class="container">
<div class="card-columns">
<?php 
foreach ($medias as $key => $value) { ?>
  <div class="card">
    <img class="card-img-top preview-img" src="<?php echo $value["image"] ?>" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"><?php echo $value["title"] ?></h5>
      <p class="card-text">
          <?php if ($value["type"]=='book' || $value["type"]=='cd') { ?>
            <strong>Author:</strong> 
          <?php } else { ?>
            <strong>Director:</strong>
          <?php } ?>
          <?php echo $value["first_name"]." ".$value["last_name"] ?></p>
          <p class="card-text"><strong>Publish year: </strong><?php 
          $date = strtotime($value["publish_date"]);
          echo date('Y', $date)
          ?></p>
          <a href="learnmore.php?id=<?php echo $value["PK_isbn"]?>"class="btn btn-warning btn-sm learn-more">Learn more</a>
    </div>
  </div>
<?php } ?>
</div>
</div>

<?php include('footer.php'); ?>