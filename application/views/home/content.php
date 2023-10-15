<!-- <div class="popup" id="popup">
    <div class="popup-content">
        <button class="close-button" id="close-button">X</button>
        <H1>MOHAMMAD MAHBUBIL GOFUR</H1>
        <H3>12RPL2</H3>
        <img src="<?= base_url() ?>template/images/pop-up.gif" alt="">
    </div>
</div> -->
<div class="slider-with-banner">
    <div class="container">
        <div class="row">
            <!-- Begin Category Menu Area -->
            <div class="col-lg-3">
                <!--Category Menu Start-->
                <div class="category-menu category-menu-2">
                    <div class="category-heading">
                        <h2 class="categories-toggle"><span>categories</span></h2>
                    </div>
                    <div id="cate-toggle" class="category-menu-list">
                        <?php foreach ($getcariketegori as $row) : ?>
                            <ul>
                                <?php if ($row['induk_id'] == 0) : ?>
                                    <li class="right-menu"><a href="#"><?= $row['nama']; ?></a>
                                        <ul class="cat-mega-menu">
                                            <?php foreach ($getcariketegori as $subrow) : ?>
                                                <?php if ($subrow['induk_id'] == $row['id_kategori']) : ?>
                                                    <li class="right-menu cat-mega-title">
                                                        <a href="#"><?= $subrow['nama']; ?></a>
                                                        <ul>
                                                            <?php foreach ($getcariketegori as $subsubrow) : ?>
                                                                <?php if ($subsubrow['induk_id'] == $subrow['id_kategori']) : ?>
                                                                    <li><a href="#"><?= $subsubrow['nama']; ?></a>
                                                                        <ul>
                                                                            <?php foreach ($getcariketegori as $subakhir) : ?>
                                                                                <?php if ($subakhir['induk_id'] == $subsubrow['id_kategori']) : ?>
                                                                                    <li><a href="#"><?= $subakhir['nama']; ?></a></li>
                                                                                <?php endif; ?>
                                                                            <?php endforeach; ?>
                                                                        </ul>
                                                                    </li>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!--Category Menu End-->
            </div>
            <!-- Category Menu Area End Here -->
            <!-- Begin Slider Area -->
            <div class="col-lg-6 col-md-8">
                <div class="slider-area slider-area-3 pt-sm-30 pt-xs-30 pb-xs-30">
                    <div class="slider-active owl-carousel">
                        <!-- Begin Single Slide Area -->
                        <div class="single-slide align-center-left animation-style-01 bg-1">
                            <div class="slider-progress"></div>
                            <div class="slider-content">

                            </div>
                        </div>
                        <!-- Single Slide Area End Here -->
                        <!-- Begin Single Slide Area -->
                        <div class="single-slide align-center-left animation-style-02 bg-2">
                            <div class="slider-progress"></div>
                            <div class="slider-content">

                            </div>
                        </div>
                        <!-- Single Slide Area End Here -->
                        <!-- Begin Single Slide Area -->
                        <div class="single-slide align-center-left animation-style-01 bg-3">
                            <div class="slider-progress"></div>
                            <div class="slider-content">

                            </div>
                        </div>
                        <!-- Single Slide Area End Here -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Slider With Banner Area End Here -->
<!-- Begin Static Top Area -->
<div class="static-top-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

            </div>
        </div>
    </div>
</div>
<!-- Static Top Area End Here -->
<div class="group-featured-product pt-60 pb-40 pb-xs-25">
    <div class="container">
        <div class="row">

        </div>
    </div>
</div>
<div class="li-static-home">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Begin Li's Static Home Image Area -->
                <div class="li-static-home-image"></div>
                <!-- Li's Static Home Image Area End Here -->
                <!-- Begin Li's Static Home Content Area -->
                <div class="li-static-home-content">
                    <p>Sale Offer<span>-20% Off</span>This Week</p>
                    <h2>Featured Product</h2>
                    <h2>Sanai Accessories 2018</h2>
                    <p class="schedule">
                        Starting at
                        <span> $1209.00</span>
                    </p>
                    <div class="default-btn">
                        <a href="<?= base_url() ?>template/shop-left-sidebar.html" class="links">Beli Sekarang</a>
                    </div>
                </div>
                <!-- Li's Static Home Content Area End Here -->
            </div>
        </div>
    </div>
</div>
<div class="product-area pt-55 pb-25 pt-xs-50">
    <div class="container">
        <div class="tab-content">
            <div id="li-new-product" class="tab-pane active show" role="tabpanel">
                <div class="row">
                    <div class="product-active owl-carousel">
                        <?php foreach ($data_produk as $row) { ?>
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="<?= base_url('home/detail/' . $row->id_produk); ?>">
                                            <img src="<?= base_url('gambarproduk/' . $row->gambar); ?>">
                                        </a>

                                    </div>
                                    <div class=" product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="<?= base_url() ?>template/product-details.html">RATING</a>
                                                </h5>
                                                <div class="rating-box">
                                                    <ul class="rating">
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <h4><a class="product_name" href="<?= base_url('home/detail') ?>"><?php echo $row->nama ?></a></h4>
                                            <div class="price-box">
                                                <span class="new-price">RP.<?php echo $row->harga ?></span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="product-area pt-55 pb-25 pt-xs-50">
    <div class="container">
        <div class="tab-content">
            <div id="li-new-product" class="tab-pane active show" role="tabpanel">
                <div class="row">
                    <div class="product-active owl-carousel">
                        <?php foreach ($data_produk as $row) { ?>
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="<?= base_url('home/detail/' . $row->id_produk); ?>">
                                            <img src="<?= base_url('gambarproduk/' . $row->gambar); ?>">
                                        </a>

                                    </div>
                                    <div class=" product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="<?= base_url() ?>template/product-details.html">RATING</a>
                                                </h5>
                                                <div class="rating-box">
                                                    <ul class="rating">
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <h4><a class="product_name" href="<?= base_url('home/detail') ?>"><?php echo $row->nama ?></a></h4>
                                            <div class="price-box">
                                                <span class="new-price">RP.<?php echo $row->harga ?></span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>