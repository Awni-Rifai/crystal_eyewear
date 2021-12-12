<?php
session_start();
require_once "includes/db.php";
$statement=$connection->prepare('SELECT order_id FROM order_summary ORDER BY order_id DESC LIMIT 1');
$statement->execute();
$order_id=$statement->fetch(PDO::FETCH_ASSOC);

    include("./includes/public-header.php");
?>
  <main class="main-content">
    <!--== Start Faq Area Wrapper ==-->
    <section class="page-not-found-area">
      <div class="container pt--0 pb--0">
        <div class="row justify-content-center">
          <div class="col-lg-8 col-xl-6">
            <div class="page-not-found-wrap">
              <div class="page-not-found-content">
                <h3 class="not-found-text" data-aos="fade-down" data-aos-duration="1000">THANK YOU</h3>
                <h3 class="title" data-aos="fade-down" data-aos-duration="1200">Your order was completed successfully!</h3>
                  <h4>Your order id is <span class="text-danger"><?php echo $order_id['order_id']?></span></h4>
                  <p class="d-block">you can see your order details <a href="<?php echo "account.php?order_id={$order_id['order_id']}" ?>">here</a></p>
                <a class="btn-theme-border" href="index.php" data-aos="fade-down" data-aos-duration="1600">Back to home</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Faq Area Wrapper ==-->
  </main>
<?php
    include("./includes/public-footer.php");
?>