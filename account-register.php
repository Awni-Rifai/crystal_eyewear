
<?php require_once "includes/public-header.php"?>
  <!--== End Header Wrapper ==-->
  <main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area" data-bg-img="assets/img/photos/bg3.webp">
      <div class="container pt--0 pb--0">
        <div class="row">
          <div class="col-12">
            <div class="page-header-content">
              <h2 class="title" data-aos="fade-down" data-aos-duration="1000">Register</h2>
              <nav class="breadcrumb-area" data-aos="fade-down" data-aos-duration="1200">
                <ul class="breadcrumb">
                  <li><a href="index.php">Home</a></li>
                  <li class="breadcrumb-sep">//</li>
                  <li>Register</li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start My Account Area Wrapper ==-->
    <section class="account-area">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 m-auto">
            <div class="section-title text-center">
              <h2 class="title">Register</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="register-form-content">
              <form action="includes/logic.php" method="post" class="signup_form">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label for="username">name <span class="required">*</span></label>
                      <input id="username" class="form-control" name="username" type="text">
                        <?php if(isset($_GET["username"])):?>
                        <span class="text-danger"><?php echo $_GET["username"]; ?></span>
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
                      <button class="btn-register" type="submit" name="register_submit">Register</button>
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
    include("./includes/public-footer.php");
?>
