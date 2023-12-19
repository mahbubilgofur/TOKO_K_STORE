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
<style>
    /* Tambahkan gaya CSS untuk membuat slider dan navbar mepet ke atas */
    #mySlider {
        margin-top: 0;
        /* Menghapus margin atas pada slider */
    }

    .navbar {
        margin-bottom: 0;
        /* Menghapus margin bawah pada navbar */
    }

    @media (max-width: 767px) {
        #mySlider img {
            width: 100%;
            height: auto;
        }
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
    /* Tambahkan gaya CSS untuk membuat gambar responsif di tampilan hp */
    @media (max-width: 767px) {
        #mySlider img {
            width: 100%;
            /* Menyesuaikan lebar gambar dengan lebar layar */
            height: auto;
            /* Biarkan tinggi gambar disesuaikan secara otomatis */
        }
    }




    .kategori-container {
        display: flex;
        align-items: center;
        justify-content: space-around;
        align-items: center;
        padding: 10px;
        background-color: #ffffff;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .kategori-wrapper {
        position: relative;
        overflow: hidden;
    }

    .kategori {
        text-align: center;

    }

    .kategori-wrapper:hover p {
        display: none;
    }

    .kategori-wrapper img {
        width: 100%;
        /* Sesuaikan lebar gambar dengan kebutuhan */
    }

    .kategori-wrapper a {
        display: block;
        text-decoration: none;
    }

    .kategori-wrapper:hover::before {
        content: attr(alt);
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #fff;
        /* Warna teks pada hover */
        font-size: 18px;
        /* Ukuran teks pada hover */
        font-weight: bold;
        /* Ketebalan teks pada hover */
    }

    .kategori img {
        width: 50px;
        height: 50px;
        margin-bottom: 10px;
    }

    .kategori p {
        margin: 0;
        font-size: 14px;
        color: #333333;
    }

    .kategori-container h6 {
        display: block;
    }

    /* Media query untuk mode tampilan hp */
    @media only screen and (max-width: 600px) {

        /* Sembunyikan teks kategori saat tampilan hp */
        .kategori-container h6 {
            display: none;
        }
    }

    .font-nama-produk {
        /* size nama produk */
        font-size: 14px;
    }

    .font-harga-produk {
        /* size harga produk */
        font-size: 14px;
    }
</style>

<div class="containerku">
    <div id="mySlider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= base_url('') ?>assets/slider/1.jpg" alt="Slide 1" class="d-block w-100 img-fluid">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('') ?>assets/slider/2.jpg" alt="Slide 2" class="d-block w-100 img-fluid">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('') ?>assets/slider/3.jpg" alt="Slide 3" class="d-block w-100 img-fluid">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('') ?>assets/slider/4.jpg" alt="Slide 3" class="d-block w-100 img-fluid">
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


<!-- Your HTML code for the content goes here -->
<!-- 
<!-- Tambahkan link ke jQuery dan Bootstrap JS di sini jika belum ada -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        setInterval(function() {
            $("#mySlider").carousel("next");
        }, 5000);
    });
</script>



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
        <div class="row gx-2 gx-lg-4">
            <?php foreach ($data_produk as $row) { ?> <div class="col-lg-3 col-md-4 col-sm-6 col-6 mb-5">
                    <div class="card h-100" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'> <!-- Product image-->
                        <div class="card-img-container"> <a href="<?= base_url('home/detail/' . $row->id_produk); ?>"> <img class="card-img-top img-fluid" src="<?= base_url('gambarproduk/' . $row->gambar1); ?>" alt="Product Image" /> </a> </div> <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center"> <!-- Product name-->
                                <h6 class="fw-bolder font-nama-produk"><?php echo $row->nama ?></h6> <!-- Product price-->
                                <p class="font-harga-produk">Rp.<?= ($row->harga) ?></p>
                            </div>
                        </div> <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="<?= base_url('home/detail/' . $row->id_produk); ?>">Lihat Opsi</a></div>
                        </div>
                    </div>
                </div> <?php } ?>
        </div>
    </div>
</section>


<style>
    /* Mengatur ukuran gambar agar memiliki tinggi yang sama */
    .card-img-container {
        overflow: hidden;
        height: 200px;
        /* Sesuaikan tinggi gambar sesuai kebutuhan Anda */
    }

    .card-img-top {
        object-fit: cover;
        height: 100%;
        width: 100%;
    }
</style>