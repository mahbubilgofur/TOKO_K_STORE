<!-- <div class="content-wraper pt-60 pb-60 pt-sm-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-1 order-lg-2"> -->

<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <?php if (empty($produk)) { ?>
            <h1 class="text-center">PRODUK TIDAK DITEMUKAN</h1>
        <?php } else { ?>
            <div class="row gx-2 gx-lg-4">
                <?php foreach ($produk as $row) { ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-6 mb-5">
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
                                    <h6 class="fw-bolder font-nama-produk">
                                        <?php echo substr($row->nama, 0, 40) ?>......
                                    </h6>
                                    <!-- Product price-->
                                    <p class="font-harga-produk">Rp.<?= number_format($row->harga, 0, ',', '.') ?></p>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-dark mt-auto" href="<?= base_url('home/detail/' . $row->id_produk); ?>">Lihat Opsi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</section>


<!-- <div class="paginatoin-area">
        <div class="row">
            <div class="col-lg-6 col-md-6 pt-xs-15">
                <p>Showing 1-12 of 13 item(s)</p>
            </div>
            <div class="col-lg-6 col-md-6">
                <ul class="pagination-box pt-xs-20 pb-xs-15">
                    <li><a href="#" class="Previous"><i class="fa fa-chevron-left"></i> Previous</a>
                    </li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li>
                        <a href="#" class="Next"> Next <i class="fa fa-chevron-right"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div> -->