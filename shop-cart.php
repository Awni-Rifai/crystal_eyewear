<?php
require_once "includes/db.php";
session_start();
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $i=0;
    foreach ($_SESSION['shopping_cart'] as $product){
        if($product['product_id']===$id){
            if(count($_SESSION['shopping_cart'])===1){
                unset($_SESSION['shopping_cart']);
                header("Location:shop-cart.php");
            }
            unset($_SESSION['shopping_cart'][$i]);
            header("Location:shop-cart.php");
        }
        $i++;
    }
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    //check if the product is already in the session
    $check=false;
    if(isset($_SESSION['shopping_cart'])) {
        foreach ($_SESSION['shopping_cart'] as $product) {
            if ($id === $product["product_id"]) {
                $check = true;
            }
        }
    }
        else{
            $check=false;
        }


            if(!$check){

                $statement = $connection->prepare("SELECT * FROM products WHERE product_id=:id");
                $statement->bindValue(":id", $id);
                $statement->execute();
                $product = $statement->fetch(PDO::FETCH_ASSOC);
                $_SESSION['shopping_cart'][]= $product;

            }

        //add only if it's not stored in the database;




}
include("./includes/public-header.php");

?>
    <main class="main-content">
        <!--== Start Page Header Area Wrapper ==-->
        <div class="page-header-area" data-bg-img="assets/img/photos/bg3.webp">
            <div class="container pt--0 pb--0">
                <div class="row">
                    <div class="col-12">
                        <div class="page-header-content">
                            <h2 class="title" data-aos="fade-down" data-aos-duration="1000">Shopping Cart</h2>
                            <nav class="breadcrumb-area" data-aos="fade-down" data-aos-duration="1200">
                                <ul class="breadcrumb">
                                    <li><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-sep">//</li>
                                    <li>Shopping Cart</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--== End Page Header Area Wrapper ==-->

        <!--== Start Blog Area Wrapper ==-->
        <section class="shopping-cart-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="shopping-cart-form table-responsive">
                            <form action="#" method="post">
                                <table class="table text-center">
                                    <thead>
                                    <tr>
                                        <th class="product-remove">&nbsp;</th>
                                        <th class="product-thumb">&nbsp;</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(!isset($_SESSION['shopping_cart'])): ?>
                                        <h1>Your cart is empty</h1>
                                    <?php endif;?>

                                    <?php

                                    if(isset($_SESSION["shopping_cart"])):
                                    foreach ($_SESSION["shopping_cart"] as $product):?>
                                    <tr class="cart-product-item">
                                        <td class="product-remove">
                                            <a href="shop-cart.php?delete=<?php echo $product['product_id'] ?>"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                        <td class="product-thumb">
                                            <a href="single-product.php">
                                                <img src="assets/img/shop/product-mini/3.webp" width="90" height="110"
                                                     alt="Image-HasTech">
                                            </a>
                                        </td>
                                        <td class="product-name">
                                            <h4 class="title"><a href="single-normal-product.php?id=<?php echo $product['product_id']?>"><?php echo $product['product_name'] ?></a></h4>
                                        </td>
                                        <td class="product-price">
                                            <span class="price">$<?php echo $product['product_sale_price']??$product['product_price'] ?></span>
                                        </td>
                                        <td class="product-quantity">
                                            <div class="pro-qty">
                                                <input type="text" class="quantity" title="Quantity" value="1">
                                            </div>
                                        </td>
                                        <td class="product-subtotal">
                                            <span class="price">$<?php echo $product['product_sale_price']??$product['product_price'] ?></span>
                                        </td>
                                    </tr>
                                    <?php endforeach;
                                    endif;
                                    ?>
                                    <tr class="actions">
                                        <td class="border-0" colspan="6">
                                            <button type="submit" class="update-cart" disabled>Update cart</button>
                                            <button type="submit" class="clear-cart">Clear Cart</button>
                                            <a href="shop.php" class="btn-theme btn-flat">Continue Shopping</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row row-gutter-50">
                    <div class="col-md-6 col-lg-4">
                        <div id="CategoriesAccordion" class="shipping-form-calculate">
                            <div class="section-title-cart">
                                <h5 class="title">Calculate Shipping</h5>
                                <div class="desc">
                                    <p>Estimate your shipping fee *</p>
                                </div>
                            </div>
                            <span data-bs-toggle="collapse" data-bs-target="#CategoriesTwo" aria-expanded="true"
                                  role="button">Calculate shipping</span>
                            <div id="CategoriesTwo" class="collapse show" data-bs-parent="#CategoriesAccordion">
                                <form action="#" method="post">
                                    <div class="row row-gutter-50">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="visually-hidden" for="FormCountry">State</label>
                                                <select id="FormCountry" class="form-control">
                                                    <option selected>Select a country…</option>
                                                    <option>...</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="stateCounty" class="visually-hidden">State / County</label>
                                                <input type="text" id="stateCounty" class="form-control"
                                                       placeholder="State / County">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="townCity" class="visually-hidden">Town / City</label>
                                                <input type="text" id="townCity" class="form-control"
                                                       placeholder="Town / City">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="postcodeZip" class="visually-hidden">Postcode / ZIP</label>
                                                <input type="text" id="postcodeZip" class="form-control"
                                                       placeholder="Postcode / ZIP">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="update-totals">Update totals</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="shipping-form-coupon">
                            <div class="section-title-cart">
                                <h5 class="title">Coupon Code</h5>
                                <div class="desc">
                                    <p>Enter your coupon code if you have one.</p>
                                </div>
                            </div>
                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="couponCode" class="visually-hidden">Coupon Code</label>
                                            <input type="text" id="couponCode" class="form-control"
                                                   placeholder="Enter your coupon code..">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="coupon-btn">Apply coupon</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="shipping-form-cart-totals">
                            <div class="section-title-cart">
                                <h5 class="title">Cart totals</h5>
                            </div>
                            <div class="cart-total-table">
                                <table class="table">
                                    <tbody>
                                    <tr class="cart-subtotal">
                                        <td>
                                            <p class="value">Subtotal</p>
                                        </td>
                                        <td>
                                            <p class="price">£128.00</p>
                                        </td>
                                    </tr>
                                    <tr class="shipping">
                                        <td>
                                            <p class="value">Shipping</p>
                                        </td>
                                        <td>
                                            <ul class="shipping-list">
                                                <li class="radio">
                                                    <input type="radio" name="shipping" id="radio1" checked>
                                                    <label for="radio1"><span></span> Flat Rate</label>
                                                </li>
                                                <li class="radio">
                                                    <input type="radio" name="shipping" id="radio2">
                                                    <label for="radio2"><span></span> Free Shipping</label>
                                                </li>
                                                <li class="radio">
                                                    <input type="radio" name="shipping" id="radio3">
                                                    <label for="radio3"><span></span> Local Pickup</label>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <td>
                                            <p class="value">Total</p>
                                        </td>
                                        <td>
                                            <p class="price">£128.00</p>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <a class="btn-theme btn-flat" href="shop-checkout.php">Proceed to checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Blog Area Wrapper ==-->
    </main>
<?php
include("./includes/public-footer.php");
?>