<!-- <div class="popup" id="popup">
    <div class="popup-content">
        <button class="close-button" id="close-button">X</button>
        <H1>MOHAMMAD MAHBUBIL GOFUR</H1>
        <H3>12RPL2</H3>
        <img src="<?= base_url() ?>template/images/pop-up.gif" alt="">
    </div>
</div> -->

<!-- <div class="content-wraper pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-banner shop-page-banner">
                    <a href="#">
                    <img src="<?= base_url('') ?>template/images/slider/1.jpg" alt="Li's Static Banner">
                    </a>
                </div>

            </div>
        </div>
    </div>
</div> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Mengatur interval 5 detik untuk slider
        setInterval(function() {
            $("#mySlider").carousel("next");
        }, 5000);
    });
</script>
<div class="containerku">
    <div id="mySlider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= base_url('') ?>template/gambar_slide/1.jpg" alt="Slide 1" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('') ?>template/gambar_slide/2.jpg" alt="Slide 2" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('') ?>template/gambar_slide/3.jpg" alt="Slide 3" class="d-block w-100">
            </div>
        </div>
        <a class="carousel-control-prev" href="#mySlider" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#mySlider" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
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
<!-- Static Top Area End Here -->
<div class="group-featured-product pt-60 pb-40 pb-xs-25">
    <div class="container">
        <div class="row">

        </div>
    </div>
</div>
<div class="product-area pt-55 pb-25 pt-xs-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
                    <?php foreach ($data_produk as $row) { ?>
                        <!-- Product -->
                        <div class="product-item men col-lg-4 col-md-4 col-sm-6">
                            <div class="product discount product_filter">
                                <div class="product_image">
                                    <a href="<?= base_url('home/detail/' . $row->id_produk); ?>">
                                        <img src="<?= base_url('gambarproduk/' . $row->gambar1); ?>" alt="<?= $row->nama ?>" style=" height: 200px;">
                                    </a>
                                </div>
                                <div class="favorite favorite_left"></div>
                                <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-$20</span></div>
                                <div class="product_info">
                                    <h6 class="product_name"><a href="single.html"><?php echo $row->nama ?></a></h6>
                                    <div class="product_price">RP.<?= number_format($row->harga, 0) ?></div>
                                </div>
                            </div>
                            <div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
                        </div>
                        <!-- End of Product -->
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>