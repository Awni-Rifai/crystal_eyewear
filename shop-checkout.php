<?php
require_once  "includes/db.php";
require_once  "includes/functions.php";
$SESSION_TIMEOUT_MINUTES  =15;//minutes
$EMPTY_BASKET_TIME        =30;//minutes

session_timeout($SESSION_TIMEOUT_MINUTES,$EMPTY_BASKET_TIME);
$cart_after_shopping="";
if(isset($_SESSION["shopping_cart"])):
$i=count($_SESSION["shopping_cart"] );
endif;
$check_login = $_SESSION['user_loggedin'] ?? null;
$check_cart  =$_SESSION['shopping_cart']  ?? null;

include("./includes/public-header.php");

?>
    <main class="main-content">
        <!--== Start Page Header Area Wrapper ==-->
        <div class="page-header-area" data-bg-img="assets/img/photos/bg3.webp">
            <div class="container pt--0 pb--0">
                <div class="row">
                    <div class="col-12">
                        <div class="page-header-content">
                            <h2 class="title" data-aos="fade-down" data-aos-duration="1000">Checkout</h2>
                            <nav class="breadcrumb-area" data-aos="fade-down" data-aos-duration="1200">
                                <ul class="breadcrumb">
                                    <li><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-sep">//</li>
                                    <li>Checkout</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--== End Page Header Area Wrapper ==-->

        <!--== Start Shopping Checkout Area Wrapper ==-->

        <section class="shopping-checkout-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="checkout-page-login-wrap">
                            <!--== Start Checkout Login Accordion ==-->

                            <?php if (!$check_login && isset($_SESSION["shopping_cart"])): ?>
                                <div class="login-accordion" id="LoginAccordion">
                                    <div class="card">
                                        <h3>
                                            <i class="fa fa-info-circle"></i>
                                            you need to log in before placing order

                                        </h3>

                                        <div class="card-body">
                                            <div class="login-wrap">
                                                <p>If you have shopped with us before, please enter your details below.
                                                    If you are a new customer, please proceed to the Billing & Shipping
                                                    section.</p>
                                                <form action="includes/logic.php" method="post">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="logEmail">Username or email <span
                                                                            class="required">*</span></label>
                                                                <input id="logEmail" class="form-control"
                                                                       name="username" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group left-m">
                                                                <label for="logPass">Password <span
                                                                            class="required">*</span></label>
                                                                <input id="logPass" class="form-control" type="password"
                                                                       name="password">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group mt-30">
                                                                <button name="checkout_login" class="btn-login">Login
                                                                </button>
                                                                <div class="rememberme-account">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                               class="custom-control-input visually-hidden"
                                                                               id="remembermePass">
                                                                        <label class="custom-control-label"
                                                                               for="remembermePass">Remember me</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-6"><a class="lost-password"
                                                                                          href="#">Lost your
                                                                            password?</a></div>
                                                                    <div class="col-6"><a href="account-register.php"
                                                                                          class="lost-password"
                                                                                          href="#">sign up</a></div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            <?php endif; ?>
                            <!--== End Checkout Login Accordion ==-->

            </div>
          </div>
        </div>
                <?php if(!$check_cart): ?>
                    <div class="alert alert-danger" role="alert">
                      Your Shopping cart is empty please fill it and come back!
                    </div>
                    <a href="shop.php" class="d-block w-25 btn btn-outline-danger m-auto">GO back to the shop</a>
                <?php endif; ?>
          <?php if($check_login && $check_cart): ?>
        <div class="row">
          <div class="col-lg-6">
            <!--== Start Billing Accordion ==-->
            <div class="checkout-billing-details-wrap">
              <h2 class="title">Billing details</h2>
              <span class="username fs-4" >Hello <b class="h3"> <?php echo strtoupper($_SESSION['user_name']) ?></b></span>

              <div class="billing-form-wrap">

                  <form class="checkout_form" action="includes/logic.php" method="post">
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label for="phone">Phone</label>
                                  <input id="phone" type="tel" name="phone"  class="form-control">
                                  <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']?>">
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label for="country">Country</label>
                                  <input id="country" name="country" type="text"  class="form-control">
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label for="city">City</label>
                                  <input id="city" name="city" type="text"  class="form-control">
                              </div>
                          </div>

                          <div class="col-md-12">
                              <div class="form-group">
                                  <label for="address_line">Address line</label>
                                  <input id="address_line" name="address_line" type="text"  class="form-control">
                              </div>
                          </div>

                      </div>

              </div>
            </div>
              <!--== End Billing Accordion ==-->
          </div>
            <div class="col-lg-6">
                <!--== Start Order Details Accordion ==-->
                <div class="checkout-order-details-wrap">
                    <div class="order-details-table-wrap table-responsive">
                        <h2 class="title mb-25">Your order</h2>
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="product-name">Product</th>
                                <th class="product-total">Total</th>
                            </tr>
                            </thead>
                            <tbody class="table-body">
                            <?php
                            $order_total=0;
                            foreach ($_SESSION['shopping_cart'] as $product):
                                $order_total+=$product['product_sale_price']??$product['product_price'];
                                ?>
                                <tr class="cart-item">
                                    <td class="product-name"><?php echo $product['product_name'] ?> <span class="product-quantity">× 1</span></td>
                                    <td class="product-total">$<?php echo $product['product_sale_price']??$product['product_price'] ?></td>
                                </tr>
                            <?php endforeach;
                            $_SESSION['order_total']=$order_total;
                            ?>

                            </tbody>
                            <tfoot class="table-foot">
                            <tr class="order-total">
                                <th>Total </th>
                                <td>$<?php echo $order_total ?></td>
                            </tr>
                            </tfoot>
                        </table>
                        <div class="shop-payment-method">
                            <div id="PaymentMethodAccordion">
                                <div class="card">
                                    <div class="card-header" id="check_payments3">
                                        <h5 class="title" data-bs-toggle="collapse" data-bs-target="#itemThree" aria-controls="itemTwo" aria-expanded="false">Cash on delivery</h5>
                                    </div>
                                    <div id="itemThree" class="collapse" aria-labelledby="check_payments3" data-bs-parent="#PaymentMethodAccordion">
                                        <div class="card-body">
                                            <p>Pay with cash upon delivery.</p>
                                        </div>
                                        <!--== End Billing Accordion ==-->
                                    </div>
                                </div>

                                <button type="submit" name="submit_order" class="btn-theme">Place order</button>
                            </div>
                  </form>

            </div>
        </section>
        <?php endif; ?>
        <!--== End Shopping Checkout Area Wrapper ==-->
    </main>
<?php
include("includes/public-footer.php");
?>