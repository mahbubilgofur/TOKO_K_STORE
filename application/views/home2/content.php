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
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 ">
            <?php foreach ($data_produk as $row) { ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-5"> <!-- Ubah jumlah kolom untuk tampilan hp -->
                    <div class="card h-100" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
                        <!-- Product image-->
                        <div class="card-img-container">
                        <a href="<?= base_url('home/detail/' . $row->id_produk); ?>">
                            <img class="card-img-top img-fluid" src="<?= base_url('gambarproduk/' . $row->gambar1); ?>" alt="Product Image" />
                        </a>
                        </div>
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder"><?php echo $row->nama ?></h5>
                                <!-- Product price-->
                                RP.<?= number_format($row->harga, 0) ?>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="<?= base_url('home/detail/' . $row->id_produk); ?>">View options</a></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<style>
    /* Mengatur ukuran gambar agar memiliki tinggi yang sama */
    .card-img-container {
        overflow: hidden;
        height: 200px; /* Sesuaikan tinggi gambar sesuai kebutuhan Anda */
    }

    .card-img-top {
        object-fit: cover;
        height: 100%;
        width: 100%;
    }
</style>