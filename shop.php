<?php
include("./includes/public-header.php");
require_once "includes/db.php";
$satatement=$connection->prepare("SELECT * FROM products INNER JOIN category ON products.category_id=category.category_id");
$satatement->execute();
$products=$satatement->fetchAll(PDO::FETCH_ASSOC);

?>
    <main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area" data-bg-img="assets/img/photos/bg3.webp">
        <div class="container pt--0 pb--0">
            <div class="row">
                <div class="col-12">
                    <div class="page-header-content">
                        <h2 class="title" data-aos="fade-down" data-aos-duration="1000">Product Page</h2>
                        <nav class="breadcrumb-area" data-aos="fade-down" data-aos-duration="1200">
                            <ul class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li class="breadcrumb-sep">//</li>
                                <li>Product Page</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Product Area Wrapper ==-->
    <section class="product-area product-default-area">
    <div class="container">
    <div class="row flex-xl-row-reverse justify-content-between">
    <div class="col-xl-9">
    <div class="row">
    <div class="col-12">
        <div class="shop-top-bar">
            <div class="shop-top-left">
                <p class="pagination-line"><a href="shop.php">12</a> Product Found of <a href="shop.php">30</a></p>
            </div>
            <div class="shop-top-center">
                <nav class="product-nav">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-grid" type="button" role="tab" aria-controls="nav-grid"
                                aria-selected="true"><i class="fa fa-th"></i></button>
                        <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab" data-bs-target="#nav-list"
                                type="button" role="tab" aria-controls="nav-list" aria-selected="false"><i
                                    class="fa fa-list"></i></button>
                    </div>
                </nav>
            </div>
            <div class="shop-top-right">
                <div class="shop-sort">
                    <span>Sort By :</span>
                    <select class="form-select" aria-label="Sort select example">
                        <option selected>Default</option>
                        <option value="1">Popularity</option>
                        <option value="2">Average Rating</option>
                        <option value="3">Newsness</option>
                        <option value="4">Price Low to High</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
    <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab">
    <div class="row">
    <!--  Start inserting products    -->
<?php foreach ($products as $product): ?>
    <div class="col-sm-6 col-lg-4">
        <!--== Start Product Item ==-->
        <div class="product-item">
            <div class="inner-content">
                <div class="product-thumb">
                    <a href="single-product.php">
                        <img src="admin/assets/media/products_images/<?php echo $product['product_image']; ?>" width="270" height="274" alt="Image-HasTech">
                    </a>
                    <?php if ($product['product_on_sale']): ?>
                        <div class="product-flag">
                            <ul>
                                <li class="discount">-<?php echo $product['product_percentage_price']?>%</li>
                            </ul>
                        </div>
                    <?php endif; ?>


                    <div class="product-action">
                        <a class="btn-product-wishlist" href="shop-wishlist.php"><i class="fa fa-heart"></i></a>
                        <a class="btn-product-cart" href="shop-cart.php"><i class="fa fa-shopping-cart"></i></a>
                        <button type="button" class="btn-product-quick-view-open">
                            <i class="fa fa-arrows"></i>
                        </button>
                        <a class="btn-product-compare" href="shop-compare.php"><i class="fa fa-random"></i></a>
                    </div>
                    <a class="banner-link-overlay" href="shop.php"></a>
                </div>
                <div class="product-info">
                    <div class="category">
                        <ul>
                            <li><a href="shop.php"><?php echo $product['category_name'];?></a></li>

                        </ul>
                    </div>
                    <h4 class="title"><a href="single-normal-product.php?id=<?php echo $product['product_id'] ?>"><?php echo $product['product_name']; ?>></a></h4>
                    <div class="prices">
                        <?php if($product['product_on_sale']) :?>
                        <span class="price-old">$<?php echo $product['product_price'] ?></span>
                        <span class="sep">-</span>
                        <?php endif;?>
                        <span class="price">$<?php echo $product['product_sale_price']??$product['product_price'] ?></span>

                    </div>
                </div>
            </div>
        </div>
        <!--== End prPduct Item ==-->
    </div>
       <!--      END INSERT      -->
          <?php endforeach;?>


    </div>

    <div class="col-12">
        <div class="pagination-items">
            <ul class="pagination justify-content-end mb--0">
                <li><a class="active" href="shop.php">1</a></li>
                <li><a href="shop-four-columns.php">2</a></li>
                <li><a href="shop-three-columns.php">3</a></li>
            </ul>
        </div>
    </div>
    </div>
    </div>
    <div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
        <div class="row">
            <div class="col-md-12">
                <!--== Start Product Item ==-->
                <div class="product-item product-list-item">
                    <div class="inner-content">
                        <div class="product-thumb">
                            <a href="single-product.php">
                                <img src="assets/img/shop/list-1.webp" width="322" height="360" alt="Image-HasTech">
                            </a>
                            <div class="product-flag">
                                <ul>
                                    <li class="discount">-10%</li>
                                </ul>
                            </div>
                            <div class="product-action">
                                <a class="btn-product-wishlist" href="shop-wishlist.php"><i class="fa fa-heart"></i></a>
                                <a class="btn-product-cart" href="shop-cart.php"><i class="fa fa-shopping-cart"></i></a>
                                <button type="button" class="btn-product-quick-view-open">
                                    <i class="fa fa-arrows"></i>
                                </button>
                                <a class="btn-product-compare" href="shop-compare.php"><i class="fa fa-random"></i></a>
                            </div>
                            <a class="banner-link-overlay" href="shop.php"></a>
                        </div>
                        <div class="product-info">
                            <div class="category">
                                <ul>
                                    <li><a href="shop.php">Men</a></li>
                                    <li class="sep">/</li>
                                    <li><a href="shop.php">Women</a></li>
                                </ul>
                            </div>
                            <h4 class="title"><a href="single-product.php">Leather Mens Slipper</a></h4>
                            <div class="prices">
                                <span class="price-old">$300</span>
                                <span class="sep">-</span>
                                <span class="price">$240.00</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem quo, rerum rem
                                soluta quisquam, repellat is deleniti omnis culpa ea quis provident dolore esse, offici
                                modi dolorem nam cum eligendi enim!</p>
                            <a class="btn-theme btn-sm" href="shop-cart.php">Add To Cart</a>
                        </div>
                    </div>
                </div>
                <!--== End prPduct Item ==-->
            </div>
            <div class="col-md-12">
                <!--== Start Product Item ==-->
                <div class="product-item product-list-item">
                    <div class="inner-content">
                        <div class="product-thumb">
                            <a href="single-product.php">
                                <img src="assets/img/shop/list-2.webp" width="322" height="360" alt="Image-HasTech">
                            </a>
                            <div class="product-action">
                                <a class="btn-product-wishlist" href="shop-wishlist.php"><i class="fa fa-heart"></i></a>
                                <a class="btn-product-cart" href="shop-cart.php"><i class="fa fa-shopping-cart"></i></a>
                                <button type="button" class="btn-product-quick-view-open">
                                    <i class="fa fa-arrows"></i>
                                </button>
                                <a class="btn-product-compare" href="shop-compare.php"><i class="fa fa-random"></i></a>
                            </div>
                            <a class="banner-link-overlay" href="shop.php"></a>
                        </div>
                        <div class="product-info">
                            <div class="category">
                                <ul>
                                    <li><a href="shop.php">Men</a></li>
                                    <li class="sep">/</li>
                                    <li><a href="shop.php">Women</a></li>
                                </ul>
                            </div>
                            <h4 class="title"><a href="single-product.php">Quickiin Mens shoes</a></h4>
                            <div class="prices">
                                <span class="price">$240.00</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem quo, rerum rem
                                soluta quisquam, repellat is deleniti omnis culpa ea quis provident dolore esse, offici
                                modi dolorem nam cum eligendi enim!</p>
                            <a class="btn-theme btn-sm" href="shop-cart.php">Add To Cart</a>
                        </div>
                    </div>
                </div>
                <!--== End prPduct Item ==-->
            </div>
            <div class="col-md-12">
                <!--== Start Product Item ==-->
                <div class="product-item product-list-item">
                    <div class="inner-content">
                        <div class="product-thumb">
                            <a href="single-product.php">
                                <img src="assets/img/shop/list-3.webp" width="322" height="360" alt="Image-HasTech">
                            </a>
                            <div class="product-flag">
                                <ul>
                                    <li class="discount">-10%</li>
                                </ul>
                            </div>
                            <div class="product-action">
                                <a class="btn-product-wishlist" href="shop-wishlist.php"><i class="fa fa-heart"></i></a>
                                <a class="btn-product-cart" href="shop-cart.php"><i class="fa fa-shopping-cart"></i></a>
                                <button type="button" class="btn-product-quick-view-open">
                                    <i class="fa fa-arrows"></i>
                                </button>
                                <a class="btn-product-compare" href="shop-compare.php"><i class="fa fa-random"></i></a>
                            </div>
                            <a class="banner-link-overlay" href="shop.php"></a>
                        </div>
                        <div class="product-info">
                            <div class="category">
                                <ul>
                                    <li><a href="shop.php">Men</a></li>
                                    <li class="sep">/</li>
                                    <li><a href="shop.php">Women</a></li>
                                </ul>
                            </div>
                            <h4 class="title"><a href="single-product.php">Rexpo Womens shoes</a></h4>
                            <div class="prices">
                                <span class="price-old">$300</span>
                                <span class="sep">-</span>
                                <span class="price">$240.00</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem quo, rerum rem
                                soluta quisquam, repellat is deleniti omnis culpa ea quis provident dolore esse, offici
                                modi dolorem nam cum eligendi enim!</p>
                            <a class="btn-theme btn-sm" href="shop-cart.php">Add To Cart</a>
                        </div>
                    </div>
                </div>
                <!--== End prPduct Item ==-->
            </div>
            <div class="col-md-12">
                <!--== Start Product Item ==-->
                <div class="product-item product-list-item">
                    <div class="inner-content">
                        <div class="product-thumb">
                            <a href="single-product.php">
                                <img src="assets/img/shop/list-4.webp" width="322" height="360" alt="Image-HasTech">
                            </a>
                            <div class="product-action">
                                <a class="btn-product-wishlist" href="shop-wishlist.php"><i class="fa fa-heart"></i></a>
                                <a class="btn-product-cart" href="shop-cart.php"><i class="fa fa-shopping-cart"></i></a>
                                <button type="button" class="btn-product-quick-view-open">
                                    <i class="fa fa-arrows"></i>
                                </button>
                                <a class="btn-product-compare" href="shop-compare.php"><i class="fa fa-random"></i></a>
                            </div>
                            <a class="banner-link-overlay" href="shop.php"></a>
                        </div>
                        <div class="product-info">
                            <div class="category">
                                <ul>
                                    <li><a href="shop.php">Men</a></li>
                                    <li class="sep">/</li>
                                    <li><a href="shop.php">Women</a></li>
                                </ul>
                            </div>
                            <h4 class="title"><a href="single-product.php">Modern Smart Shoes</a></h4>
                            <div class="prices">
                                <span class="price">$240.00</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem quo, rerum rem
                                soluta quisquam, repellat is deleniti omnis culpa ea quis provident dolore esse, offici
                                modi dolorem nam cum eligendi enim!</p>
                            <a class="btn-theme btn-sm" href="shop-cart.php">Add To Cart</a>
                        </div>
                    </div>
                </div>
                <!--== End prPduct Item ==-->
            </div>
            <div class="col-md-12">
                <!--== Start Product Item ==-->
                <div class="product-item product-list-item">
                    <div class="inner-content">
                        <div class="product-thumb">
                            <a href="single-product.php">
                                <img src="assets/img/shop/list-5.webp" width="322" height="360" alt="Image-HasTech">
                            </a>
                            <div class="product-flag">
                                <ul>
                                    <li class="discount">-10%</li>
                                </ul>
                            </div>
                            <div class="product-action">
                                <a class="btn-product-wishlist" href="shop-wishlist.php"><i class="fa fa-heart"></i></a>
                                <a class="btn-product-cart" href="shop-cart.php"><i class="fa fa-shopping-cart"></i></a>
                                <button type="button" class="btn-product-quick-view-open">
                                    <i class="fa fa-arrows"></i>
                                </button>
                                <a class="btn-product-compare" href="shop-compare.php"><i class="fa fa-random"></i></a>
                            </div>
                            <a class="banner-link-overlay" href="shop.php"></a>
                        </div>
                        <div class="product-info">
                            <div class="category">
                                <ul>
                                    <li><a href="shop.php">Men</a></li>
                                    <li class="sep">/</li>
                                    <li><a href="shop.php">Women</a></li>
                                </ul>
                            </div>
                            <h4 class="title"><a href="single-product.php">Primitive Mens shoes</a></h4>
                            <div class="prices">
                                <span class="price">$240.00</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem quo, rerum rem
                                soluta quisquam, repellat is deleniti omnis culpa ea quis provident dolore esse, offici
                                modi dolorem nam cum eligendi enim!</p>
                            <a class="btn-theme btn-sm" href="shop-cart.php">Add To Cart</a>
                        </div>
                    </div>
                </div>
                <!--== End prPduct Item ==-->
            </div>
            <div class="col-md-12">
                <!--== Start Product Item ==-->
                <div class="product-item product-list-item">
                    <div class="inner-content">
                        <div class="product-thumb">
                            <a href="single-product.php">
                                <img src="assets/img/shop/list-6.webp" width="322" height="360" alt="Image-HasTech">
                            </a>
                            <div class="product-action">
                                <a class="btn-product-wishlist" href="shop-wishlist.php"><i class="fa fa-heart"></i></a>
                                <a class="btn-product-cart" href="shop-cart.php"><i class="fa fa-shopping-cart"></i></a>
                                <button type="button" class="btn-product-quick-view-open">
                                    <i class="fa fa-arrows"></i>
                                </button>
                                <a class="btn-product-compare" href="shop-compare.php"><i class="fa fa-random"></i></a>
                            </div>
                            <a class="banner-link-overlay" href="shop.php"></a>
                        </div>
                        <div class="product-info">
                            <div class="category">
                                <ul>
                                    <li><a href="shop.php">Men</a></li>
                                    <li class="sep">/</li>
                                    <li><a href="shop.php">Women</a></li>
                                </ul>
                            </div>
                            <h4 class="title"><a href="single-product.php">Leather Mens Slipper</a></h4>
                            <div class="prices">
                                <span class="price-old">$300</span>
                                <span class="sep">-</span>
                                <span class="price">$240.00</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem quo, rerum rem
                                soluta quisquam, repellat is deleniti omnis culpa ea quis provident dolore esse, offici
                                modi dolorem nam cum eligendi enim!</p>
                            <a class="btn-theme btn-sm" href="shop-cart.php">Add To Cart</a>
                        </div>
                    </div>
                </div>
                <!--== End prPduct Item ==-->
            </div>
            <div class="col-12">
                <div class="pagination-items">
                    <ul class="pagination justify-content-end mb--0">
                        <li><a class="active" href="shop.php">1</a></li>
                        <li><a href="shop-four-columns.php">2</a></li>
                        <li><a href="shop-three-columns.php">3</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div class="col-xl-3">
        <div class="shop-sidebar">
            <div class="shop-sidebar-category">
                <h4 class="sidebar-title">Top Categories</h4>
                <div class="sidebar-category">
                    <ul class="category-list mb--0">
                        <li><a href="shop.php">Shoes <span>(6)</span></a></li>
                        <li><a href="shop.php">Computer <span>(4)</span></a></li>
                        <li><a href="shop.php">Covid-19 <span>(2)</span></a></li>
                        <li><a href="shop.php">Electronics <span>(6)</span></a></li>
                        <li><a href="shop.php">Frame Sunglasses <span>(12)</span></a></li>
                        <li><a href="shop.php">Furniture <span>(7)</span></a></li>
                        <li><a href="shop.php">Genuine Leather <span>(9)</span></a></li>
                    </ul>
                </div>
            </div>

            <div class="shop-sidebar-price-range">
                <h4 class="sidebar-title">Price Filter</h4>
                <div class="sidebar-price-range">
                    <div id="price-range"></div>
                </div>
            </div>

            <div class="shop-sidebar-color">
                <h4 class="sidebar-title">Color</h4>
                <div class="sidebar-color">
                    <ul class="color-list">
                        <li data-bg-color="#39ed8c" class="active"></li>
                        <li data-bg-color="#a6ed42"></li>
                        <li data-bg-color="#daed39"></li>
                        <li data-bg-color="#eed739"></li>
                        <li data-bg-color="#eca23a"></li>
                        <li data-bg-color="#f36768"></li>
                        <li data-bg-color="#e14755"></li>
                        <li data-bg-color="#dc83a3"></li>
                        <li data-bg-color="#dc82da"></li>
                        <li data-bg-color="#9a82dd"></li>
                        <li data-bg-color="#82c2db"></li>
                        <li data-bg-color="#6bd6b0"></li>
                        <li data-bg-color="#9ed76b"></li>
                        <li data-bg-color="#c8c289"></li>
                    </ul>
                </div>
            </div>

            <div class="shop-sidebar-size">
                <h4 class="sidebar-title">Size</h4>
                <div class="sidebar-size">
                    <ul class="size-list">
                        <li><a href="shop.php">S <span>(6)</span></a></li>
                        <li><a href="shop.php">M <span>(4)</span></a></li>
                        <li><a href="shop.php">L <span>(2)</span></a></li>
                        <li><a href="shop.php">XL <span>(6)</span></a></li>
                        <li><a href="shop.php">XXL <span>(12)</span></a></li>
                    </ul>
                </div>
            </div>

            <div class="shop-sidebar-brand">
                <h4 class="sidebar-title">Brand</h4>
                <div class="sidebar-brand">
                    <ul class="brand-list mb--0">
                        <li><a href="shop.php">Lakmeetao <span>(6)</span></a></li>
                        <li><a href="shop.php">Beautifill <span>(4)</span></a></li>
                        <li><a href="shop.php">Made In GD <span>(2)</span></a></li>
                        <li><a href="shop.php">Pecifico <span>(6)</span></a></li>
                        <li><a href="shop.php">Xlovgtir <span>(12)</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </section>
    <!--== End Product Area Wrapper ==-->
    </main>
    <?php
    include("./includes/public-footer.php");
    ?>