<div class="content-wraper pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Begin Li's Banner Area -->
                <div class="single-banner shop-page-banner">
                    <a href="#">
                        <img src="<?= base_url('') ?>img_produk/slider/1s.jpg" alt="Li's Static Banner">
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="static-top-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

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