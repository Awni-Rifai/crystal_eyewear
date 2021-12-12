
<?php require_once "includes/public-header.php";
?>
  <!--== End Header Wrapper ==-->
  <main class="main-content">
    <!--== Start My Account Area Wrapper ==-->
    <section class="account-area">
      <div class="container" style="padding-top:0px">
        <div class="row" style="height:150px" >
          <div class="col-sm-8 m-auto">
            <div class="section-title text-center">
              <h2 class="title">Register</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="register-form-content" style="max-width: 800px">
              <form action="includes/logic.php" method="post" class="signup_form">
                <div class="row">
                  <div class="col-12 col-sm-6 ">
                    <div class="form-group">

                      <label for="username">Username <span class="required">*</span></label>

                      <input id="username" class="form-control" name="username" type="text">

                        <?php if(isset($_GET["username"])):?>
                        <span class="text-danger"><?php echo $_GET["username"]; ?></span>
                        <?php endif; ?>
                    </div>
                  </div>
                    <div class="col-12 col-sm-6 ">
                    <div class="form-group m-0">
                      <label for="full_name m-0 p-0">Name<span class="required">*</span></label>
                      <input id="full_name"  class="form-control" name="full_name" type="text">
                        <small class="form-text text-muted mx-4 d-block">Name Should consist of two parts </small>
                        <?php if(isset($_GET["full_name"])):?>
                        <span class="text-danger"><?php echo $_GET["full_name"]; ?></span>
                        <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label for="email">Email address <span class="required">*</span></label>
                      <input id="email" class="form-control" name="email" type="email">
                        <?php if(isset($_GET["email"])):?>
                            <span class="text-danger"><?php echo $_GET["email"]; ?></span>
                        <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label for="password">Password <span class="required">*</span></label>

                      <input id="password" class="form-control" name="password" type="password">
                        <small class="form-text text-muted mx-4 d-block">password should be 8 characters with uppercase,special character </small>
                        <?php if(isset($_GET["password"])):?>
                            <span class="text-danger"><?php echo $_GET["password"]; ?></span>
                        <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label for="password_confirmation">Confirm Password <span class="required">*</span></label>
                      <input id="password_confirmation" class="form-control" name="password_confirmation" type="password">
                                <?php if(isset($_GET["password_confirmation"])):?>
                                    <span class="text-danger"><?php echo $_GET["password_confirmation"]; ?></span>
                                <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group mb--0">
                      <button class="btn-register"  type="submit" name="register_submit">Register</button>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group  mt-4">
                     <span>If you have an account </span> <a class="lost-password" href="account-login.php">&nbsp;Login </a>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End My Account Area Wrapper ==-->
  </main>
<?php
    require_once("./includes/public-footer.php");
?>
