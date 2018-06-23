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

    $sql = "SELECT * FROM `medias`
    JOIN authors ON authors.PK_author_id = medias.FK_author_id
    JOIN publishers ON publishers.PK_publisher_id = medias.FK_publisher_id
    WHERE PK_isbn =".$id;
    
    $result = mysqli_query($conn, $sql);
    
    $media = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_close($conn);

?>
<style>
    body {
    background: linear-gradient( rgba(242, 177, 129,0), rgba(242, 177, 129,1));
}
</style>

<div class="container" style="padding: 30px 0 255px 0;">
    <div class="row">
        <div class="image col-lg-4">
            <img width="100%" src="<?php echo $media["image"] ?>" alt="">
        </div>
        <div class="description col-lg-8">
            <p><strong>Title: </strong><?php echo $media["title"] ?></p>
            <p><strong>Author: </strong><?php echo $media["first_name"]." ".$media["last_name"]; ?></p>
            <p><strong>Publisher: </strong><a href="publishers.php?id=<?php echo $media["FK_publisher_id"]?>">
                    <?php echo $media["name"] ?>
             </a></p>
            <p><strong>Type: </strong><?php echo $media["type"] ?></p>
            <p><strong>Publish date: </strong> 
            <?php
            $date = strtotime($media["publish_date"]);
            echo date('Y', $date)
            ?>
            </p>
            <p style="font-style: italic;"><?php echo $media["short_desc"] ?></p>
            <?php if ($media["status"]) { ?>
                <h2><span class="badge badge-secondary">Reserved</span></h2>
            <?php } else { ?>
                <h2><span class="badge badge-success">Available</span></h2>
            <?php } ?>
        </div>
    </div>
    
</div>
<?php include('footer.php'); ?>