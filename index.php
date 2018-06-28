<?php include('config.php'); ?>
<?php include('registration.php'); ?>
<?php include('login.php'); ?>
<?php include_once('head.php'); ?>
<?php include_once('navbar.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<script> 
function alertsuccess(){
        swal(
          'Success!',
          'Thank you for joining us!',
          'success'
        )
      }

function alerterror(){
        swal(
          'Error!',
          'Something went wrong, try again!',
          'error'
        )
      }      
</script>
<div class="jumbotron jumbotron-fluid banner">
    <div class="container">
        <div class="row">
            <div class="header-text offset-lg-7">
                <h1 class="display-3">The Big Library</h1>
                <p class="lead">We've always had the biggest selection of <strong>Books</strong> and other media.</p>
                <h5><strong>Now online.</strong></h5> 
            </div>
        </div>
    </div>
</div>



<div class="container-fluid main-content">
<?php if ( isset($alert) ) { 
    echo "<script> alertsuccess(); </script>";
} ?>

<?php if (isset($alert2)) {
    echo "<script> alerterror(); </script>";
} ?>
    <div class="row">
        <?php if(isset($_SESSION['user'])=="") { ?>
        <div id="flipping" class="col-lg-12">
        <!-- Login form -->
        <div class="login-form col-lg-2 offset-lg-2 front">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <h4 class="text-center" style="padding-bottom: 85px;">Sign in</h4>
                <?php if ( isset($errMSGG) ) { ?>
                    <div class="alert alert-<?php echo $errTyp ?>"><?php echo $errMSGG; ?></div>
                <?php } ?>
                <div class="form-group">
                    <label for="user_name_sign_in">user name</label>
                    <input type="text" class="form-control" name="user_name_sign_in" placeholder="johndoe64">            
                </div>
                <div class="form-group">
                    <label for="email_sign_in">email</label>
                    <input type="email" class="form-control" name="email_sign_in" placeholder="john@doe.com">            
                </div>
                <div class="form-group">
                    <label for="pass_sign_in">password</label>
                    <input type="password" class="form-control" name="pass_sign_in" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-warning" name="signin-submit">Sign in</button>
                <p id="sign-up">Dont have an account yet? click <strong><span id="sign-up-button">here</span></strong> to join us!</p>
            </form>
        </div>
        <!-- Register form -->
        <div class="login-form col-lg-2 offset-lg-2 back">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <h4 class="text-center" style="padding-bottom: 25px;">Sign up</h4>

                <?php if ( isset($errMSG) ) { ?>
                    <div class="alert alert-<?php echo $errTyp ?>"><?php echo $errMSG; ?></div>
                <?php } ?>

                <div class="form-group">
                    <label for="user_name_sign_up">user name</label>
                    <input type="text" class="form-control" name="user_name_sign_up" placeholder="johndoe64">
                    <span class="text-danger"><?php echo $user_name_sign_upError; ?></span>            
                </div>
                <div class="form-group">
                    <label for="first_name_sign_up">first name</label>
                    <input type="text" class="form-control" name="first_name_sign_up" placeholder="John">
                    <span class="text-danger"><?php echo $first_name_sign_upError; ?></span>            
                </div>
                <div class="form-group">
                    <label for="last_name_sign_up">last name</label>
                    <input type="text" class="form-control" name="last_name_sign_up" placeholder="Doe">
                    <span class="text-danger"><?php echo $last_name_sign_upError; ?></span>            
                </div>
                <div class="form-group">
                    <label for="email_sign_up">email</label>
                    <input type="email" class="form-control" name="email_sign_up" placeholder="john@doe.com">
                    <span class="text-danger"><?php echo $email_sign_upError; ?></span>            
                </div>
                <div class="form-group">
                    <label for="pass_sign_up">password</label>
                    <input type="password" class="form-control" name="pass_sign_up" placeholder="Password">
                    <span class="text-danger"><?php echo $pass_sign_upError; ?></span>
                </div>
                <button type="submit" class="btn btn-warning" name="signup-submit">Sign up</button>
                <p id="sign-up">Already have an account? click <strong><span id="sign-in-button">here</span></strong> to Sign in!</p>
            </form>
        </div>
        </div>
        <?php } ?>
        <?php if(isset($_SESSION['user'])!="") { ?>
            <a id="explore" class="btn btn-new btn--border btn--primary btn--animated col-lg-2 offset-lg-2 col-md-3 offset-md-3" href="<?php echo "home.php" ; ?>">Explore the library</a>
        <?php } ?>
    </div>
</div>


<?php include('footer.php'); ?>