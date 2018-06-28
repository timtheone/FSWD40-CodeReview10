<nav class="navbar navbar-expand-lg navbar-light bg-transparent">
  <a class="navbar-brand" href="<?php echo ROOT_URL."index.php" ; ?>">The Big Library</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav ml-auto">
      <?php if(isset($_SESSION['user'])!="") { ?>
      <a class="nav-item nav-link" href="logout.php?logout">Sign out</a>
      <a class="nav-item nav-link" href="<?php echo "home.php" ; ?>">Home</a>
      <?php } ?>
    </div>
  </div>
</nav>