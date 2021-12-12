<?php
require_once "includes/db.php";
require_once "includes/functions.php";
session_start();


$SESSION_TIMEOUT_MINUTES = 15;//minutes
$EMPTY_BASKET_TIME = 30;//minutes

session_timeout($SESSION_TIMEOUT_MINUTES, $EMPTY_BASKET_TIME);
$cart_after_shopping = "";
if (isset($_SESSION["shopping_cart"])):
    $i = count($_SESSION["shopping_cart"]);
endif;
$check_login = $_SESSION['user_loggedin'] ?? null;
$check_cart = $_SESSION['shopping_cart'] ?? null;

include("./includes/public-header.php");

?>
    <main class="main-content">
        <!--== Start Page Header Area Wrapper ==-->
        <div class="container">

            <div class="page-header-area">
                <div class=" pt--0 pb--0">
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

                                    <div class="card-body mb-5">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="login-form-content">
                                                    <form action="includes/logic.php" method="post"
                                                          class="checkout-form">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="username">Name or email address <span
                                                                                class="required">*</span></label>
                                                                    <input id="username" class="form-control"
                                                                           type="text" name="username"
                                                                           style="solid 1px #827e7e">
                                                                    <?php if (isset($_GET["username"])): ?>
                                                                        <span class="text-danger"><?php echo $_GET["username"]; ?></span>
                                                                    <?php endif; ?>
                                                                    <?php if (isset($_GET["email"])): ?>
                                                                        <span class="text-danger"><?php echo $_GET["email"]; ?></span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="password">Password <span
                                                                                class="required">*</span></label>
                                                                    <input id="password" name="password"
                                                                           class="form-control" type="password"
                                                                           style="solid 1px #827e7e">
                                                                    <?php if (isset($_GET["password"])): ?>
                                                                        <span class="text-danger"><?php echo $_GET["password"]; ?></span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <button class="btn-login" type="submit"
                                                                            name="checkout_login">Login
                                                                    </button>
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
                        <?php if (!$check_cart): ?>
                            <div class="alert alert-danger" role="alert">
                                Your Shopping cart is empty please fill it and come back!
                            </div>
                            <a href="shop.php" class="d-block w-25 my-5 btn btn-outline-danger m-auto">GO back to the
                                shop</a>
                        <?php endif; ?>
                        <?php if ($check_login && $check_cart): ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <!--== Start Billing Accordion ==-->
                                <div class="checkout-billing-details-wrap">
                                    <h2 class="title">Billing details</h2>
                                    <span class="username fs-4">Hello <b
                                                class="h3"> <?php echo strtoupper($_SESSION['user_name']) ?></b></span>

                                    <div class="billing-form-wrap">

                                        <form class="checkout_form" action="includes/logic.php" method="post">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="phone">Phone</label>
                                                        <input id="phone" type="tel" name="phone" class="form-control">
                                                        <input type="hidden" name="user_id"
                                                               value="<?php echo $_SESSION['user_id'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="country">Country</label>
                                                        <input id="country" name="country" type="text"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="city">City</label>
                                                        <input id="city" name="city" type="text" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="address_line">Address line</label>
                                                        <input id="address_line" name="address_line" type="text"
                                                               class="form-control">
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
                                            $order_total = 0;
                                            $price = null;

                                            foreach ($_SESSION['shopping_cart'] as $product):
                                                if ($product["product_percentage_price"]) {
                                                    $price = $product['product_price'] - ((int)$product['product_price']) * (((int)$product['product_percentage_price']) * 0.01);
                                                    $price = (int)($price);

                                                } else {
                                                    $price = $product['product_price'];
                                                }
                                                $order_total += (int)($price) * $product['product_quantity'];
                                                ?>
                                                <tr class="cart-item">
                                                    <td class="product-name"><?php echo substr($product['product_name'], 0, 12 )?>.....
                                                        <span class="product-quantity">× <?php echo $product['product_quantity'] ?></span>
                                                    </td>
                                                    <td class="product-total">
                                                        $<?php echo (int)($price) * $product['product_quantity'] ?></td>
                                                </tr>

                                            <?php endforeach;
                                            $_SESSION['order_total'] = $order_total;
                                            ?>

                                            </tbody>
                                            <tfoot class="table-foot">
                                            <tr class="order-total">
                                                <th>Total</th>
                                                <td>$<?php echo $order_total ?></td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                        <div class="shop-payment-method">
                                            <div id="PaymentMethodAccordion">
                                                <button type="submit" name="submit_order" class="btn-theme">Place
                                                    order
                                                </button>
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