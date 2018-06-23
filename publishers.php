<?php include('config.php');
session_start();
 ?>
<?php include_once('head.php'); ?>
<?php include_once('navbar.php'); ?>
<?php 
    if( !isset($_SESSION['user']) ) {
        header("Location: index.php");
        exit;
       }
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "SELECT * FROM `publishers`
    JOIN medias ON medias.FK_publisher_id = publishers.PK_publisher_id
    JOIN authors ON authors.PK_author_id = medias.FK_author_id
    WHERE medias.FK_publisher_id =".$id;

    $result = mysqli_query($conn, $sql);
    $publisher = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($conn);

?>
<style>
    body {
    background: linear-gradient( rgba(242, 177, 129,0), rgba(242, 177, 129,1));
}
</style>

<h2 class="text-center"><?php 
$arr = $publisher[0]; 
echo $arr['name'];
?></h2>


<div class="container" style="padding: 30px 0 255px 0;">
<div class="row">
    <?php foreach ($publisher as $key => $value) { ?>
    <div class="card col-lg-3">
        <img class="card-img-top" src="<?php echo $value["image"]; ?>" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title"><?php echo $value["title"]; ?></h5>
            <p class="card-text">Author: <?php echo $value["first_name"]." ".$value["last_name"]; ?></p>
            <a href="learnmore.php?id=<?php echo $value["PK_isbn"]?>"class="btn btn-warning btn-sm learn-more">Learn more</a>
        </div>
    </div>
    <?php } ?>
</div> 
    
    
</div>




<?php include('footer.php'); ?>

